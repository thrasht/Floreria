<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Cliente;
use Faker\Factory as Faker;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ClienteTableSeeder extends Seeder {

    public function run()
    {
		$faker = Faker::create();
		ini_set('memory_limit', '-1');

		foreach(range(1,1000000) as $index)
		{
			\DB::table('Clientes')->insert(array(

				'nombre' 		=> $faker->name,
				'direccion' 	=> $faker->optional()->address,
				'telefono' 		=> $faker->optional()->phoneNumber,
				'correo' 		=> $faker->optional()->email,
				'total_compras'	=> 0.0
				
			));
		}

        // TestDummy::times(20)->create('App\Post');
    }

}