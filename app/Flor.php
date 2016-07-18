<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Flor extends Model {

	//
	protected $table = 'Flores';
	protected $fillable = ['id_tipo','nombre', 'costo_temp', 'costo_fuera_temp', 'precio', 'disponibles'];



	public function tipo()
	{
		return $this->hasOne('App\Tipo_Flor', 'id', 'id_tipo');
	}

}
