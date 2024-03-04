<?php

namespace Revalto\ServiceRepository\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Optional;
use Revalto\ServiceRepository\DataMapper\DefaultEntity;
use Revalto\ServiceRepository\Enums\RepositoryParamEnum;
use Spatie\DataTransferObject\DataTransferObject;

abstract class AbstractRepository implements AbstractRepositoryInterface
{
    /**
     * @var array
     */
    protected array $params = [];

    /**
     * @param Model $model
     */
    public function __construct(
        protected Model $model
    ) {}

    /**
     * @return string
     */
    public function entity(): string
    {
        return DefaultEntity::class;
    }

    /**
     * @return Model
     */
    public function getModelClass(): string
    {
        return $this->model::class;
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->model->getTable();
    }

    /**
     * @return Builder
     */
    protected function newQuery(): Builder
    {
        return $this->applyQueryParams(
            $this->model::query()
        );
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    protected function applyQueryParams(Builder $query): Builder
    {
        foreach (RepositoryParamEnum::cases() as $param) {
            if (isset($this->params[$param->value])) {
                $query->{$param->value}($this->params[$param->value]);
            }
        }

        return $query;
    }

    /**
     * @param int $perPage
     * @param string[] $columns
     * @param string $pageName
     * @param int|null $page
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage = 15, array $columns = ['*'],
                             string $pageName = 'page', ?int $page = null): LengthAwarePaginator
    {
        return $this->newQuery()->paginate($perPage, $columns, $pageName, $page);
    }

    /**
     * @param array|null $id
     * @return Collection
     */
    public function get(?array $id = null): Collection
    {
        return $this->newQuery()
            ->when(!is_null($id), fn ($query) => $query->whereIn('id', $id))
            ->get();
    }

    /**
     * @param int $id
     * @return null|\stdClass
     */
    public function firstById(int $id): \stdClass|null|Model
    {
        return $this->first($id);
    }

    /**
     * @param mixed $value
     * @param string $column
     *
     * @return \stdClass|null
     */
    public function first(mixed $value, string $column = 'id'): \stdClass|null|Model
    {
        $qb = $this->newQuery();

        return is_array($value)
            ? $qb->where($value)->first()
            : $qb->where($column, '=', $value)->first();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function existsById(int $id): bool
    {
        return $this->exists($id);
    }

    /**
     * @param $value
     * @param string $column
     * @return bool
     */
    public function exists($value, string $column = 'id'): bool
    {
        $qb = $this->newQuery()->toBase();

        return is_array($value)
            ? $qb->where($value)->exists()
            : $qb->where($column, '=', $value)->exists();
    }

    /**
     * @param array $fillable
     * @param string $orderField
     * @param string $orderType
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function where(array $fillable, string $orderField = 'id', string $orderType = 'desc')
    {
        return $this->newQuery()->where($fillable)
            ->orderBy($orderField, $orderType)
            ->get();
    }

    /**
     * @param array $attributes
     * @param array $values
     * @return Builder|Model
     */
    public function firstOrCreate(array $attributes = [], array $values = []): Model|Builder
    {
        return $this->newQuery()->firstOrCreate($attributes, $values);
    }

    /**
     * @param int|array $id
     * @return bool
     */
    public function destroyById(int|array $id): bool
    {
        return $this->getModelClass()::destroy($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return int
     */
    public function update(int $id, array $data): int
    {
        return $this->newQuery()->find($id)->update($data);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->getModelClass()::create($data);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setParam(string $key, mixed $value): void
    {
        $this->params[$key] = $value;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insert(array $data): bool
    {
        return $this->newQuery()->insert($data);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return $this|void
     */
    public function __call(string $name, array $arguments)
    {
        if (($method = RepositoryParamEnum::tryFrom($name)) !== null) {
            $this->setParam($method->value, ...$arguments);

            return $this;
        }
    }
}
