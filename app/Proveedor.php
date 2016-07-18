<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model {

	//
	protected $table = 'Proveedores'; 
	protected $fillable = ['nombre', 'direccion', 'telefono', 'correo', 'total_pagos'];


	public function scopeName($query, $name)
	{
		if($name != "")
			$query->where('nombre','LIKE', "%$name%");

	}

	

}
