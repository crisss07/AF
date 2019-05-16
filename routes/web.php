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
    return view('login.prueba');
});

Route::get('prueba', function () {
    return view('prueba');
});

Route::get('abc', function () {
    return view('login');
});

Route::get('login',array('as'=>'login',function(){
    return view('login');
}));