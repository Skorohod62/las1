<?php

namespace App\Services;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use Revalto\ServiceRepository\Service\AbstractService as Service;

class OrderService extends Service
{
	/**
	 * @param OrderRepositoryInterface $repository
	 * @return void
	 */
	public function __construct(OrderRepositoryInterface $repository)
	{
		parent::__construct($repository);
	}
}
