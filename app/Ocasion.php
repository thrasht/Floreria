<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocasion extends Model {

	//
	protected $table = 'Ocasiones';

	protected $fillable = ['nombre'];
	protected $guarded = array('nombre');

}
