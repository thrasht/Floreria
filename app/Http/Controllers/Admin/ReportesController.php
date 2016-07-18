<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ReportesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $req)
	{

		if($req->chart == null)
			$req->chart = 'bars';


		if($req->date1 != null)
		$repo[0] = \DB::table('Pedidos')
						->select(\DB::raw('Pedidos.fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("MONTH(Pedidos.fecha_pedido)"),"=", \DB::raw("MONTH('".$req->date1."')"))
						->where(\DB::raw("DAY(Pedidos.fecha_pedido)"),"=",\DB::raw("DAY('".$req->date1."')"))
						->groupBy('Pedidos.fecha_pedido')
						->get();

		if($req->date2 != null)
		$repo[1] = \DB::table('Pedidos')
						->select(\DB::raw('Pedidos.fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("MONTH(Pedidos.fecha_pedido)"),"=", \DB::raw("MONTH('".$req->date2."')"))
						->where(\DB::raw("DAY(Pedidos.fecha_pedido)"),"=",\DB::raw("DAY('".$req->date2."')"))
						->groupBy('Pedidos.fecha_pedido')
						->get();

		if($req->date3 != null)
		$repo[2] = \DB::table('Pedidos')
						->select(\DB::raw('Pedidos.fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("MONTH(Pedidos.fecha_pedido)"),"=", \DB::raw("MONTH('".$req->date3."')"))
						->where(\DB::raw("DAY(Pedidos.fecha_pedido)"),"=",\DB::raw("DAY('".$req->date3."')"))
						->groupBy('Pedidos.fecha_pedido')
						->get();

		if($req->date4 != null)
		$repo[3] = \DB::table('Pedidos')
						->select(\DB::raw('Pedidos.fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("MONTH(Pedidos.fecha_pedido)"),"=", \DB::raw("MONTH('".$req->date4."')"))
						->where(\DB::raw("DAY(Pedidos.fecha_pedido)"),"=",\DB::raw("DAY('".$req->date4."')"))
						->groupBy('Pedidos.fecha_pedido')
						->get();

		if($req->date5 != null)
		$repo[4] = \DB::table('Pedidos')
						->select(\DB::raw('Pedidos.fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("MONTH(Pedidos.fecha_pedido)"),"=", \DB::raw("MONTH('".$req->date5."')"))
						->where(\DB::raw("DAY(Pedidos.fecha_pedido)"),"=",\DB::raw("DAY('".$req->date5."')"))
						->groupBy('Pedidos.fecha_pedido')
						->get();

		if($req->date6 != null)
		$repo[5] = \DB::table('Pedidos')
						->select(\DB::raw('Pedidos.fecha_pedido as fecha, SUM(total) as total'))
						->where(\DB::raw("MONTH(Pedidos.fecha_pedido)"),"=", \DB::raw("MONTH('".$req->date6."')"))
						->where(\DB::raw("DAY(Pedidos.fecha_pedido)"),"=",\DB::raw("DAY('".$req->date6."')"))
						->groupBy('Pedidos.fecha_pedido')
						->get();

		$date1 = $req->date1;
		$date2 = $req->date2;
		$date3 = $req->date3;
		$date4 = $req->date4;
		$date5 = $req->date5;
		$date6 = $req->date6;
		$chart = $req->chart;


		//dd($req->date);

		return view('reportes/repoFlores', compact('repo', 'date1', 'date2', 'date3', 'date4', 'date5', 'date6', 'chart'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $req)
	{
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function reporteFlores()
	{
		return view('pedidos');
	}

}
