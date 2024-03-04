<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface as RepositoryInterface;
use Revalto\ServiceRepository\Repository\AbstractRepository as Repository;

class OrderRepository extends Repository implements RepositoryInterface
{
	/**
	 * @param Order $model
	 * @return void
	 */
	public function __construct(Order $model)
	{
		parent::__construct($model);
	}
}
