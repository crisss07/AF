<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use App\Actiapro;


use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function asignacion(){
        $activos = Actiapro::all();
        $fecha = date("d/m/Y");
        $pdf = PDF::loadView('reportes.asignacion', compact('activos', 'fecha'))->setPaper('letter', 'landscape');
        return $pdf->stream();

    }

    public function devolucion(){
        $activos = Actiapro::all();
        $fecha = date("d/m/Y");
        $pdf = PDF::loadView('reportes.devolucion', compact('activos', 'fecha'))->setPaper('letter', 'landscape');
        return $pdf->stream();

    }


    public function inventarioCodigoActivo(){
        $activos = Actiapro::all();
        $fecha = date("d/m/Y");
        //dd($activos);
        $pdf = PDF::loadView('reportes.codigoactivo', compact('activos', 'fecha'))->setPaper('letter', 'landscape');
        return $pdf->stream();

    }

    public function inventarioGrupoContable(){
        $activos = Actiapro::all();
        $fecha = date("d/m/Y");
        $pdf = PDF::loadView('reportes.grupocontable', compact('activos', 'fecha'))->setPaper('letter', 'landscape');
        return $pdf->stream();

    }

    public function inventarioAuxiliarContable(){
        $activos = Actiapro::all();
        $fecha = date("d/m/Y");
        $pdf = PDF::loadView('reportes.contable', compact('activos', 'fecha'))->setPaper('letter', 'landscape');
        return $pdf->stream();

    }

    public function inventarioOficina(){
        $activos = Actiapro::all();
        $fecha = date("d/m/Y");
        $pdf = PDF::loadView('reportes.oficina', compact('activos', 'fecha'))->setPaper('letter', 'landscape');
        return $pdf->stream();

    }

    public function inventarioOficinaResponsable(){
        $activos = Actiapro::all();
        $fecha = date("d/m/Y");
        $pdf = PDF::loadView('reportes.oficinaresponsable', compact('activos', 'fecha'))->setPaper('letter', 'landscape');
        return $pdf->stream();

    }


}
