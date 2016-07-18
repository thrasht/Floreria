<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenedor extends Model {

	//
	protected $table = 'Contenedores';
	protected $fillable = ['material', 'precio', 'disponibles'];

}
