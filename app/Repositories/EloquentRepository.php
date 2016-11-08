<?php

namespace App\Repositories;

class EloquentRepository
{
	protected $model;

	public function find($id)
	{
		return $this->model->find($id) ? (object) $this->model->find($id)->toArray() : null;
	}

	public function all()
	{
		return $this->model->all()->transform(function($item, $key){
			return (object) $item->toArray();
		})->toArray();
	}

	public function delete($id)
	{
		$admin = $this->find($id);

		if ($admin) {
			$admin->delete();
			$response = $id;
		} else {
			$response = $admin;
		}

		return $response;
	}
}
