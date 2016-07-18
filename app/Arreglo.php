<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Arreglo extends Model {

	//
	protected $table = 'Arreglos_Florales';
	protected $fillable = ['id_ocasion', 'id_contenedor', 'nombre', 'total'];


	public function ocasion()
	{
		return $this->hasOne('App\Ocasion', 'id', 'id_ocasion');
	}

	public function contenedor()
	{
		return $this->hasOne('App\Contenedor', 'id', 'id_contenedor');
	}

	public function detalles()
	{
		return $this->hasMany('App\Detalle_Arr_Flo', 'id_arreglo_floral', 'id');
	}



}
