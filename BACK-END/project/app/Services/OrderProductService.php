<?php

namespace App\Services;

use App\Repositories\Interfaces\OrderProductRepositoryInterface;
use Revalto\ServiceRepository\Service\AbstractService as Service;

class OrderProductService extends Service
{
	/**
	 * @param OrderProductRepositoryInterface $repository
	 * @return void
	 */
	public function __construct(OrderProductRepositoryInterface $repository)
	{
		parent::__construct($repository);
	}
}
