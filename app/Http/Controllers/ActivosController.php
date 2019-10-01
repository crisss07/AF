<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Activo;
use App\Actiapro;
use App\Grupo;
use DB;
use Illuminate\Support\Collection as Collection;

class ActivosController extends Controller
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

		$activos = Activo::orderBy('id', 'DESC')->get();
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
		$codigo_actual = $request->input('codigo_actual');
		$fecha_compra = $request->input('fecha_compra');
		$ufv = $request->input('ufv');
		$grupo_id = $request->input('grupo_id');
		$auxiliar_id = $request->input('auxiliar_id');

		$valor = $request->input('valor');
		$descripcion = $request->input('descripcion');
		$fuente_financiamiento = $request->input('fuente_financiamiento');
		$estado = $request->input('estado');
		$observaciones = $request->input('observaciones');

		switch($grupo_id) {
				case 1:
				$modelo_medida = $request->input('modelo_medida_edificaciones');
				$material_marca = $request->input('material_marca_edificaciones');
				DB::table('activos')->insertGetId(
		            [
		            'codigo_actual' => "$codigo_actual", 
		            'fecha_compra' => "$fecha_compra", 
		            'ufv' => "$ufv", 
		            'grupo_id' => "$grupo_id", 
		            'auxiliar_id' => "$auxiliar_id", 
		            'valor' => "$valor", 
		            'descripcion' => "$descripcion", 
		            'fuente_financiamiento' => "$fuente_financiamiento", 
		            'estado' => "$estado", 
		            'observaciones' => "$observaciones", 
		            'modelo_medida' => "$modelo_medida", 
		            'material_marca' => "$material_marca"
		            ]
		        );
				break;
				case 2:
				$color= $request->input('color_muebles');
				$material_marca = $request->input('material_marca_muebles');
				$modelo_medida = $request->input('modelo_medida_muebles');
				DB::table('activos')->insertGetId(
		            [
		            'codigo_actual' => "$codigo_actual", 
		            'fecha_compra' => "$fecha_compra", 
		            'ufv' => "$ufv", 
		            'grupo_id' => "$grupo_id", 
		            'auxiliar_id' => "$auxiliar_id", 
		            'valor' => "$valor", 
		            'descripcion' => "$descripcion", 
		            'fuente_financiamiento' => "$fuente_financiamiento", 
		            'estado' => "$estado", 
		            'observaciones' => "$observaciones", 
		            'color' => "$color",
		            'material_marca' => "$material_marca", 
		            'modelo_medida' => "$modelo_medida"
		            ]
		        );
				break;
				case 3:
				$modelo_medida = $request->input('modelo_medida_maquinaria');
				$color = $request->input('color_maquinaria');
				DB::table('activos')->insertGetId(
		            [
		            'codigo_actual' => "$codigo_actual", 
		            'fecha_compra' => "$fecha_compra", 
		            'ufv' => "$ufv", 
		            'grupo_id' => "$grupo_id", 
		            'auxiliar_id' => "$auxiliar_id", 
		            'valor' => "$valor", 
		            'descripcion' => "$descripcion", 
		            'fuente_financiamiento' => "$fuente_financiamiento", 
		            'estado' => "$estado", 
		            'observaciones' => "$observaciones", 
		            'modelo_medida' => "$modelo_medida", 
		            'color' => "$color"
		            ]
		        );
				break;
				case 5:
				$material_marca= $request->input('material_marca_comunicacion');
				$modelo_medida = $request->input('modelo_medida_comunicacion');
				$serie = $request->input('serie_comunicacion');
				DB::table('activos')->insertGetId(
		            [
		            'codigo_actual' => "$codigo_actual", 
		            'fecha_compra' => "$fecha_compra", 
		            'ufv' => "$ufv", 
		            'grupo_id' => "$grupo_id", 
		            'auxiliar_id' => "$auxiliar_id", 
		            'valor' => "$valor", 
		            'descripcion' => "$descripcion", 
		            'fuente_financiamiento' => "$fuente_financiamiento", 
		            'estado' => "$estado", 
		            'observaciones' => "$observaciones", 
		            'material_marca' => "$material_marca",
		            'modelo_medida' => "$modelo_medida", 
		            'serie' => "$serie"
		            ]
		        );
				break;
				case 6:
				$material_marca= $request->input('material_marca_educacional');
				$color = $request->input('color_educacional');
				$modelo_medida = $request->input('modelo_medida_educacional');
				DB::table('activos')->insertGetId(
		            [
		            'codigo_actual' => "$codigo_actual", 
		            'fecha_compra' => "$fecha_compra", 
		            'ufv' => "$ufv", 
		            'grupo_id' => "$grupo_id", 
		            'auxiliar_id' => "$auxiliar_id", 
		            'valor' => "$valor", 
		            'descripcion' => "$descripcion", 
		            'fuente_financiamiento' => "$fuente_financiamiento", 
		            'estado' => "$estado", 
		            'observaciones' => "$observaciones", 
		            'material_marca' => "$material_marca", 
		            'color' => "$color", 
		            'modelo_medida' => "$modelo_medida"
		            ]
		        );

				break;
				case 8:
				$serie = $request->input('serie_vehiculos');
				$color = $request->input('color_vehiculos');
				$modelo_medida = $request->input('modelo_medida_vehiculos');
				$disco_duro = $request->input('disco_duro_vehiculos');
				DB::table('activos')->insertGetId(
		            [
		            'codigo_actual' => "$codigo_actual", 
		            'fecha_compra' => "$fecha_compra", 
		            'ufv' => "$ufv", 
		            'grupo_id' => "$grupo_id", 
		            'auxiliar_id' => "$auxiliar_id", 
		            'valor' => "$valor", 
		            'descripcion' => "$descripcion", 
		            'fuente_financiamiento' => "$fuente_financiamiento", 
		            'estado' => "$estado", 
		            'observaciones' => "$observaciones", 
		            'serie' => "$serie", 
		            'color' => "$color", 
		            'modelo_medida' => "$modelo_medida", 
		            'disco_duro' => "$disco_duro"
		            ]
		        );
				break;
				case 15:
				$material_marca = $request->input('material_marca_computacion');
				$modelo_medida = $request->input('modelo_medida_computacion');
				$serie = $request->input('serie_computacion');
				$procesador = $request->input('procesador_computacion');
				$memoria_ram = $request->input('memoria_ram_computacion');
				$disco_duro = $request->input('disco_duro_computacion');
				DB::table('activos')->insertGetId(
		            [
		            'codigo_actual' => "$codigo_actual", 
		            'fecha_compra' => "$fecha_compra", 
		            'ufv' => "$ufv", 
		            'grupo_id' => "$grupo_id", 
		            'auxiliar_id' => "$auxiliar_id", 
		            'valor' => "$valor", 
		            'descripcion' => "$descripcion", 
		            'fuente_financiamiento' => "$fuente_financiamiento", 
		            'estado' => "$estado", 
		            'observaciones' => "$observaciones", 
		            'material_marca' => "$material_marca", 
		            'modelo_medida' => "$modelo_medida", 
		            'serie' => "$serie", 
		            'procesador' => "$procesador", 
		            'memoria_ram' => "$memoria_ram", 
		            'disco_duro' => "$disco_duro", 
		            ]
		        );
				break;
				case 36:
				$material_marca = $request->input('material_marca_otros');
				$color = $request->input('color_otros');
				DB::table('activos')->insertGetId(
		            [
		            'codigo_actual' => "$codigo_actual", 
		            'fecha_compra' => "$fecha_compra", 
		            'ufv' => "$ufv", 
		            'grupo_id' => "$grupo_id", 
		            'auxiliar_id' => "$auxiliar_id", 
		            'valor' => "$valor", 
		            'descripcion' => "$descripcion", 
		            'fuente_financiamiento' => "$fuente_financiamiento", 
		            'estado' => "$estado", 
		            'observaciones' => "$observaciones", 
		            'material_marca' => "$material_marca", 
		            'color' => "$color" 
		            ]
		        );
				break;
				case 39:
				$material_marca= $request->input('material_marca_maquinaria');
				$color = $request->input('color_maquinaria');
				$serie = $request->input('serie_maquinaria');
				DB::table('activos')->insertGetId(
		            [
		            'codigo_actual' => "$codigo_actual", 
		            'fecha_compra' => "$fecha_compra", 
		            'ufv' => "$ufv", 
		            'grupo_id' => "$grupo_id", 
		            'auxiliar_id' => "$auxiliar_id", 
		            'valor' => "$valor", 
		            'descripcion' => "$descripcion", 
		            'fuente_financiamiento' => "$fuente_financiamiento", 
		            'estado' => "$estado", 
		            'observaciones' => "$observaciones", 
		            'material_marca' => "$material_marca", 
		            'color' => "$color", 
		            'serie' => "$serie" 
		            ]
		        );
				break;
				case 40:
				$material_marca= $request->input('material_marca_otro');
				$modelo_medida = $request->input('modelo_medida_otro');
				$serie = $request->input('serie_otro');
				DB::table('activos')->insertGetId(
		            [
		            'codigo_actual' => "$codigo_actual", 
		            'fecha_compra' => "$fecha_compra", 
		            'ufv' => "$ufv", 
		            'grupo_id' => "$grupo_id", 
		            'auxiliar_id' => "$auxiliar_id", 
		            'valor' => "$valor", 
		            'descripcion' => "$descripcion", 
		            'fuente_financiamiento' => "$fuente_financiamiento", 
		            'estado' => "$estado", 
		            'observaciones' => "$observaciones", 
		            'material_marca' => "$material_marca", 
		            'modelo_medida' => "$modelo_medida", 
		            'serie' => "$serie" 
		            ]
		        );
				break;
				default:
				
			}

		// dd($codigo);
		// Activo::create($request->all());
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

