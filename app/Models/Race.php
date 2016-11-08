<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	/*
	protected $fillable = [
		'name'
	];
	*/

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	/*
	protected $hidden = [];
	*/
	protected $table = 'races';

	public function animal()
	{
		return $this->belongsTo('App\Models\Animal', 'animal_id');
	}
}
