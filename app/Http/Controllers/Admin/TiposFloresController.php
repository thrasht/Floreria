<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use App\Tipo_Flor;
use Illuminate\Http\Request;

class TiposFloresController extends Controller {

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
		return view('edit.tipos_flores.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		Tipo_Flor::create($req->all());

		return redirect()->action('QueriesController@tipos_flores');
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
		$tipo_flor = Tipo_Flor::findOrFail($id);

		return view('edit.tipos_flores.edit', compact('tipo_flor'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $req)
	{
		$tipo_flor = Tipo_Flor::findOrFail($id);

		$tipo_flor->fill($req->all());
		$tipo_flor->save();


		return redirect()->action('QueriesController@tipos_flores');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tipo_Flor::destroy($id);


		return redirect()->action('QueriesController@tipos_flores');
	}

}
