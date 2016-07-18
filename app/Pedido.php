<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

	//
	protected $table = 'Pedidos';

	public function cliente()
	{
		return $this->hasOne('App\Cliente', 'id', 'id');
	}

	public function direccion()
	{
		return $this->hasOne('App\Direccion_Envio', 'id', 'id');
	}

	public function detalles()
	{
		return $this->hasMany('App\Detalle_Pedido', 'id_pedido', 'id');
	}


}
