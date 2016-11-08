<?php

namespace App\Repositories;

use DB;
use App\Models\District;

class DistrictRepository
{
	protected $model;

	public function __construct()
	{
		$this->model = new District;
	}

	public function all()
	{
		return $this->model->all();
	}
}