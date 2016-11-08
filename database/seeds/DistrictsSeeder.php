<?php

use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('districts')->insert([
			['id' => '1', 'name' => 'Ancón‎'],
			['id' => '2', 'name' => 'Ate‎'],
			['id' => '3', 'name' => 'Barranco‎'],
			['id' => '4', 'name' => 'Breña‎'],
			['id' => '5', 'name' => 'Carabayllo‎'],
			['id' => '6', 'name' => 'Chaclacayo‎'],
			['id' => '7', 'name' => 'Chorrillos‎'],
			['id' => '8', 'name' => 'Cieneguilla‎'],
			['id' => '9', 'name' => 'Comas‎'],
			['id' => '10', 'name' => 'El Agustino‎'],
			['id' => '11', 'name' => 'Independencia'],
			['id' => '12', 'name' => 'Jesús María‎'],
			['id' => '13', 'name' => 'La Molina‎'],
			['id' => '14', 'name' => 'La Victoria‎'],
			['id' => '15', 'name' => 'Lima‎'],
			['id' => '16', 'name' => 'Lince‎'],
			['id' => '17', 'name' => 'Los Olivos‎'],
			['id' => '18', 'name' => 'Lurigancho-Chosica‎'],
			['id' => '19', 'name' => 'Lurín‎'],
			['id' => '20', 'name' => 'Magdalena del Mar‎'],
			['id' => '21', 'name' => 'Miraflores‎'],
			['id' => '22', 'name' => 'Pachacámac‎'],
			['id' => '23', 'name' => 'Pucusana‎'],
			['id' => '24', 'name' => 'Pueblo Libre‎'],
			['id' => '25', 'name' => 'Puente Piedra‎'],
			['id' => '26', 'name' => 'Punta Hermosa‎'],
			['id' => '27', 'name' => 'Punta Negra‎'],
			['id' => '28', 'name' => 'Rímac‎'],
			['id' => '29', 'name' => 'San Bartolo‎'],
			['id' => '30', 'name' => 'San Borja‎'],
			['id' => '31', 'name' => 'San Isidro‎'],
			['id' => '32', 'name' => 'San Juan de Lurigancho‎'],
			['id' => '33', 'name' => 'San Juan de Miraflores‎'],
			['id' => '34', 'name' => 'San Luis‎'],
			['id' => '35', 'name' => 'San Martín de Porres‎'],
			['id' => '36', 'name' => 'San Miguel‎'],
			['id' => '37', 'name' => 'Santa Anita‎'],
			['id' => '38', 'name' => 'Santa María del Mar‎'],
			['id' => '39', 'name' => 'Santa Rosa'],
			['id' => '40', 'name' => 'Santiago de Surco‎'],
			['id' => '41', 'name' => 'Surquillo‎'],
			['id' => '42', 'name' => 'Villa El Salvador‎'],
			['id' => '43', 'name' => 'Villa María del Triunfo‎']
		]);
	}
}
