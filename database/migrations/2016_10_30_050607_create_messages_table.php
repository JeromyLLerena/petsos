<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->text('text');
			$table->timestamp('timestamp');
			$table->integer('user_id_from')->unsigned();
			$table->integer('user_id_to')->unsigned();

			$table->foreign('user_id_from')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');

			$table->foreign('user_id_to')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('messages', function(Blueprint $table) {
			$table->dropForeign(['user_id_from']);
			$table->dropForeign(['user_id_to']);
		});

		Schema::drop('messages');
	}
}
