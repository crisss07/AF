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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/indi', 'HomeController@prueba');

Route::get('/prueba2', 'HomeController@prueba2');

Route::get('/home', 'ActiaprosController@index');

Route::get('formulario', 'CategoriasController@grupos');

Route::post('create', 'ActivosController@store');//registrar datos del formulario

Route::get('json-auxiliars', 'CategoriasController@auxiliars');

Route::get('vista', 'ActivosController@index');//listar activos

Route::get('{id}/edit', 'ActivosController@edit');//editar registro de activo

Route::post('{id}/edit', 'ActivosController@update');//actualizar activo

Route::get('{id}/delete', 'ActivosController@destroy');//eliminar activo

Route::get('{id}/actualizar', 'ActivosController@actualizar');//actualizar activo

Route::get('listaractapro', 'ActivosController@listar');//listar activos

Route::get('asignar', 'PersonasController@personas');

Route::post('crearasig', 'PersonasController@crearasig');

Route::get('asignados', 'AsignacionsController@listar');//listar activos

//ASIGNACION DE ACTIVOS
Route::get('{id}/editasig', 'AsignacionsController@edit');//editar registro de activo asignado

Route::post('{id}/edit', 'AsignacionsController@update');//actualizar activo asignado

Route::get('{id}/deleteasig', 'AsignacionsController@destroy');//eliminar activo asignado

Route::get('{id}/actualizarasig', 'AsignacionsController@show');//actualizar activo asignado


Route::get('/table', function () {
    return view('prueba.table');
});

Route::get('/for','PruebasController@grupos');

Route::get('/mostrar', function () {
    return view('prueba.mostrar');
});


Route::get('/pdf', function () {

    $pdf = App::make('dompdf.wrapper');
	$pdf->loadHTML('<h1>Test</h1>');
	return $pdf->stream();
	
});

Route::get('/home/prueba2', function() {
    
    $url = urlencode ("https://api.lever.co/v0/postings/leverdemo?skip=1&limit=3&mode=json");

    $json = json_decode(file_get_contents($url), true);

    dd($json);
});

