<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Soapclient;
use App\Activo;
use App\Cambio;

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
        return view('home');
        
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
