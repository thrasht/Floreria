<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

//use Illuminate\Http\Request;
use App\Ocasion as Ocasion;
use Illuminate\Http\Request;

class OcasionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ocasiones = Ocasion::paginate();

		return view('queries/ocasiones');	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		

		return view('edit.ocasions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		Ocasion::create($req->all());

		return redirect()->action('QueriesController@ocasiones');
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
		$ocasion = Ocasion::findOrFail($id);

		return view('edit.ocasions.edit', compact('ocasion'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $req)
	{
		$ocasion = Ocasion::findOrFail($id);

		$ocasion->fill($req->all());
		$ocasion->save();


		return redirect()->action('QueriesController@ocasiones');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{	
		Ocasion::destroy($id);


		return redirect()->action('QueriesController@ocasiones');
	}

}
