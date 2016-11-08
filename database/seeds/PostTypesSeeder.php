<?php

use Illuminate\Database\Seeder;

class PostTypesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('post_types')->insert([
			['id' => '1', 'name' => 'Pérdida'],
			['id' => '2', 'name' => 'Evento'],
			['id' => '3', 'name' => 'Adopción'],
		]);
	}
}
