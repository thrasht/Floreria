<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Comp_Prov extends Model {

	protected $table = 'Detalle_Comp_Prov';
	protected $fillable = ['id_compra', 'id_flor', 'cantidad', 'subtotal'];

}
