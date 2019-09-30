<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DepartamentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $deptos = DB::table('deptos')->where('activo', '=', 1)->get();
        return view('administracion.departamentos.index')->with(compact('deptos'));
    }

    public function store(Request $request){
        $deptos = $request->input('depto'); 
        DB::table('deptos')->insertGetId(
            ['depto' => "$deptos", 'activo' => 1]
        );
        return redirect('dep/ver');
    }

    public function show(){

    }

    public function edit($id){
        $deptos = DB::table('deptos')->where('id', '=', $id)->get();
        //dd($cargo);
        return view('administracion.departamentos.edit')->with(compact('deptos'));
    }

    public function update(Request $request, $id){
        $deptos = $request->input('depto');
        DB::table('deptos')->where('id', $id)->update(
            ['depto' => $deptos]
        );
        return redirect('dep/ver');
    }
    
    public function delete(Request $request, $id){
        $deptos = $request->input('depto');
        DB::table('deptos')->where('id', $id)->update(
            ['activo' => 0]
        );
        return redirect('dep/ver');
    }
}
