<?php

namespace App\Repositories;

use DB;
use App\Models\Pet;
use App\Repositories\EloquentRepository;

class PetRepository extends EloquentRepository
{
	protected $model;

	public function __construct()
	{
		$this->model = new Pet;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function save($data)
	{
		$pet = null;
		if (array_key_exists('id', $data)) {
			$pet = $this->model->find($data['id']);
		} else {
			$pet = $this->model;
		}

		if (array_key_exists('name', $data)) {
			$pet->name = $data['name'];
		}

		if (array_key_exists('age', $data)) {
			$pet->age = $data['age'];
		}

		if (array_key_exists('photo_path', $data)) {
			$pet->photo_path = $data['photo_path'];
		}

		if (array_key_exists('height', $data)) {
			$pet->height = $data['height'];
		}

		if (array_key_exists('user_id', $data)) {
			$pet->user_id = $data['user_id'];
		}

		if (array_key_exists('race_id', $data)) {
			$pet->race_id = $data['race_id'];
		}

		if (array_key_exists('status', $data)) {
			$pet->status = $data['status'];
		}

		$pet->save();

		return (object) $pet->toArray();
	}
}