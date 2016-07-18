<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Proveedor;
use Faker\Factory as Faker;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ArregloTableSeeder extends Seeder {

    public function run()
    {
		$faker = Faker::create();

		foreach(range(1,9000) as $index)
		{
			$total = 0.0;

			$id_contenedor = rand(1,3);

			$id = \DB::table('Arreglos_Florales')->insertGetId(array(

				'id_ocasion' 	=> rand(1,16),
				'id_contenedor' => $id_contenedor,
				'nombre' 		=> $faker->firstNameFemale . ' ' . $faker->colorName,
				'total'			=> $total
				
			));

			$number = rand(3,7);
			
			foreach (range(1,$number) as $count) 
			{
				$id_flor = rand(1,74);
				$cant   = rand(1,10);

				if($id_flor == 65 || $id_flor == 66)
					$id_flor = $id_flor + 2;

				$flor = \DB::table('Flores')->where('id', $id_flor)->first();

				$sub_total = $flor->precio * $cant;
				$total = $total + $sub_total;

				\DB::table('Detalle_Arr_Flo')->insert(array(

				'id_arreglo_floral' => $id,
				'id_flor' 			=> $id_flor,
				'cantidad' 			=> $cant,
				'subtotal'			=> $sub_total
				
				));
			}

			$contenedor = \DB::table('Contenedores')->where('id', $id_contenedor)->first();

			DB::table('Arreglos_Florales')
            ->where('id', $id)
            ->update(array('total' => $total + $contenedor->precio));



		}

        // TestDummy::times(20)->create('App\Post');
    }

}