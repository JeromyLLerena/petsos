<?php

namespace App\Http\Controllers\Api\V1\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon as Carbon;
use App\Repositories\MessageRepository;
use App\Repositories\UserRepository;

class MessageController extends Controller
{
	protected $message_repository;
	protected $user_repository;

	public function __construct(MessageRepository $message_repository, UserRepository $user_repository)
	{
		$this->message_repository = $message_repository;
		$this->user_repository = $user_repository;
	}

	public function sendMessage(Request $request)
	{
		$message_data = [
			'text' => $request->get('text'),
			'user_id_to' => $request->get('to'),
			'user_id_from' => $request->user()->id,
			'timestamp' => Carbon::now()
		];

		$message = $this->message_repository->save($message_data);
		$prev_message = $this->message_repository->findPreviousMessage($request->user()->id, $request->get('to'));

		$update_data = [
			'id' => $message->id,
			'root_id' => $prev_message ? $prev_message->id : $message->id
		];

		$this->message_repository->save($update_data);

		return response()->json(['success' => 'Message created'], 200);
	}

	public function getConversation(Request $request, $another_user_id)
	{/*
		$messages = $this->message_repository->getUserConversation($request->user()->id, $another_user_id);
		$another_user = $this->user_repository->find($another_user_id);

		return response()->json([
			'success' => [
				'another_user' => $another_user,
				'messages' => $messages
			]
		], 200);
		*/
	}

	public function getLastestMessages(Request $request)
	{
		$messages = $this->message_repository->getUserConversations($request->user()->id);

		return response()->json(['success' => ['messages' => $messages]], 200);
	}
}
