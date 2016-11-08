<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('username');
			$table->string('password', 60);
			$table->string('email');
			$table->boolean('status')->default(true);
			$table->timestamps();
			$table->integer('district_id')->unsigned()->nullable();
			$table->integer('user_type_id')->unsigned()->nullable();

			$table->foreign('district_id')
				  ->references('id')
				  ->on('districts')
				  ->onDelete('set null')
				  ->onUpdate('cascade');

			$table->foreign('user_type_id')
				  ->references('id')
				  ->on('user_types')
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
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign(['district_id']);
			$table->dropForeign(['user_type_id']);
		});

		Schema::drop('users');
	}
}
