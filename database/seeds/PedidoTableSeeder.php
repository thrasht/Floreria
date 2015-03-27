<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Proveedor;
use Faker\Factory as Faker;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PedidoTableSeeder extends Seeder {

    public function run()
    {
    	$begin = new DateTime( '2004-01-01' );
		$end = new DateTime( '2004-01-03' );

		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);

		foreach ( $period as $dt )
		{

			$id_cliente = rand(1,54104);
			$cliente = \DB::table('Clientes')->where('id', $id_cliente)->first();

			$id_dir = rand(1,55000);
			$dir = \DB::table('Direccion_Envio')->where('id', $id_dir)->first();

			\DB::table('Pedidos')->insert(array(

				'id_cliente' 			=> $id_cliente,
				'id_direccion_envio' 	=> $id_dir,
				'fecha_pedido' 			=> $dt->format("Y-m-d"),
				'fecha_entrega' 		=> $dt->format("Y-m-d"),
				'total'					=> 0.0
				
			));
			

		}


		

        // TestDummy::times(20)->create('App\Post');
    }

}