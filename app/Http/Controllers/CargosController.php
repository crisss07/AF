<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CargosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $cargos = DB::table('cargos')->where('activo', '=', 1)->get();
        return view('administracion.cargos.index')->with(compact('cargos'));
    }

    public function store(Request $request){
        $cargo = $request->input('cargo'); 
        DB::table('cargos')->insertGetId(
            [
            'cargo' => "$cargo", 
            'activo' => 1
            ]
        );
        return redirect('cargo/ver');
    }

    public function show(){

    }

    public function edit($id){
        $cargo = DB::table('cargos')->where('id', '=', $id)->get();
        //dd($cargo);
        return view('administracion.cargos.edit')->with(compact('cargo'));
    }

    public function update(Request $request, $id){
        $cargo = $request->input('cargo');
        DB::table('cargos')->where('id', $id)->update(
            ['cargo' => $cargo]
        );
        return redirect('cargo/ver');
    }
    
    public function delete(Request $request, $id){
        $cargo = $request->input('cargo');
        DB::table('cargos')->where('id', $id)->update(
            ['activo' => 0]
        );
        return redirect('cargo/ver');
    }
}
