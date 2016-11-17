<?php

namespace App\Http\Controllers\Api\V1\PostType;

use App\Http\Controllers\Controller;

use App\Repositories\PostTypeRepository;

class PostTypeController extends Controller
{
	protected $post_type_repository;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(PostTypeRepository $post_type_repository)
	{
		$this->post_type_repository = $post_type_repository;
	}

	public function all()
	{
		return response()->json(['success' => ['post_types' = >$this->post_type_repository->all()]], 200);
	}
}
