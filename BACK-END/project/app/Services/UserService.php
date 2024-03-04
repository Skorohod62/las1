<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Revalto\ServiceRepository\Service\AbstractService as Service;

class UserService extends Service
{
	/**
	 * @param UserRepositoryInterface $repository
	 * @return void
	 */
	public function __construct(UserRepositoryInterface $repository)
	{
		parent::__construct($repository);
	}
}
