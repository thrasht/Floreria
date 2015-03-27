<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Proveedor;
use Faker\Factory as Faker;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ProveedorTableSeeder extends Seeder {

    public function run()
    {
		$faker = Faker::create();

		foreach(range(1,300) as $index)
		{
			\DB::table('Proveedores')->insert(array(

				'nombre' 		=> $faker->company,
				'direccion' 	=> $faker->address,
				'telefono' 		=> $faker->phoneNumber,
				'correo' 		=> $faker->companyEmail,
				'total_pagos'	=> 0.0
				
			));
		}

        // TestDummy::times(20)->create('App\Post');
    }

}