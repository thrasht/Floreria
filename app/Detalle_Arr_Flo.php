<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Arr_Flo extends Model {

	protected $table = 'Detalle_Arr_Flo';
	protected $fillable = ['id_arreglo_floral', 'id_flor', 'cantidad', 'subtotal'];

	public function flor()
	{

		return $this->hasOne('App\Flor', 'id', 'id_flor');
	}



}
