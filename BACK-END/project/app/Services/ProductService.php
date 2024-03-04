<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Revalto\ServiceRepository\Service\AbstractService as Service;

class ProductService extends Service
{
	/**
	 * @param ProductRepositoryInterface $repository
	 * @return void
	 */
	public function __construct(ProductRepositoryInterface $repository)
	{
		parent::__construct($repository);
	}
}
