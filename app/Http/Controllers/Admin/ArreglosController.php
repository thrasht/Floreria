<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Ocasion;
use App\Contenedor;
use App\Arreglo;

class ArreglosController extends Controller {

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
	public function create(Request $req)
	{
		if($req->ocasion == null)
		{
			$ocasiones = Ocasion::paginate();

			return view('edit.arreglos.selecciona_ocasion', compact('ocasiones'));
		}

		if($req->contenedor == null)
		{
			$contenedores = Contenedor::paginate();

			return view('edit.arreglos.selecciona_contenedor', compact('contenedores'));
		}

		$ocasion = json_decode($req->ocasion);
		//dd($ocasion);
		return view('edit.arreglos.create', compact('ocasion'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		$arreglo = Arreglo::findOrFail($id);

		return view('edit.arreglos.detalle', compact('arreglo'));
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
