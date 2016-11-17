<?php

namespace App\Http\Controllers\Api\V1\UserType;

use App\Http\Controllers\Controller;

use App\Repositories\UserTypeRepository;

class UserTypeController extends Controller
{
	protected $user_type_repository;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(UserTypeRepository $user_type_repository)
	{
		$this->user_type_repository = $user_type_repository;
	}

	public function all()
	{
		return response()->json(['success' => ['user_types' => $this->user_type_repository->all()]], 200);
	}
}
