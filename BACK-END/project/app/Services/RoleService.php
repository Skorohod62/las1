<?php

namespace App\Services;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use Revalto\ServiceRepository\Service\AbstractService as Service;

class RoleService extends Service
{
	/**
	 * @param RoleRepositoryInterface $repository
	 * @return void
	 */
	public function __construct(RoleRepositoryInterface $repository)
	{
		parent::__construct($repository);
	}
}
