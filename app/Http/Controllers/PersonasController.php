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
