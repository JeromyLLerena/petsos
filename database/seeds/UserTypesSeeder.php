<?php

use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('user_types')->insert([
			['id' => '1', 'name' => 'Usuario'],
			['id' => '2', 'name' => 'Organización']
		]);
	}
}
