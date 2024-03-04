<?php

namespace Revalto\ModelCache\Builder;

use Illuminate\Cache\TaggableStore;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Database\Query\Processors\Processor;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CacheableQueryBuilder extends Builder
{
    /**
     * @var bool
     */
    protected bool $enabled = true;

    /**
     * @var bool
     */
    protected bool $logEnabled = false;

    /**
     * @var string
     */
    protected string $logLevel = 'info';

    /**
     * @var string
     */
    protected string $modelClass;

    /**
     * @var array
     */
    protected array $cacheableProperties;

    /**
     * @var array|string[]
     */
    protected array $cacheableFlushMethods = [
        'insert',
        'insertUsing',
        'insertOrIgnore',
        'insertGetId',
        'update',
        'updateFrom',
        'delete',
        'truncate',
        'upsert',
    ];

    /**
     * @param ConnectionInterface $connection
     * @param Grammar|null $grammar
     * @param Processor|null $processor
     * @param string|null $modelClass
     * @param array $cacheableProperties
     */
    public function __construct(
        ConnectionInterface $connection,
        Grammar             $grammar = null,
        Processor           $processor = null,
        string              $modelClass = null,
        array               $cacheableProperties = []
    )
    {
        parent::__construct($connection, $grammar, $processor);

        $this->modelClass = $modelClass ?? static::class;
        $this->cacheableProperties = $cacheableProperties;
    }

    /**
     * Pass our configuration to newly created queries
     *
     * @return $this|CacheableQueryBuilder
     */
    public function newQuery(): static
    {
        return new static(
            $this->connection,
            $this->grammar,
            $this->processor,
            $this->modelClass,
            $this->cacheableProperties
        );
    }

    /**
     * @return bool
     */
    protected function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @return string|null
     */
    protected function getModelIdentifier(): ?string
    {
        return $this->cacheableProperties['identifier'] ?? null;
    }

    /**
     * @return int|null
     */
    protected function getTtl(): ?int
    {
        return $this->cacheableProperties['ttl'] ?? null;
    }

    /**
     * @return string|null
     */
    protected function getPrefix(): ?string
    {
        return $this->cacheableProperties['prefix'] ?? null;
    }

    /**
     * @return string
     */
    public function getCacheKey(): string
    {
        return Str::replaceArray('?', $this->getBindings(), $this->toSql());
    }

    /**
     * @param string|null $modelClass
     * @return string
     */
    protected function getModelCacheKey(string $modelClass = null): string
    {
        return $this->getPrefix() . '_' . ($modelClass ?? $this->modelClass);
    }

    /**
     * Check if to cache against just the class or a specific identifiable e.g. id
     *
     * @return string[]
     */
    protected function getIdentifiableModelClasses(mixed $value = null): array
    {
        $result = [$this->modelClass];

        foreach (is_array($value) ? $value : [$value] as $v) {
            $result[] = "{$this->modelClass}#{$v}";
        }

        return $result;
    }

    /**
     * @param array|null $wheres
     * @return mixed
     */
    protected function getIdentifiableValue(array $wheres = null): mixed
    {
        $wheres = $wheres ?? $this->wheres;

        foreach ($wheres as $where) {
            if (isset($where['type']) && $where['type'] === 'Nested') {
                return $this->getIdentifiableValue($where['query']->wheres);
            }

            if (isset($where['column']) && $where['column'] === $this->getModelIdentifier()) {
                return $where['value'] ?? $where['values'];
            }
        }

        return null;
    }

    /**
     * @return array|mixed
     */
    protected function runSelect()
    {
        if (!$this->isEnabled()) {
            return parent::runSelect();
        }

        //Use the query as common cache key
        $cacheKey = $this->getCacheKey();

        //Check if taggable store
        $isTaggableStore = Cache::getStore() instanceof TaggableStore;
        //and create additional identifiers
        $modelClasses = $this->getIdentifiableModelClasses($this->getIdentifiableValue());

        //If cached, return
        if (($isTaggableStore && Cache::tags($modelClasses)->has($cacheKey)) || Cache::has($cacheKey)) {
            $this->log("Found cache entry for '{$cacheKey}'");

            return $isTaggableStore ? Cache::tags($modelClasses)->get($cacheKey) : Cache::get($cacheKey);
        }

        //If not, run normally -> this is what to cache and return
        $retVal = parent::runSelect();

        //Are tags supported? Makes life easier!
        if ($isTaggableStore) {
            $this->log("Using taggable store to cache value of {$cacheKey} for {$this->getTtl()} ttl for " . implode(',', $modelClasses));
            Cache::tags($modelClasses)->put($cacheKey, $retVal, $this->getTtl());
        } else {
            $this->log("Using cache to store value of {$cacheKey} for {$this->getTtl()} ttl for " . implode(',', $modelClasses));
            Cache::put($cacheKey, $retVal, $this->getTtl());

            //Cache the query if not, for purging purposes
            foreach ($modelClasses as $modelClass) {
                $modelCacheKey = $this->getModelCacheKey($modelClass);
                $queries = Cache::get($modelCacheKey, []);
                $queries[] = $cacheKey;
                Cache::put($modelCacheKey, $queries);
            }
        }

        return $retVal;
    }

    /**
     * @param mixed|null $identifier
     * @return bool
     */
    protected function flushCache(mixed $identifier = null): bool
    {
        if (!$this->enabled) {
            return false;
        }

        $this->log("Flushing cache for {$this->modelClass}");

        //If tag-support, just flush all results
        $modelClasses = $this->getIdentifiableModelClasses($identifier);

        if (Cache::getStore() instanceof TaggableStore) {
            return Cache::tags($modelClasses)->flush();
        } else {
            //If not, forget based on the cached queries
            foreach ($modelClasses as $modelClass) {
                $modelCacheKey = $this->getModelCacheKey($modelClass);
                $queries = Cache::get($modelCacheKey);

                if (!empty($queries)) {
                    foreach ($queries as $query) {
                        Cache::forget($query);
                    }

                    Cache::forget($modelCacheKey);
                }
            }
        }

        return true;
    }

    /**
     * @param string $message
     * @param string $level
     * @return bool
     */
    protected function log(string $message, string $level = 'debug'): bool
    {
        if (!$this->logEnabled) {
            return false;
        }

        Log::log($this->logLevel ?? $level, "[Cacheable] {$message}");

        return true;
    }

    /**
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (method_exists($this, $method) && in_array($method, $this->cacheableFlushMethods)) {
            $this->flushCache();

            return $this->$method(...$parameters);
        }

        return parent::__call($method, $parameters);
    }
}