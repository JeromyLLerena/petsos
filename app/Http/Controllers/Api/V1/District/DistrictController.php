<?php

namespace App\Http\Controllers\Api\V1\District;

use App\Http\Controllers\Controller;

use App\Repositories\DistrictRepository;

class DistrictController extends Controller
{
	protected $district_repository;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(DistrictRepository $district_repository)
	{
		$this->district_repository = $district_repository;
	}

	public function all()
	{
		return response()->json(['success' => ['districts' => $this->district_repository->all()]], 200);
	}
}
