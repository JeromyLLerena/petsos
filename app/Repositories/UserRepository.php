<?php

namespace App\Repositories;

use DB;
use App\Models\User;
use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
	protected $model;

	public function __construct()
	{
		$this->model = new User;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function save($data)
	{
		$user = null;
		if (array_key_exists('id', $data)) {
			$user = $this->model->find($data['id']);
		} else {
			$user = $this->model;
		}

		if (array_key_exists('name', $data)) {
			$user->name = $data['name'];
		}

		if (array_key_exists('username', $data)) {
			$user->username = $data['username'];
		}

		if (array_key_exists('email', $data)) {
			$user->email = $data['email'];
		}

		if (array_key_exists('password', $data)) {
			$user->password = $data['password'];
		}

		if (array_key_exists('user_type_id', $data)) {
			$user->user_type_id = $data['user_type_id'];
		}

		if (array_key_exists('district_id', $data)) {
			$user->district_id = $data['district_id'];
		}

		if (array_key_exists('status', $data)) {
			$user->status = $data['status'];
		}

		$user->save();

		return (object) $user->toArray();
	}

	public function getUserPosts($user_id)
	{
		$res = $this->model->find($user_id)->posts()->with('user')->get();

		return $res;
	}
}