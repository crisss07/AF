<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Soapclient;
use App\Actiapro;
use App\Activo;
use App\Cambio;
use DB;


class ActiaprosController extends Controller
{
    public function principal()
	{
		//
		
        return view('home');
	}

	

	public function index()
	{
		//aqui es donde obtenemos los datos de cambios
		$fechas = new \DateTime();
		$fecha = $fechas->format('Y-m-d');
		$cam = DB::table('cambios')->where('fecha', $fecha)->first();
		//dd($cam);
		if (!$cam)
		{
			$client = new \Soapclient('http://ws01.bcb.gob.bo:8080/ServiciosBCB/indicadores?wsdl');
        	$result = $client->obtenerIndicadorXML(array(
            'codIndicador' => '1',
            'codMoneda' => '76',
            'fecha' => $fechas->format('d/m/Y')
        	));
	    
	    	$array = get_object_vars($result);
	    	$xml = simplexml_load_string($array['return']);
	        $varval = get_object_vars($xml->tipoCambio->valor);
	        $valor = $varval[0];
	                       
	    $cambios = new Cambio(array(
	           'fecha'=>$fechas->format('Y-m-d'),
	            'tcambio' => '7.56',
	            'ufv'=>$valor
	        ));
	    $cambios->save();
		}        

       //aqui optenemos los datos de los activos fijos registrados
		$nactivos = DB::select('select count(*) as nro
											from actiapros');

		$asig = DB::select('select count(*) as nro
											from asignacions');

		$dep = DB::select('select count(*) as nro
											from asignacions');

		$act = DB::select('select g.nombre, tmp.nro
							from grupos g, (select grupo_id, count(grupo_id) as nro
									from actiapros
									GROUP BY(grupo_id))tmp
							where g.id = tmp.grupo_id');

		// dd($nactivos);
		$actiapros = DB::table('actiapros')
             ->select('grupo_id', DB::raw('count(grupo_id) as total'))
             ->groupBy('grupo_id')
             ->get();
        // dd($actiapros[0]->grupo_id);
        return view('home', compact('nactivos','actiapros', 'asig', 'dep', 'act'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return view('formulario');
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
		return view('editar', compact('activo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function actualizar($id)
	{	
		$activo = Activo::find($id);
		$actapro = new Actiapro(array(
			'codigo' => $activo->codigo,
			'fecha'=>$activo->fecha,
			'precio'=>$activo->precio,
			'descripcion'=>$activo->descripcion,
			'grupo'=>$activo->grupo,
			'auxiliar'=>$activo->auxiliar,
			'estado'=>$activo->estado
		));
		$actapro->save();		
		$activo->delete();		
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


	public function prueba()
	{
		$results = DB::select('SELECT aa.id, aa.fecha, aa.piso, per.nombre, per.ap_pat
								FROM asignacions aa, personas per
								WHERE aa.persona_id = per.id');
			
			return view('prueba.listar', compact('results'));
	}

	
}


	
	
	
	