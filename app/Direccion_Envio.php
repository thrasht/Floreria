<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion_Envio extends Model {

	//
	protected $table = 'Direccion_Envio';
	protected $fillable = ['id_estado', 'cp', 'direccion', 'nombre_destinat', 'hora_entrega', 'costo'];



	public function estado()
	{
		return $this->hasOne('App\Estado_Envio', 'id', 'id_estado');
	}

}
