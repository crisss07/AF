<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Actiapro;
use App\Asignacion;
use App\Asign;
use DB;

class PersonasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
  {
    $nombre = $request->input('nombre');
    $ap_pat = $request->input('ap_pat');
    $ap_mat = $request->input('ap_mat');
    $ci = $request->input('ci');
    $cargo_id = $request->input('cargo_id');
    $oficina_id = $request->input('oficina_id');

    DB::table('personas')->insertGetId([
      'nombre'=>$nombre,
      'ap_pat'=>$ap_pat,
      'ap_mat'=>$ap_mat,
      'ci'=>$ci,
      'cargo_id'=>$cargo_id,
      'oficina_id'=>$oficina_id,
      'activo'=>'1'
    ]);
    return redirect('/personas');
  }

  public function show()
  {
    $datos = DB::select('SELECT p.*,o.*,c.*
                        FROM personas p, oficinas o, cargos c
                        WHERE p.activo = "1"
                        AND p.cargo_id = c.id
                        AND p.oficina_id = o.id');
    // dd($datos);
    return view('personas.lista', compact('datos'));
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

	public function personas()
	{

		$personas = Persona::all();
		$actapross = DB::select('SELECT *
								FROM actiapros
								WHERE id NOT IN (SELECT DISTINCT actiapro_id FROM asigns)
								ORDER BY id');


        //$actapross = Actiapro::all();
        return view('asignacion.asignar', compact('personas','actapross'));
	}

	public function crearasig(Request $request)
	{

        $registro = Asignacion::create(
        [	'fecha' => $request['fecha'],
            'piso'  => $request['piso'],
            'persona_id' => $request['persona_id']
        ]);

       $id=$registro->id;


        foreach ($request->actiapro_id as $value) {
        	//printf($value);
        	Asign::create(
        		['actiapro_id' => $value,
        		'asignacion_id' => $id
        	]);
        }


        return redirect('/asignados');
        //return view('asignacion.asignar', compact('personas','actapross'));
	}


}
