<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignacion;
use App\Asign;
use App\Persona;
use DB;
use App;
use Barryvdh\DomPDF\Facade as PDF;

class AsignacionsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    } 

    
    public function principal()
	{

		//
		
        return view('home');
	}

	

	public function index()
	{
		//
		$activos = Activo::all();
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
		Activo::create($request->all());
		//dd(Activo::create($request->all()));
    	return redirect('/vista');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$persona = DB::select("SELECT a.*, p.*, c.*
								FROM asignacions a, personas p, cargos c
								WHERE a.id = $id
								AND p.id = a.persona_id
								AND p.cargo_id = c.id");

		$activos = DB::select("SELECT asi.*, ac.*
								FROM asigns asi, actiapros ac
								WHERE  asi.asignacion_id = $id
								AND asi.actiapro_id = ac.id");


		// $activos = DB::select('SELECT a.*, asi.*, p.*, ac.*
		// 						FROM asignacions a, asigns asi, personas p, actiapros ac
		// 						WHERE a.id = "$id"
		// 						AND a.persona_id = p.id
		// 						AND a.id = asi.asignacion_id 
		// 						AND asi.actiapro_id = ac.id');

		

		// $asignados = DB::select("SELECT a.id, p.*
		// 						FROM asignacions a, personas p
		// 						WHERE a.id = '$id'
		// 						AND a.persona_id = p.id");

		// $asignados = DB::select("SELECT asi.*, per.*
		// 						FROM asignacions asi, personas per
		// 						WHERE asi.id = '$id' 
		// 						AND asi.persona_id = per.id");

		

		// dd($asignados[0]->nombre);

		// dd($activos);


		

		$fecha = date("d/m/Y");
        $pdf = PDF::loadView('reportes.asignacion', compact('persona', 'activos', 'fecha'))->setPaper('letter', 'landscape');
        return $pdf->stream();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$asig = Asignacion::find($id);
		$asi = Asign::where("asignacion_id","=",$id);

		//$gruposcon = Grupo::all();
		return view('activos.editar', compact('asig','asi'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
		$activo = Activo::find($id);
		$activo->codigo_actual = $request->input('codigo_actual');
    	$activo->fecha_compra = $request->input('fecha_compra');
    	$activo->ufv = $request->input('ufv');
    	$activo->valor = $request->input('valor');
    	$activo->descripcion = $request->input('descripcion');
    	$activo->fuente_financiamiento = $request->input('fuente_financiamiento');
    	$activo->grupo_id = $request->input('grupo_id');
    	$activo->auxiliar_id = $request->input('auxiliar_id');
    	$activo->estado = $request->input('estado');
    	$activo->save();
		return redirect('/vista');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$asignacion = Asignacion::find($id);
		$asignacion->delete();
		$asign = Asign::where("asignacion_id","=",$id);

		foreach ($asign as $value) {
			$value->delete();
		}

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
		
		// $actiapros = Actiapro::all();
  //       return view('actiaprob.listaractapro', compact('actiapros'));

		$results = DB::select('SELECT aa.id, aa.fecha, aa.piso, per.nombre, per.ap_pat
							FROM asignacions aa, personas per
							WHERE aa.persona_id = per.id');
		
		return view('prueba.listar', compact('results'));
	}
}
