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
	public function __construct()
    {
        $this->middleware('auth');
    }
    
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
	
	public function contar()
	{
		$auxiliar_id = Input::get('auxiliar_id');
		$num = DB::select("SELECT SUM(nro1 + nro2 + 1) as nro
							FROM (SELECT count(*) as nro1
									FROM activos
									WHERE auxiliar_id = '$auxiliar_id')tmp, (SELECT count(*) as nro2
																FROM actiapros
																WHERE auxiliar_id = '$auxiliar_id')tmp1");

		return response()->json($num);
	}

	public function ppp()
	{
		$auxiliar_id = Input::get('auxiliar_id');
		$num = DB::select("SELECT count(*) as nro
							FROM actiapros
							WHERE auxiliar_id = 1");

		$num1 = DB::select("SELECT count(*) as nro
							FROM activos
							WHERE auxiliar_id = 1");

		$sum = $num[0]->nro + $num1[0]->nro;

		dd($sum);
	}

	public function consulta_ufv()
	{
		$fecha = Input::get('fecha_compra');
		$fec = DB::select("SELECT ufv
							FROM cambios
							WHERE fecha like '$fecha'");
		return response()->json($fec);
	}

}
