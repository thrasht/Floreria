<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Proveedor;
use Faker\Factory as Faker;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class DireccionEnvioTableSeeder extends Seeder {

    public function run()
    {

		$faker = Faker::create();

		foreach(range(1,55000) as $index)
		{
			if(rand(1,1000) == 500)
				$id_estado = rand(1,32);
			else
				$id_estado = 24;

			$estado = \DB::table('Estados_Envio')->where('id', $id_estado)->first();


			\DB::table('Direccion_Envio')->insertGetId(array(

				'id_estado'			=> $id_estado,
				'cp' 				=> $faker->postcode,
				'direccion' 		=> $faker->address,
				'nombre_destinat' 	=> $faker->name,
				'hora_entrega'		=> rand(8,22),
				'costo'				=> $estado->costo,
				
			));
		}

        // TestDummy::times(20)->create('App\Post');
    }

}