<?php namespace App\Http\Controllers;

use App\Estado_Envio;
use App\Pedido;
use App\Cliente;
use App\Proveedor;
use App\Arreglo;
use App\Flor;
use App\Ocasion;
use App\Tipo_Flor;
use App\Contenedor;
use App\Direccion_Envio;
use App\Compra_Proveedor;

use Illuminate\Http\Request;



class QueriesController extends Controller {

	protected $chart = 0;

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */

	public function clientes(Request $req)
	{
		global $chart;
		$clientes = Cliente::paginate();

		if($req->year == null)
			$req->year = '2013';

		if($req->chart == null)
			$req->chart = 'bars';

		$year =$req->year;
		$chart = $req->chart;
		$message = "Mejores clientes en el año";


		$repos = \DB::table('Pedidos')
			->leftJoin('Clientes','Pedidos.id_cliente','=', 'Clientes.id')
			->select(\DB::raw('Clientes.id as nombre, Clientes.correo as correo, Clientes.nombre as name, SUM(Pedidos.total) as total'))
			->where(\DB::raw('YEAR(fecha_pedido)'), '=', $req->year)
			->groupBy('Clientes.id')
			->orderBy(\DB::raw('SUM(Pedidos.total)'), 'desc')
			->take(12)
			->get();

		return view('queries/clientes', compact('clientes','repos', 'year', 'chart', 'message'));
	}

	public function proveedores(Request $req)
	{
		global $chart;
		$proveedores = Proveedor::name($req->name)->paginate();

		if($req->year == null)
			$req->year = '2013';

		if($req->chart == null)
			$req->chart = 'bars';

		$year =$req->year;
		$chart = $req->chart;
		$message = "Proveedores a los que más se les compro en el año";


		$repos = \DB::table('Compras_Proveedores')
			->leftJoin('Proveedores','Proveedores.id','=', 'Compras_Proveedores.id_proveedor')
			->select(\DB::raw('Proveedores.id as nombre, Proveedores.nombre as name, Proveedores.correo as correo, SUM(Compras_Proveedores.total) as total'))
			->where(\DB::raw('YEAR(fecha_comp_prov)'), '=', $req->year)
			->groupBy('Proveedores.id')
			->orderBy(\DB::raw('SUM(Compras_Proveedores.total)'), 'desc')
			->take(12)
			->get();

		return view('queries/proveedores', compact('proveedores','repos', 'year', 'chart', 'message'));
	}

	public function arreglos(Request $req)
	{
		global $chart;
		$arreglos = Arreglo::paginate();

		if($req->year == null)
			$req->year = '2013';

		if($req->chart == null)
			$req->chart = 'bars';

		$year =$req->year;
		$chart = $req->chart;
		$message = "Arreglos más vendidos en el año";


		$repos = \DB::table('Pedidos')
			->leftJoin('Detalle_Pedido','Pedidos.id','=','Detalle_Pedido.id_pedido')
			->leftJoin('Arreglos_Florales','Detalle_Pedido.id_arreglo_floral','=', 'Arreglos_Florales.id')
			->select(\DB::raw(' Arreglos_Florales.id as nombre, 
								Arreglos_Florales.nombre as name,
			 					count(Detalle_Pedido.id_arreglo_floral) as total'))
			->where(\DB::raw('YEAR(fecha_pedido)'), '=', $req->year)
			->groupBy('Detalle_Pedido.id_arreglo_floral')
			->orderBy(\DB::raw('count(Detalle_Pedido.id_arreglo_floral)'), 'desc')
			->take(12)
			->get();

		//dd($arreglos[0]->flores);
		return view('queries/arreglos', compact('arreglos','repos', 'year', 'chart', 'message'));
	}

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

	public function estados_envio(Request $req)
	{
		global $chart;
		$estados_envio = Estado_Envio::paginate();

		if($req->year == null)
			$req->year = '2013';

		if($req->chart == null)
			$req->chart = 'bars';

		$year =$req->year;
		$chart = $req->chart;
		$message = "Estados con más envíos en el año";


		$repos = \DB::table('Pedidos')
			->leftJoin('Direccion_Envio','Pedidos.id_direccion_envio','=','Direccion_Envio.id')
			->leftJoin('Estados_Envio','Estados_Envio.id','=', 'Direccion_Envio.id_estado')
			->select(\DB::raw('Estados_Envio.id as nombre, Estados_Envio.nombre as name, COUNT(Estados_Envio.id) as total'))
			->where(\DB::raw('YEAR(fecha_pedido)'), '=', $req->year)
			->groupBy('Estados_Envio.id')
			->orderBy(\DB::raw('COUNT(Estados_Envio.id)'), 'desc')
			->take(12)
			->get();

		return view('queries/estados_envio', compact('estados_envio', 'repos', 'year', 'chart', 'message'));
	}

	public function ocasiones(Request $req)
	{
		global $chart;
		$ocasiones = Ocasion::paginate();

		if($req->year == null)
			$req->year = '2013';

		if($req->chart == null)
			$req->chart = 'bars';

		$year =$req->year;
		$chart = $req->chart;
		$message = "Ocasiones con más ventas en el año";


		$repos = \DB::table('Pedidos')
			->leftJoin('Detalle_Pedido','Pedidos.id','=','Detalle_Pedido.id_pedido')
			->leftJoin('Arreglos_Florales','Detalle_Pedido.id_arreglo_floral','=', 'Arreglos_Florales.id')
			->leftJoin('Ocasiones','Ocasiones.id','=', 'Arreglos_Florales.id_ocasion')
			->select(\DB::raw('Ocasiones.id as nombre, Ocasiones.nombre as name, COUNT(Ocasiones.id) as total'))
			->where(\DB::raw('YEAR(fecha_pedido)'), '=', $req->year)
			->groupBy('Ocasiones.id')
			->orderBy(\DB::raw('COUNT(Ocasiones.id)'), 'desc')
			->take(12)
			->get();


		return view('queries/ocasiones', compact('ocasiones', 'repos', 'year', 'chart', 'message'));
	}

	public function tipos_flores(Request $req)
	{
		global $chart;
		$tipos_flores = Tipo_Flor::paginate();

		if($req->year == null)
			$req->year = '2013';

		if($req->chart == null)
			$req->chart = 'bars';

		$year =$req->year;
		$chart = $req->chart;
		$message = "Tipos de flores más vendidas en el año";


		$repos = \DB::table('Pedidos')
			->leftJoin('Detalle_Pedido','Pedidos.id','=','Detalle_Pedido.id_pedido')
			->leftJoin('Arreglos_Florales','Detalle_Pedido.id_arreglo_floral','=', 'Arreglos_Florales.id')
			->leftJoin('Detalle_Arr_Flo','Detalle_Arr_Flo.id_arreglo_floral','=', 'Arreglos_Florales.id')
			->leftJoin('Flores','Detalle_Arr_Flo.id_flor','=', 'Flores.id')
			->leftJoin('Tipos_Flores','Tipos_Flores.id','=', 'Flores.id_tipo')
			->select(\DB::raw('Tipos_Flores.id as nombre, Tipos_Flores.nombre as name, SUM(Detalle_Arr_Flo.cantidad) as total'))
			->where(\DB::raw('YEAR(fecha_pedido)'), '=', $req->year)
			->groupBy('Tipos_Flores.id')
			->orderBy(\DB::raw('SUM(Detalle_Arr_Flo.cantidad)'), 'desc')
			->take(12)
			->get();


		return view('queries/tipos_flores', compact('tipos_flores', 'repos', 'year', 'chart', 'message'));
	}

	public function contenedores(Request $req)
	{
		global $chart;
		$contenedores = Contenedor::paginate();

		if($req->year == null)
			$req->year = '2013';

		if($req->chart == null)
			$req->chart = 'bars';

		$year =$req->year;
		$chart = $req->chart;
		$message = "Contenedores preferidos en el año";


		$repos = \DB::table('Pedidos')
			->leftJoin('Detalle_Pedido','Pedidos.id','=','Detalle_Pedido.id_pedido')
			->leftJoin('Arreglos_Florales','Detalle_Pedido.id_arreglo_floral','=', 'Arreglos_Florales.id')
			->leftJoin('Contenedores','Contenedores.id','=', 'Arreglos_Florales.id_contenedor')
			->select(\DB::raw('Contenedores.id as nombre, Contenedores.material as name, count(Contenedores.id) as total'))
			->where(\DB::raw('YEAR(fecha_pedido)'), '=', $req->year)
			->groupBy('Contenedores.id')
			->orderBy(\DB::raw('count(Contenedores.id)'), 'desc')
			->take(12)
			->get();

		return view('queries/contenedores', compact('contenedores', 'repos', 'year', 'chart', 'message'));
	}

	public function compras_proveedores(Request $req)
	{
		global $chart;
		$compras_proveedores = Compra_Proveedor::Idproveedor($req->id)->Fechaini($req->fechaini)->paginate();


		if($req->year == null)
			$req->year = '2013';

		if($req->chart == null)
			$req->chart = 'bars';

		$year =$req->year;
		$chart = $req->chart;
		$message = "Gráfica de compras a proveedores en el año";


		$repos = \DB::table('Compras_Proveedores')
			->select(\DB::raw('MONTH(fecha_comp_prov) as nombre, sum(total) as total'))
			->where(\DB::raw('YEAR(fecha_comp_prov)'), '=', $req->year)
			->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
			->get();

		return view('queries/compras_proveedores', compact('compras_proveedores', 'repos', 'year', 'chart', 'message'));
	}

	public function direcciones_envio(Request $req)
	{
		global $chart;
		$direcciones_envio = Direccion_Envio::paginate();

		if($req->year == null)
			$req->year = '2013';

		if($req->chart == null)
			$req->chart = 'bars';

		$year =$req->year;
		$chart = $req->chart;
		$message = "Direcciones con más envíos en el año";


		$repos = \DB::table('Pedidos')
			->leftJoin('Direccion_Envio','Pedidos.id_direccion_envio','=', 'Direccion_Envio.id')
			->select(\DB::raw('Direccion_Envio.id as nombre, Direccion_Envio.direccion as name, Direccion_Envio.cp as cp, COUNT(Direccion_Envio.id) as total'))
			->where(\DB::raw('YEAR(fecha_pedido)'), '=', $req->year)
			->groupBy('Direccion_Envio.id')
			->orderBy(\DB::raw('COUNT(Direccion_Envio.id)'), 'desc')
			->take(12)
			->get();

		return view('queries/direcciones_envio', compact('direcciones_envio', 'repos', 'year', 'chart', 'message'));
	}

	public function pedidos(Request $req)
	{	
		global $chart;
		$pedidos = Pedido::paginate();

		if($req->year == null)
			$req->year = '2013';

		if($req->chart == null)
			$req->chart = 'bars';

		$year = $req->year;
		$chart = $req->chart;
		$message = "Gráfica de ventas en el año";


		$repos = \DB::table('Pedidos')
			->select(\DB::raw('MONTH(fecha_pedido) as nombre, sum(total) as total'))
			->where(\DB::raw('YEAR(fecha_pedido)'), '=', $req->year)
			->groupBy(\DB::raw('MONTH(fecha_pedido)'))
			->get();

		//dd($repoPedidos[0]->total);

		return view('queries/pedidos', compact('pedidos','repos', 'year', 'chart', 'message'));	

	}

	public function admin()
	{



		return view('reportes/admin');
	}

	public function repoPedidos(Request $req)
	{

		if($req->chart == null)
			$req->chart = 'bars';

		$chart = $req->chart;


		$repos[0] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2004')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[1] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2005')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[2] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2006')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[3] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2007')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[4] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2008')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[5] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2009')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[6] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2010')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[7] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2011')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[8] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2012')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[9] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2013')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();


		return view('reportes/repoPedidos', compact('repos', 'chart'));
	}

	public function repoCompras(Request $req)
	{
		if($req->chart == null)
			$req->chart = 'bars';

		$chart = $req->chart;


		$repos[0] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2004')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos[1] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2005')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos[2] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2006')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos[3] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2007')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos[4] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2008')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos[5] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2009')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos[6] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2010')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos[7] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2011')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos[8] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2012')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos[9] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2013')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		return view('reportes/repoCompras', compact('repos', 'chart'));
	}


	public function repoGanancias(Request $req)
	{

		if($req->chart == null)
			$req->chart = 'bars';

		$chart = $req->chart;


		/********************Reportes de vantas***************************/

		$repos[0] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2004')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[1] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2005')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[2] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2006')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[3] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2007')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[4] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2008')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[5] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2009')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[6] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2010')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[7] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2011')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[8] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2012')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();

		$repos[9] = \DB::table('Pedidos')
						->select(\DB::raw('fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_pedido)"), "=", '2013')
						->groupBy(\DB::raw('MONTH(fecha_pedido)'))
						->get();



		/********************Reportes de compras***************************/
		$repos2[0] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2004')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos2[1] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2005')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos2[2] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2006')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos2[3] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2007')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos2[4] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2008')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos2[5] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2009')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos2[6] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2010')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos2[7] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2011')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos2[8] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2012')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		$repos2[9] = \DB::table('Compras_Proveedores')
						->select(\DB::raw('fecha_comp_prov as fecha, SUM(total) as total'))
						->where(\DB::raw("YEAR(fecha_comp_prov)"), "=", '2013')
						->groupBy(\DB::raw('MONTH(fecha_comp_prov)'))
						->get();

		
						

		return view('reportes/repoGanancias', compact('repos', 'repos2', 'chart'));
	}
/*
	public function reportes()
	{	
		\App::make('dompdf'); //Note: in 0.6.x this will be 'dompdf.wrapper'

		$string = '

		<div style="border: 5px solid red; width: 50%; padding: 0 0 0 0; margin-left: 25%">
			<h1>enviaflores.com<h1>
		</div>




		<table cellspacing="0" cellpadding="10" width="500" border="1px">
        <thead>
          <tr>
            <th>#</th>
            <th>id_cliente</th>
            <th>id_dir_envio</th>
            <th>fecha_ped</th>
            <th>fecha_ent</th>
            <th>total</th>
          </tr>
        </thead>
        <tbody>';

        foreach($pedidos as $pedido)
		{
			$string = $string . '<tr align="center">
            <td>' . $pedido->id . '</td>
            <td>' . $pedido->id_cliente . '</td>
            <td>' . $pedido->id_direccion_envio . '</td>
            <td>' . $pedido->fecha_pedido . '</td>
            <td>' . $pedido->fecha_entrega . '</td>
            <td>' . $pedido->total . '</td>
          </tr>';

		}

		$string = $string . '</tbody>
      	</table>';

		$pdf->loadHTML($string);
		return $pdf->stream();

	}

	*/


}
