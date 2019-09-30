<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Piso;
use DB;

class PisosController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    //

    $piso = Piso::all();
        return view('activos.lista', compact('activos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('activos.formulario');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $piso = $request->input('piso');
    DB::table('pisos')->insertGetId([
      'piso'=>$piso,
      'activo'=>'1'
    ]);
    return redirect('/pisos');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show()
  {
    $piso = DB::select('SELECT *
                FROM pisos
                WHERE activo = "1"');
    return view('pisos.lista', compact('piso'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
   public function edit($id){
         $piso = DB::table('pisos')->where('id', '=', $id)->get();
         //dd($cargo);
         return view('administracion.pisos.edit')->with(compact('piso'));
     }

     public function update(Request $request, $id){
         $piso = $request->input('piso');
         DB::table('pisos')->where('id', $id)->update(
             ['piso' => $piso]
         );
         return redirect('pisos');
     }

     public function delete(Request $request, $id){
         $piso = $request->input('piso');
         DB::table('pisos')->where('id', $id)->update(
             ['activo' => 0]
         );
         return redirect('pisos');
     }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
    $piso = Piso::find($id);
    $activo->delete();

    return back();
  }

  public function actualizar($id)
  {
    $activo = Activo::find($id);
    $actiapro = new Actiapro(array(
      'codigo_anterior'=>$activo->codigo_anterior,
      'codigo_actual' => $activo->codigo_actual,
      'fecha_compra'=>$activo->fecha_compra,
      'ufv'=>$activo->ufv,
      'valor'=>$activo->valor,
      'descripcion'=>$activo->descripcion,
      'fuente_financiamiento'=>$activo->fuente_financiamiento,
      'grupo_id'=>$activo->grupo_id,
      'auxiliar_id'=>$activo->auxiliar_id,
      'estado'=>$activo->estado,
      'color'=>$activo->color,
      'material_marca'=>$activo->material_marca,
      'modelo_medida'=>$activo->modelo_medida,
      'serie'=>$activo->serie,
      'procesador'=>$activo->procesador,
      'memoria_ram'=>$activo->memoria_ram,
      'disco_duro'=>$activo->disco_duro,
      'accesorios'=>$activo->accesorios,
      'observaciones'=>$activo->observaciones

    ));
    $actiapro->save();
    $activo->delete();
    return redirect('/vista');
  }

  public function notification($type)
    {
        switch ($type) {
            case 'message':
                alert()->message('Notificación solo con mensaje');
                break;
            case 'basic':
                alert()->basic('Notificación Básica, mensaje y título', 'Título');
                break;
            case 'info':
                alert()->info('Notificación tipo Información');
                break;
            case 'success':
                alert()->success('Notificación de Éxito.','Título')->autoclose(3000);
                break;
            case 'error':
                alert()->error('Notificación de Error');
                break;
            case 'warning':
                alert()->warning('Notificación de Advertencia');
                break;
        }

        return redirect()->route('home');
    }

    public function listar()
  {
    //

    $actiapros = Actiapro::all();
        return view('actiaprob.listaractapro', compact('actiapros'));
  }


}
