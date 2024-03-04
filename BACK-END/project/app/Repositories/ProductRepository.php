<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface as RepositoryInterface;
use Revalto\ServiceRepository\Repository\AbstractRepository as Repository;

class ProductRepository extends Repository implements RepositoryInterface
{
	/**
	 * @param Product $model
	 * @return void
	 */
	public function __construct(Product $model)
	{
		parent::__construct($model);
	}
}
