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
    	ini_set('memory_limit', '-1');
    	$begin = new DateTime( '2014-01-01' );
		$end = new DateTime( '2014-02-01' );

		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);

		foreach ( $period as $dt )
		{

			if($dt->format("m-d") == '01-01'
				|| $dt->format("m-d") == '02-14'
				|| $dt->format("m-d") == '05-10'
				|| $dt->format("m-d") == '11-02'
				|| $dt->format("m-d") == '12-12'
				|| $dt->format("m-d") == '12-25'
				)
				$cont = rand(600,800);
			else
				$cont = rand(290,370);

			foreach (range(1,$cont) as $key) 
			{
				
				$id_cliente = rand(700001,800000);
				$cliente = \DB::table('Clientes')->where('id', $id_cliente)->first();

				$id_dir = rand(700001,800000);
				$dir = \DB::table('Direccion_Envio')->where('id', $id_dir)->first();

				$id_pedido = \DB::table('Pedidos')->insertGetId(array(

					'id_cliente' 			=> $id_cliente,
					'id_direccion_envio' 	=> $id_dir,
					'fecha_pedido' 			=> $dt->format("Y-m-d"),
					'fecha_entrega' 		=> $dt->format("Y-m-d"),
					'total'					=> 0.0
					
				));
				
				$id_arreglo_floral = rand(900,10005);
				$arr_flo = \DB::table('Arreglos_Florales')->where('id', $id_arreglo_floral)->first();

				$detalles_arreglo = \DB::table('Detalle_Arr_Flo')->where('id_arreglo_floral', $id_arreglo_floral)->get();

				foreach ($detalles_arreglo as $detalle) 
				{
					$flor = \DB::table('Flores')->where('id', $detalle->id_flor)->first();

					if($flor->disponibles < $detalle->cantidad)
					{
						$id_proveedor = rand(1,300);
						$proveedor = \DB::table('Proveedores')->where('id', $id_proveedor)->first();

						$id_compra = \DB::table('Compras_Proveedores')->insertGetId(array(

						'id_proveedor' 			=> $id_proveedor,
						'total'		 			=> $flor->costo_fuera_temp * 1000,
						'fecha_comp_prov' 		=> $dt->format("Y-m-d")
					
						));

						\DB::table('Detalle_Comp_Prov')->insert(array(

						'id_compra' 	=> $id_compra,
						'id_flor'		=> $flor->id,
						'cantidad' 		=> 1000,
						'subtotal'		=> $flor->costo_fuera_temp * 1000
					
						));

						\DB::table('Proveedores')
			            ->where('id', $id_proveedor)
			            ->update(array('total_pagos' => $proveedor->total_pagos + ($flor->costo_fuera_temp * 1000)));

			            \DB::table('Flores')
			            ->where('id', $flor->id)
			            ->update(array('disponibles' => $flor->disponibles + 1000));

					}

					$flor = \DB::table('Flores')->where('id', $detalle->id_flor)->first();

					\DB::table('Flores')
			            ->where('id', $flor->id)
			            ->update(array('disponibles' => $flor->disponibles - $detalle->cantidad));

				}

				\DB::table('Detalle_Pedido')->insert(array(

					'id_pedido' 			=> $id_pedido,
					'id_arreglo_floral' 	=> $id_arreglo_floral,
					'cantidad' 				=> 1,
					'subtotal' 				=> $arr_flo->total
					
				));

				\DB::table('Pedidos')
	            ->where('id', $id_pedido)
	            ->update(array('total' => $arr_flo->total + $dir->costo));

				\DB::table('Clientes')
	            ->where('id', $id_cliente)
	            ->update(array('total_compras' => $cliente->total_compras + $arr_flo->total + $dir->costo));
        	}

		}


		

        // TestDummy::times(20)->create('App\Post');
    }

}