@extends('layouts.app1')

@section('css')



@endsection

@section('contenido')
    
    
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="1349">{{ $nactivos[0]->nro }}</span>
                </div>
                <div class="desc"> Activos Registrados </div>
            </div>
            <a class="more" href="javascript:;"> Lista
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="12,5">{{ $asig[0]->nro }}</span>
                </div>
                <div class="desc"> Activos Asignados </div>
            </div>
            <a class="more" href="javascript:;"> Lista
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="549">{{ $nactivos[0]->nro - ($asig[0]->nro + $dep[0]->nro) }}</span>
                </div>
                <div class="desc"> Activos Disponibles </div>
            </div>
            <a class="more" href="javascript:;"> Lista
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number"> 
                    <span data-counter="counterup" data-value="89">{{ $dep[0]->nro }}</span> </div>
                <div class="desc"> Activos en Dep&oacute;sito </div>
            </div>
            <a class="more" href="javascript:;"> Lista
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
 
       

    <!-- <div class="portlet light bordered" id="piechart_3d" style="width: 550px; 
        height: 600px;

        display:block;

        margin-top :10px;

        margin-right: 10px;

        margin-left: 15px;

        float:left;

        min-height:10px;">
      
    </div> -->
    

    <!-- <div class="row"> -->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Compra de activos</h4>
                        <div>
                            <canvas id="chart1" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detalle de Activos</h4>
                        <div>
                            <canvas id="chart3" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
    <!-- </div> -->


    <!-- <div class="portlet light bordered" style="width: 550px; 
            height: 600px;

            display:block;

            margin-top :10px;

            float:left;

            min-height:50px;">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase font-green-haze">Activos Fijos por Grupo Contable</span>
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                <a href="javascript:;" class="reload"> </a>
                <a href="javascript:;" class="fullscreen"> </a>
                <a href="javascript:;" class="remove"> </a>
            </div>
        </div>
        <div class="portlet-body">
            <div id="chart_1" class="chart" style="height: 500px;"> </div>
        </div>
        
    </div> -->

@endsection


@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Grupo Contable', 'Cantidad'],
          ['EDIFICACIONES', 3],
          ['MUEBLES Y ENSERES DE OFICINA', 4000],
          ['MAQUINARIA EN GENERAL', 100],
          ['EQUIPO DE COMUNICACION', 800],
          ['EQUIPO EDUCACIONAL Y RECREATIVO', 1750],
          ['VEHICULOS AUTOMOTORES', 15],
          ['EQUIPOS DE COMPUTACION', 3500],
          ['OTROS ACTIVOS FIJOS', 1200],
          ['OTRA MAQUINARIA Y EQUIPO (DEPENDIENTE SEGUN OBJ.GASTO DE 03: MAQUINARIA EN GENERAL)', 132],
          
            
        /* 
          @foreach ($actiapros as $actapro)
            ['{{ $actapro->grupo_id}}', {{ $actapro->total}}],

           EDIFICACIONES
            MUEBLES Y ENSERES DE OFICINA
            MAQUINARIA EN GENERAL
            EQUIPO DE COMUNICACION
            EQUIPO EDUCACIONAL Y RECREATIVO
            VEHICULOS AUTOMOTORES
            EQUIPOS DE COMPUTACION
            OTROS ACTIVOS FIJOS
            OTRA MAQUINARIA Y EQUIPO (DEPENDIENTE SEGUN OBJ.GASTO DE 03: MAQUINARIA EN GENERAL)
            OTROS
          @endforeach*/
        ]);


        // var options = {
        //   title: 'Grupos Contables Activos Fijos',
        //   is3D: true,
        // };

        // var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        // chart.draw(data, options);
        <?php $dep = DB::select('select count(grupo_id) as nro from actiapros'); ?>


        new Chart(document.getElementById("chart1"),
        {
            "type":"line",
                //"data":{"labels":["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                "data":{"labels":["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio"],
                "datasets":[{
                    "label":"Compras por mes",
                    //"data":[65,59,80,81,0,0,0,0,0,0,0,0],
                    "data":[5,6,100,8,0,2,3],
                    "fill":false,
                    "borderColor":"rgb(86, 192, 216)",
                    "lineTension":0.1
                }]
            },"options":{}});

        
        
        new Chart(document.getElementById("chart3"),
        {
            "type":"pie",
            "data":{"labels":["EDIFICACIONES","MUEBLES Y ENSERES DE OFICINA", "MAQUINARIA EN GENERAL", "VEHICULOS AUTOMOTORES"],
            "datasets":[{
                "label":"My First Dataset",
                "data":[<?php echo '2' ?>, <?php echo '52' ?>, <?php echo '1' ?>, <?php echo '1' ?>],

                
                "backgroundColor":["rgb(255, 0, 0)","rgb(0, 182, 60)"]}
                ]}
        });

         

      }

</script>

 <!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('pages/scripts/charts-amcharts.min.js')}}" type="text/javascript"></script>

<script src="{{ asset('global/plugins/Chart.js/Chart.min.js')}}"></script>
<!-- END PAGE LEVEL SCRIPTS -->




@endsection