<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UnidadesController extends Controller
{
  public function store(Request $request)
  {
    $unidad = $request->input('unidad');
    DB::table('unidads')->insertGetId([
      'unidad'=>$unidad,
      'activo'=>'1'
    ]);
    return redirect('/unidades');
  }

  public function show()
  {
    $datos = DB::select('SELECT *
                FROM unidads
                WHERE activo = "1"');
    return view('unidades.lista', compact('datos'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
   public function edit($id){
         $datos = DB::table('unidads')->where('id', '=', $id)->get();
         //dd($cargo);
         return view('administracion.unidades.edit')->with(compact('datos'));
     }

     public function update(Request $request, $id){
         $datos = $request->input('unidad');
         DB::table('unidads')->where('id', $id)->update(
             ['unidad' => $datos]
         );
         return redirect('unidades');
     }

     public function delete(Request $request, $id){
         $piso = $request->input('unidad');
         DB::table('unidads')->where('id', $id)->update(
             ['activo' => 0]
         );
         return redirect('unidades');
     }
}
