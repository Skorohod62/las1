<?php

namespace App\Repositories;

use App\Models\OrderProduct;
use App\Repositories\Interfaces\OrderProductRepositoryInterface as RepositoryInterface;
use Revalto\ServiceRepository\Repository\AbstractRepository as Repository;

class OrderProductRepository extends Repository implements RepositoryInterface
{
	/**
	 * @param OrderProduct $model
	 * @return void
	 */
	public function __construct(OrderProduct $model)
	{
		parent::__construct($model);
	}
}
