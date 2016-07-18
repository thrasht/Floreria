<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Estado_Envio;
use App\Direccion_Envio;

class DireccionesEnvioController extends Controller {


	//$idEstado = 0;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($estado_envio = null)
	{

		//dd($estado_envio);
		//return view('edit.direcciones_envio.create', compact('estado_envio'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function idEstado($id)
	{
		$idEstado = $id;

		return view('edit.direcciones_envio.create', compact('idEstado'));
	}

	public function create(Request $req)
	{
		if($req->estado_envio != null)
		{
			$estado_envio = json_decode($req->estado_envio);
			//dd($estado_envio);
			return view('edit.direcciones_envio.create', compact('estado_envio'));
		}

		$estados_envio = Estado_Envio::paginate();


		return view('edit.direcciones_envio.selecciona_estado', compact('estados_envio'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		Direccion_Envio::create($req->all());

		return redirect()->action('QueriesController@direcciones_envio');
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

}
