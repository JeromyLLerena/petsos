<?php

namespace App\Repositories;

use DB;
use App\Models\Animal;

class AnimalRepository
{
	protected $model;

	public function __construct()
	{
		$this->model = new Animal;
	}

	public function all()
	{
		return $this->model->all();
	}
}