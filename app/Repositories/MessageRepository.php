<?php

namespace App\Repositories;

use DB;
use App\Models\Message;
use App\Repositories\EloquentRepository;

class MessageRepository extends EloquentRepository
{
	protected $model;

	public function __construct()
	{
		$this->model = new Message;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function save($data)
	{
		$message = null;
		if (array_key_exists('id', $data)) {
			$message = $this->model->find($data['id']);
		} else {
			$message = $this->model;
		}

		if (array_key_exists('text', $data)) {
			$message->text = $data['text'];
		}

		if (array_key_exists('timestamp', $data)) {
			$message->timestamp = $data['timestamp'];
		}

		if (array_key_exists('user_id_from', $data)) {
			$message->user_id_from = $data['user_id_from'];
		}

		if (array_key_exists('user_id_to', $data)) {
			$message->user_id_to = $data['user_id_to'];
		}

		if (array_key_exists('root_id', $data)) {
			$message->root_id = $data['root_id'];
		}

		if (array_key_exists('read', $data)) {
			$message->read = $data['read'];
		}

		$message->save();

		return (object) $message->toArray();
	}

	public function findPreviousMessage($user_id, $another_user_id)
	{
		$res = $this->model
		            ->where(function($query) use ($user_id, $another_user_id){
		            	$query->where('user_id_from', $user_id)
		            	      ->where('user_id_to', $another_user_id);
		            })->orWhere(function($query) use ($user_id, $another_user_id){
		            	$query->where('user_id_from', $another_user_id)
		            	      ->where('user_id_to', $user_id);
		            })->first();

		return $res;
	}

	public function getUserConversations($user_id)
	{
		$last_messages = $this->model
		                      ->select(\DB::raw('max(id) as id'))
		                      ->where(function($query) use ($user_id){
		                        	$query->where('user_id_from', $user_id)
		                        	      ->orWhere('user_id_to', $user_id);
		                      })
		                      ->groupBy('root_id')
		                      ->pluck('id')
		                      ->transform(function($item, $key) use ($user_id) {
		                        	$tmp = (object) [];
		                        	$msj = $this->model->find($item);
		                        	$msj->user_id_from == $user_id ? $msj->receptor : $msj->emisor;
		                        	$tmp->message = $msj;

		                        	return $tmp;
		                      });

		return $last_messages;
	}
}