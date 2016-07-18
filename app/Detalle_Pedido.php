<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Pedido extends Model {

	protected $table = 'Detalle_Pedido';
	protected $fillable = ['id_pedido', 'id_arreglo_floral', 'cantidad', 'subtotal'];

	public function arreglo()
	{
		return $this->hasOne('App\Arreglo', 'id', 'id_arreglo_floral');
	}

}
