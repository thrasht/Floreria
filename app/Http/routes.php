<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('pedidos', ['as' => 'pedidos', 'uses' => 'QueriesController@pedidos']);
Route::get('clientes', ['as' => 'clientes', 'uses' => 'QueriesController@clientes']);
Route::get('proveedores', ['as' => 'proveedores', 'uses' => 'QueriesController@proveedores']);
Route::get('arreglos', ['as' => 'arreglos', 'uses' => 'QueriesController@arreglos']);
Route::get('flores', ['as' => 'flores', 'uses' => 'QueriesController@flores']);
Route::get('ocasiones', ['as' => 'ocasiones', 'uses' => 'QueriesController@ocasiones']);
Route::get('estados_envio', ['as' => 'estados_envio', 'uses' => 'QueriesController@estados_envio']);
Route::get('tipos_flores', ['as' => 'tipos_flores', 'uses' => 'QueriesController@tipos_flores']);
Route::get('contenedores', ['as' => 'contenedores', 'uses' => 'QueriesController@contenedores']);
Route::get('compras_proveedores', ['as' => 'compras_proveedores', 'uses' => 'QueriesController@compras_proveedores']);
Route::get('direcciones_envio', ['as' => 'direcciones_envio', 'uses' => 'QueriesController@direcciones_envio']);
Route::get('repoPedidos', ['as' => 'repoPedidos', 'uses' => 'QueriesController@repoPedidos']);
Route::get('repoGanancias', ['as' => 'repoGanancias', 'uses' => 'QueriesController@repoGanancias']);
Route::get('repoCompras', ['as' => 'repoCompras', 'uses' => 'QueriesController@repoCompras']);
Route::get('admin', ['as' => 'admin', 'uses' => 'QueriesController@admin']);

Route::group(['prefix' => 'admin', 'namespace' => '\Admin'], function (){

	Route::resource('ocasions', 'OcasionsController');
	Route::resource('clientes', 'ClientesController');
	Route::resource('proveedores', 'ProveedoresController');
	Route::resource('estados_envio', 'EstadosEnvioController');
	Route::resource('tipos_flores', 'TiposFloresController');
	Route::resource('contenedores', 'ContenedoresController');
	Route::resource('direcciones_envio', 'DireccionesEnvioController');
	Route::resource('flores', 'FloresController');
	Route::resource('arreglos', 'ArreglosController');
	Route::resource('pedidos', 'PedidosController');
	Route::resource('reportes', 'ReportesController');

});

//mision de santiago 4 secc entrando por juan del jarro pasando farmacia y luego oxx entrando por franciscanos hasta clarisas 104
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
