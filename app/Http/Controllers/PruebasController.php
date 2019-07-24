<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Grupo;
use App\Auxiliar;
use App\Persona;
use App\Actiapro;
use Soapclient;

class PruebasController extends Controller
{
    public function grupos()
	{	
		$fecha = new \DateTime();
     $client = new \Soapclient('http://ws01.bcb.gob.bo:8080/ServiciosBCB/indicadores?wsdl');
        $result = $client->obtenerIndicadorXML(array(
            'codIndicador' => '1',
            'codMoneda' => '76',
            'fecha' => $fecha->format('d/m/Y')
        ));
    $array = get_object_vars($result);
    $xml = simplexml_load_string($array['return']);
    
		$gruposcon = Grupo::all();
		return view('activos.formularios', compact('gruposcon','xml'));
	}

	public function auxiliars()
	{
		$grupo_id = Input::get('grupo_id');
		$auxiliar = Auxiliar::where('grupo_id','=', $grupo_id)->get();
		return response()->json($auxiliar);
	}
}
