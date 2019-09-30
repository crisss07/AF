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

// Route::get('/home', 'ActiaprosController@index');

Route::get('formulario', 'CategoriasController@grupos');

Route::get('ppp', 'CategoriasController@ppp');

Route::post('create', 'ActivosController@store');//registrar datos del formulario

Route::get('json-auxiliars', 'CategoriasController@auxiliars');

Route::get('json-contar', 'CategoriasController@contar');

Route::get('json-conufv', 'CategoriasController@consulta_ufv');   //CONSULTA LA FECHA DE LAS UFVS

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
    return view('prueba.formulario');
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

Route::get('ariel', 'ActivosController@ariel');

// CREAR USUARIOS
Route::get('usuarios', 'UsuariosController@index');


//  REPORTES
Route::get('repAsignacion', 'ReportController@asignacion');
Route::get('repDevolucion', 'ReportController@devolucion');
Route::get('reporte', 'ReportController@test');
Route::get('Inv_Ord_Cod_Act', 'ReportController@inventarioCodigoActivo');
Route::get('Inv_Ord_Gr_Cont', 'ReportController@inventarioGrupoContable');
Route::get('Inv_Ord_Aux_Cont', 'ReportController@inventarioAuxiliarContable');
Route::get('Inv_Ord_Ofi', 'ReportController@inventarioOficina');
Route::get('Inv_Ord_Ofi_Resp', 'ReportController@inventarioOficinaResponsable');

// pisos
Route::get('/pisos','PisosController@show');
Route::post('crearPiso','PisosController@store');
Route::get('pisos/{id}/editar', 'PisosController@edit');
Route::post('pisos/{id}/actualizar', 'PisosController@update');
Route::post('pisos/{id}/eliminar', 'PisosController@delete');

// unidades
Route::get('/unidades','UnidadesController@show');
Route::post('crearUnidad','UnidadesController@store');
Route::get('unidades/{id}/editar', 'UnidadesController@edit');
Route::post('unidades/{id}/actualizar', 'UnidadesController@update');
Route::post('unidades/{id}/eliminar', 'UnidadesController@delete');

// personas
Route::get('/personas','PersonasController@show');
Route::post('crearPersona','PersonasController@store');
Route::get('personas/{id}/editar', 'PersonasController@edit');
Route::post('personas/{id}/actualizar', 'PersonasController@update');
Route::post('personas/{id}/eliminar', 'PersonasController@delete');


//RUTAS DE CARGO
Route::get('cargo/ver', 'CargosController@index');
Route::post('cargo/guardar', 'CargosController@store');
Route::get('cargo/{id}/editar', 'CargosController@edit');
Route::post('cargo/{id}/actualizar', 'CargosController@update');
Route::post('cargo/{id}/eliminar', 'CargosController@delete');

//RUTAS DE GRUPO
Route::get('grupo/ver', 'GruposController@index');
Route::post('grupo/guardar', 'GruposController@store');
Route::get('grupo/{id}/editar', 'GruposController@edit');
Route::post('grupo/{id}/actualizar', 'GruposController@update');
Route::post('grupo/{id}/eliminar', 'GruposController@delete');

//RUTAS DE AUXILIAR
Route::get('auxiliar/ver', 'AuxiliaresController@index');
Route::post('auxiliar/guardar', 'AuxiliaresController@store');
Route::get('auxiliar/{id}/editar', 'AuxiliaresController@edit');
Route::post('auxiliar/{id}/actualizar', 'AuxiliaresController@update');
Route::post('auxiliar/{id}/eliminar', 'AuxiliaresController@delete');


//RUTAS DE PRUEBA DEPARTAMENTO
Route::get('dep/ver', 'DepartamentosController@index');
Route::post('dep/guardar','DepartamentosController@store');
Route::get('dep/{id}/editar', 'DepartamentosController@edit');
Route::post('dep/{id}/actualizar', 'DepartamentosController@update');
Route::post('dep/{id}/eliminar', 'DepartamentosController@delete');

//RUTAS DE PRUEBA OFICINAS
Route::get('ofi/ver', 'OficinasController@index');
Route::post('ofi/guardar', 'OficinasController@store');
Route::get('ofi/{id}/editar', 'OficinasController@edit');
Route::post('ofi/{id}/actualizar', 'OficinasController@update');
Route::post('ofi/{id}/eliminar', 'OficinasController@delete');