# Floreria

This transaccional system is developed with Laravel 5 and Kendo UI Frameworks.

# Reason

The main reason of this project was to build a database 10 years long and make reports of the sales.

# Queries
All the queries are in OQL with MySQL and are located in Floreria/app/HtpControllers/QueriesController.php file.

https://github.com/thrasht/Floreria/blob/master/app/Http/Controllers/QueriesController.php

Examples:

-Querie of the most sell flower in one year

public function flores(Request $req)
	{
		global $chart;
		$flores = Flor::paginate();
		if($req->year == null)
			$req->year = '2013';
		if($req->chart == null)
			$req->chart = 'bars';
		$year =$req->year;
		$chart = $req->chart;
		$message = "Flor más vendida en el año";
		$repos = \DB::table('Pedidos')
			->leftJoin('Detalle_Pedido','Pedidos.id','=','Detalle_Pedido.id_pedido')
			->leftJoin('Arreglos_Florales','Detalle_Pedido.id_arreglo_floral','=', 'Arreglos_Florales.id')
			->leftJoin('Detalle_Arr_Flo','Detalle_Arr_Flo.id_arreglo_floral','=', 'Arreglos_Florales.id')
			->leftJoin('Flores','Detalle_Arr_Flo.id_flor','=', 'Flores.id')
			->select(\DB::raw('Flores.id as nombre, Flores.nombre as name, SUM(Detalle_Arr_Flo.cantidad) as total'))
			->where(\DB::raw('YEAR(fecha_pedido)'), '=', $req->year)
			->groupBy('Detalle_Arr_Flo.id_flor')
			->orderBy(\DB::raw('SUM(Detalle_Arr_Flo.cantidad)'), 'desc')
			->take(12)
			->get();
		return view('queries/flores', compact('flores', 'repos', 'chart', 'year', 'message'));
	}
