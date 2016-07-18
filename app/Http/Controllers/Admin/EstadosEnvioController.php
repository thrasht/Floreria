<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use App\Estado_Envio;
use Illuminate\Http\Request;

class EstadosEnvioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('edit.estados_envio.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		Estado_Envio::create($req->all());

		return redirect()->action('QueriesController@estados_envio');
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
		$estado_envio = Estado_Envio::findOrFail($id);

		return view('edit.estados_envio.edit', compact('estado_envio'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $req)
	{
		$estado_envio = Estado_Envio::findOrFail($id);

		$estado_envio->fill($req->all());
		$estado_envio->save();


		return redirect()->action('QueriesController@estados_envio');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Estado_Envio::destroy($id);


		return redirect()->action('QueriesController@estados_envio');
	}

}
