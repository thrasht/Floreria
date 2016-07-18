<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra_Proveedor extends Model {

	//
	protected $table = 'Compras_Proveedores';

	public function proveedor()
	{
		return $this->hasOne('App\Proveedor', 'id', 'id_proveedor');
	}

	public function scopeIdproveedor($query, $id)
	{
		if($id != "")
			$query->where('id_proveedor', $id);

	}

	public function scopeFechaini($query, $fechaini)
	{
		if($fechaini != "")
			$query->where('fecha_comp_prov', '>', '$fechaini');

	}

}
