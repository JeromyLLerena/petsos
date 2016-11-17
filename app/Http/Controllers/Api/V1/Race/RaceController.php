<?php

namespace App\Http\Controllers\Api\V1\Race;

use App\Http\Controllers\Controller;

use App\Repositories\RaceRepository;

class RaceController extends Controller
{
	protected $race_repository;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(RaceRepository $race_repository)
	{
		$this->race_repository = $race_repository;
	}

	public function all()
	{
		return response()->json(['success' => ['races' => $this->race_repository->all()]], 200);
	}
}
