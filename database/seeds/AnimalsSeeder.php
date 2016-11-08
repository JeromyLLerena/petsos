<?php

use Illuminate\Database\Seeder;

class AnimalsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('animals')->insert([
			['id' => '1', 'name' => 'Perro'],
			['id' => '2', 'name' => 'Gato']
		]);
	}
}
