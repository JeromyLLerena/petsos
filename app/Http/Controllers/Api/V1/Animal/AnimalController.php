<?php

namespace App\Http\Controllers\Api\V1\Animal;

use App\Http\Controllers\Controller;

use App\Repositories\AnimalRepository;

class AnimalController extends Controller
{
	protected $animal_repository;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(AnimalRepository $animal_repository)
	{
		$this->animal_repository = $animal_repository;
	}

	public function all()
	{
		return response()->json(['success' => ['animals' => $this->animal_repository->all()]], 200);
	}
}
