<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Activo;
use App\Actiapro;
use App\Grupo;

class ActivosController extends Controller
{
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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$activo = Activo::find($id);
		$gruposcon = Grupo::all();
		return view('activos.editar', compact('activo','gruposcon'));
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
		$activo = Activo::find($id);
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

