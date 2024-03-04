<?php

namespace Revalto\ServiceRepository\Service;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Revalto\ServiceRepository\Enums\RepositoryParamEnum;
use Revalto\ServiceRepository\Repository\AbstractRepositoryInterface;
use Revalto\ServiceRepository\Repository\RepositoryManager;

/**
 * @method LengthAwarePaginator paginate(int $perPage = 15, array $columns = ['*'],string $pageName = 'page', ?int $page = null)
 * @method Collection get(array|null $id = null)
 * @method Model|null firstById(int $id)
 * @method bool existsById(int $id)
 * @method bool exists($value, string $column = 'id')
 * @method bool destroyById(int|array $id)
 * @method bool deleteById(int|array $id)
 * @method int update(int $id, array $data)
 * @method Model create(array $data)
 * @method bool insert(array $data)
 * @method Model|Builder firstOrCreate(array $attributes = [], array $values = [])
 * @method $this with(array|string $relations)
 * @method $this withCount(array|string $relations)
 * @method $this select(array|string $fields)
 * @method $this limit(int $limit)
 */
abstract class AbstractService
{
    /**
     * @param AbstractRepositoryInterface $repository
     */
    public function __construct(
        protected AbstractRepositoryInterface $repository,
    ) {}

    /**
     * @return RepositoryManager
     */
    public function getRepository(): RepositoryManager
    {
        return (new RepositoryManager($this->repository));
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        if (($method = RepositoryParamEnum::tryFrom($name)) !== null) {
            $this->getRepository()->setParam($method->value, ...$arguments);

            return $this;
        }

        return $this->getRepository()->{$name}(...$arguments);
    }
}
