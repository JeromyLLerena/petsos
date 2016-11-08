<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRacesTableAddAnimalIdColumn extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('races', function(Blueprint $table){
			$table->integer('animal_id')->unsigned()->nullable()->default(null);

			$table->foreign('animal_id')
			      ->references('id')
			      ->on('animals')
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
		Schema::table('races', function(Blueprint $table){
			$table->dropForeign(['animal_id']);
			$table->dropColumn('animal_id');
		});
	}
}
