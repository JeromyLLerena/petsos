<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $table = 'messages';

	public $timestamps = false;

	public function emisor()
	{
		return $this->belongsTo('App\Models\User', 'user_id_from');
	}

	public function receptor()
	{
		return $this->belongsTo('App\Models\User', 'user_id_to');
	}
}
