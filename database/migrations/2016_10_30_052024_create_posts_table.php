<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->text('description');
			$table->boolean('status')->default(true);
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->integer('post_type_id')->unsigned()->nullable();

			$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade')
				  ->onUṕdate('cascade');

			$table->foreign('post_type_id')
			      ->references('id')
			      ->on('post_types')
			      ->onDelete('set null')
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
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign(['user_id']);
			$table->dropForeign(['post_type_id']);
		});

		Schema::drop('posts');
	}
}