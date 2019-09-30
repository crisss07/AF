<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Soapclient;
use App\Activo;
use App\Cambio;
use App\Actiapro;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    public function prueba() {
        $fecha = new \DateTime();
        $client = new \Soapclient('http://ws01.bcb.gob.bo:8080/ServiciosBCB/indicadores?wsdl');
        $result = $client->obtenerIndicadorXML(array(
            'codIndicador' => '1',
            'codMoneda' => '76',
            'fecha' => $fecha->format('d/m/Y')
        ));
    $array = get_object_vars($result);
    $xml = simplexml_load_string($array['return']);
        $varval = get_object_vars($xml->tipoCambio->valor);
        $valor = $varval[0];
           // dd($fecha->format('Y-m-d'));
            
       $cambios = new Cambio(array(
           'fecha'=>$fecha->format('Y-m-d'),
            'tcambio' => '7.56',
            'ufv'=>$valor
        ));
       $cambios->save();
     
    }

     public function prueba2() {
    $json = file_get_contents('https://api.lever.co/v0/postings/leverdemo?skip=1&limit=3&mode=json');
    $obj = json_decode($json);
    dd($obj);
    }

}
