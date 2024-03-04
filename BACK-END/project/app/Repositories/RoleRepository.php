<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface as RepositoryInterface;
use Revalto\ServiceRepository\Repository\AbstractRepository as Repository;

class RoleRepository extends Repository implements RepositoryInterface
{
	/**
	 * @param Role $model
	 * @return void
	 */
	public function __construct(Role $model)
	{
		parent::__construct($model);
	}
}
