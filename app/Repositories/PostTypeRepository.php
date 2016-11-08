<?php

namespace App\Repositories;

use DB;
use App\Models\PostType;

class PostTypeRepository
{
	protected $model;

	public function __construct()
	{
		$this->model = new PostType;
	}

	public function all()
	{
		return $this->model->all();
	}
}