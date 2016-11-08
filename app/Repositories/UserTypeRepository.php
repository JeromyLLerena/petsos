<?php

namespace App\Repositories;

use DB;
use App\Models\UserType;

class UserTypeRepository
{
	protected $model;

	public function __construct()
	{
		$this->model = new UserType;
	}

	public function all()
	{
		return $this->model->all();
	}
}