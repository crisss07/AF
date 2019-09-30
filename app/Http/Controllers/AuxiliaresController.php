<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AuxiliaresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $grupos = DB::table('grupos')->where('activo', 1)->get();
        $auxiliares = DB::table('auxiliars')->where('activo', '=', 1)->get();
        return view('administracion.auxiliares.index')->with(compact('auxiliares', 'grupos'));
    }

    public function store(Request $request){
        $nombre = $request->input('nombre_aux');
        $grupo = $request->grupo_id;
        $hora = date("Y-m-d H:i:s");
        DB::table('auxiliars')->insertGetId(
            ['nombre' => $nombre, 'grupo_id' => $grupo, 'created_at' => $hora, 'updated_at' => $hora, 'activo' => 1]
        );
        return redirect('auxiliar/ver');
    }

    public function edit($id){
        $grupos = DB::table('grupos')->where('activo', 1)->get();
        $auxiliar = DB::table('auxiliars')->where('id', '=', $id)->get();
        return view('administracion.auxiliares.edit')->with(compact('auxiliar', 'grupos'));
    }

    public function update(Request $request, $id){
        $nombre = $request->input('nombre_aux');
        $grupo = $request->grupo_id;
        $hora = date("Y-m-d H:i:s");
        DB::table('auxiliars')->where('id', $id)->update(
            ['nombre' => $nombre, 'grupo_id' => $grupo, 'updated_at' => $hora]
        );
        return redirect('auxiliar/ver');
    }
    
    public function delete($id){
        $hora = date("Y-m-d H:i:s");
        DB::table('auxiliars')->where('id', $id)->update(
            ['updated_at' => $hora, 'activo' => 0]
        );
        return redirect('auxiliar/ver');
    }
}
