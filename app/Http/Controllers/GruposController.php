<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GruposController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $grupos = DB::table('grupos')->where('activo', '=', 1)->get();
        return view('administracion.grupos.index')->with(compact('grupos'));
    }

    public function store(Request $request){
        $nombre = $request->input('grupo');
        $vida = $request->input('vida_util');
        $porcentaje = $request->input('porcentaje');
        $hora = date("Y-m-d H:i:s");
        DB::table('grupos')->insertGetId(
            ['nombre' => $nombre, 'vida_util' => $vida, 'porcentaje' => $porcentaje, 'created_at' => $hora, 'updated_at' => $hora, 'activo' => 1]
        );
        return redirect('grupo/ver');
    }

    public function edit($id){
        $grupo = DB::table('grupos')->where('id', '=', $id)->get();
        return view('administracion.grupos.edit')->with(compact('grupo'));
    }

    public function update(Request $request, $id){
        $nombre = $request->input('grupo');
        $vida = $request->input('vida_util');
        $porcentaje = $request->input('porcentaje');
        $hora = date("Y-m-d H:i:s");
        DB::table('grupos')->where('id', $id)->update(
            ['nombre' => $nombre, 'vida_util' => $vida, 'porcentaje' => $porcentaje, 'updated_at' => $hora]
        );
        return redirect('grupo/ver');
    }
    
    public function delete($id){
        $hora = date("Y-m-d H:i:s");
        DB::table('grupos')->where('id', $id)->update(
            ['updated_at' => $hora, 'activo' => 0]
        );
        return redirect('grupo/ver');
    }
}
