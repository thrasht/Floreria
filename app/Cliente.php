<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

	//
	protected $table = 'Clientes';

	protected $fillable = ['nombre', 'direccion', 'telefono', 'correo', 'total_compras'];
	protected $guarded = array('nombre', 'direccion', 'telefono', 'correo', 'total_compras');

}
