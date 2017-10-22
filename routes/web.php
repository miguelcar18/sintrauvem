<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'principal', 'uses' => 'BackController@index']);
Auth::routes();
Route::get('/register', ['as' => 'register', 'uses' => 'UserController@register']);
Route::resource('usuarios', 'UserController');
Route::resource('afiliados', 'AfiliadoController');
Route::resource('disciplinas', 'DisciplinaController');
Route::resource('atletas', 'AtletaController');
Route::resource('eventos', 'EventoController');
Route::resource('elecciones', 'EleccionesController');
Route::get('buscarAtleta/{id?}', ['as' => 'buscarAtleta', 'uses' =>'AtletaController@buscarAtleta']);
Route::get('atletas-consultar', ['as' => 'atletas.consultar', 'uses' =>'AtletaController@consultar']);
Route::get('direccionConsulta/{disciplina?}/{sexo?}', ['as' => 'direccionConsulta', 'uses' =>'AtletaController@resultados']);
Route::get('direccionReporte/{disciplina?}/{sexo?}', ['as' => 'direccionReporte', 'uses' =>'AtletaController@reporte']);
Route::resource('eventos', 'EventoController');
Route::get('restaurar-contrasena', ['as' => 'change_password', 'uses' =>'LoginController@changePassword']);
Route::post('profile/change-password', ['as' => 'postChangePassword', 'uses' => 'LoginController@postChangePassword']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);