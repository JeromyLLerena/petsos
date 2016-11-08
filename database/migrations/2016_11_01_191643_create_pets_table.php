<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pets', function(Blueprint $table){
			$table->increments('id');
			$table->string('name');
			$table->integer('age')->nullable()->default(null);
			$table->string('photo_path')->nullable()->default(null);
			$table->integer('height')->nullable()->default(null);
			$table->boolean('status')->default(true);
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('race_id')->unsigned()->nullable();
			$table->timestamps();

			$table->foreign('user_id')
			      ->references('id')
			      ->on('users')
			      ->onDelete('cascade')
			      ->onUpdate('cascade');

			$table->foreign('race_id')
			      ->references('id')
			      ->on('races')
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
		Schema::table('pets', function(Blueprint $table){
			$table->dropForeign(['user_id']);
			$table->dropForeign(['race_id']);
		});

		Schema::drop('pets');
	}
}
