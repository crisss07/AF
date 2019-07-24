<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Grupo;
use App\Auxiliar;
use App\Persona;
use App\Actiapro;
use App\Cambio;
use DB;


class CategoriasController extends Controller
{
    public function grupos()
	{	
		$fechas = new \DateTime();
		$fecha = $fechas->format('Y-m-d');
   	    $cam = DB::table('cambios')->where('fecha', $fecha)->get();

		$gruposcon = Grupo::all();
		return view('activos.formulario', compact('gruposcon','cam'));
	}

	public function auxiliars()
	{
		$grupo_id = Input::get('grupo_id');
		$auxiliar = Auxiliar::where('grupo_id','=', $grupo_id)->get();
		return response()->json($auxiliar);
	}
	
}
