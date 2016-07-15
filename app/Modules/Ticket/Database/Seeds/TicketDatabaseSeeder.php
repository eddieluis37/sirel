<?php
namespace App\Modules\Ticket\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;



use Faker\Factory as Faker;

use App\Modules\Ticket\Models\Importance;

use App\Modules\Ticket\Models\Ticket;

use App\Modules\Ticket\Models\Type;



class TicketDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

			// Cuando llamamos al método create del Modelo Importance
			// se está creando una nueva fila en la tabla.

			Importance::create(
				[
					'name'		=>'baja',
				]
			);

			Importance::create(
				[
					'name'		=>'media',
				]
			);

			Importance::create(
				[
					'name'		=>'alta',
				]
			);

			////////////////////////////////////**********\\\\\\\\\\\\\\\\\\\\\\\\\


			Type::create(
				[
					'name'		=>'incidencia',
				]
			);

			Type::create(
				[
					'name'		=>'fallo',
				]
			);

			Type::create(
				[
					'name'		=>'solicitud',
				]
			);

	}

}
