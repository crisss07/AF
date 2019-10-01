@extends('layouts.app1')

@section('css')

<!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('global/plugins/socicon/socicon.css')}}" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/plugins/bootstrap-modal/css/bootstrap-modal.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript">
    //jquery para hacer select de select
    $('#grupo').on('change', function(e){
            var grupo_id = e.target.value;
                $('.item').hide('slow');
                $("#bloque_"+grupo_id).show('slow');

            // console.log(grupo_id);
            $.get('/json-auxiliars?grupo_id='+ grupo_id, function(data) {

            // console.log(data);
                $('#auxiliar').empty();
                $('#auxiliar').append('<option ="0" disable="true" selected="true">----Elija una opcion----</option>');
                    
                $.each(data, function(index, auxiliarsObj){
                    $('#auxiliar').append('<option value="'+ auxiliarsObj.id +'">'+ auxiliarsObj.nombre +'</option>');
                        
                    });
                });
            });

    $('#grupo').on('change', function(e){
        var gru_id = e.target.value;
        var g_id = ('000' + gru_id).slice(-4) ;  // "0001"

        $('#auxiliar').on('change', function(e){

            var aux_id = e.target.value;

                $.get('/json-contar?auxiliar_id='+ aux_id, function(data) {
                    $.each(data, function(index, contarObj){
                        var num = contarObj.nro;
                        var a_id = ('000' + num).slice(-4) ;  // "0001"
                        $("#codigo_actual").val('MPD-'+g_id+'-'+a_id);
                         
                    });
                });
        });
    });


    $('#fecha_compra').on('change', function(e){
            var fe = e.target.value;
                // console.log(grupo_id);
                $.get('/json-conufv?fecha_compra='+ fe, function(data) {
                    $.each(data, function(index, conufvObj){
                        var ufvs = conufvObj.ufv;
                        $("#ufv").val(ufvs);
                    });
        });
     });

    $('#valor').on('change', function(e){

        var grupo = document.getElementById('grupo').value;
        var aux = document.getElementById('auxiliar').value;
        
        $.get('/json-veriaux?auxiliar_id='+ aux, function(data) {
                    $.each(data, function(index, veriauxObj){
                        var nom = veriauxObj.nombre;
                        
                if (grupo == 1) {
                    var emodelo = document.getElementById('emodelo').value;
                    var ematerial = document.getElementById('ematerial').value;
                    $("#descripcion").val(nom+', DIMENSIONES: '+emodelo+', DIRECCION: '+ematerial);
                }

                if (grupo == 2) {
                    var myecolor = document.getElementById('myecolor').value;
                    var myematerial = document.getElementById('myematerial').value;
                    var myemedida = document.getElementById('myemedida').value;
                    $("#descripcion").val(nom+', COLOR: '+myecolor+', MATERIAL: '+myematerial+', MEDIDA: '+myemedida);
                }

                if (grupo == 3) {
                    var memodelo = document.getElementById('memodelo').value;
                    var mecolor = document.getElementById('mecolor').value;
                    $("#descripcion").val(nom+', MODELO: '+memodelo+', COLOR: '+mecolor);
                }

                if (grupo == 5) {
                    var ecmarca = document.getElementById('ecmarca').value;
                    var ecmodelo = document.getElementById('ecmodelo').value;
                    var ecserie = document.getElementById('ecserie').value;
                    $("#descripcion").val(nom+', MARCA: '+ecmarca+', MODELO: '+ecmodelo+', SERIE: '+ecserie);
                }

                if (grupo == 6) {
                    var eermaterial = document.getElementById('eermaterial').value;
                    var eercolor = document.getElementById('eercolor').value;
                    var eerdimensiones = document.getElementById('eerdimensiones').value;
                    $("#descripcion").val(nom+', MATERIAL: '+eermaterial+', COLOR: '+eercolor+', DIMENSIONES: '+eerdimensiones);
                }

                if (grupo == 8) {
                    var vaserie = document.getElementById('vaserie').value;
                    var vacolor = document.getElementById('vacolor').value;
                    var vamodelo = document.getElementById('vamodelo').value;
                    var vapuertas = document.getElementById('vapuertas').value;
                    $("#descripcion").val(nom+', SERIE: '+vaserie+', COLOR: '+vacolor+', MODELO: '+vamodelo+', PUERTAS: '+vapuertas);
                }

                if (grupo == 15) {
                    var ecomarca = document.getElementById('ecomarca').value;
                    var ecomodelo = document.getElementById('ecomodelo').value;
                    var ecoserie = document.getElementById('ecoserie').value;
                    var ecoprocesador = document.getElementById('ecoprocesador').value;
                    var ecomemoria = document.getElementById('ecomemoria').value;
                    var ecodisco = document.getElementById('ecodisco').value;
                    $("#descripcion").val(nom+', MARCA: '+ecomarca+', MODELO: '+ecomodelo+', SERIE: '+ecoserie+', PROCESADOR: '+ecoprocesador+', MEMORIA: '+ecomemoria+', DISCO: '+ecodisco);
                }

                if (grupo == 36) {
                    var oafmarca = document.getElementById('oafmarca').value;
                    var oafcolor = document.getElementById('oafcolor').value;
                    $("#descripcion").val(nom+', MARCA: '+oafmarca+', COLOR: '+oafcolor);
                }

                if (grupo == 39) {
                    var omemarca = document.getElementById('omemarca').value;
                    var omecolor = document.getElementById('omecolor').value;
                    var omeserie = document.getElementById('omeserie').value;
                    $("#descripcion").val(nom+', MARCA: '+omemarca+', COLOR: '+omecolor+', SERIE: '+omeserie);
                }

                if (grupo == 40) {
                    var otmarca = document.getElementById('otmarca').value;
                    var otmodelo = document.getElementById('otmodelo').value;
                    var otserie = document.getElementById('otserie').value;
                    $("#descripcion").val(nom+', MARCA: '+otmarca+', MODELO: '+otmodelo+', SERIE: '+otserie);
                }
             });
        });
        
     });
</script>
@endsection

@section('contenido')
 <div class="col-md-12">
    
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Lista de Activos por Aprobar</div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_3">
                <thead>
                <th>#</th>  
                <th>Codigo</th>
                <th>Fecha</th>
                <th>Descripci&oacute;n</th>
                <th>Grupo Contable</th>
                
                <th></th>
              </thead>
              <!-- {{$num = 0 }} -->
              <tbody>
                @if($activos->count())
                  
                @foreach($activos as $activo)  
                <tr style="font-size: 12px;">
                      <td >{{$num = $num + 1}}</td>
                      <td >{{$activo->codigo_actual}}</td>
                      <td >{{$activo->fecha_compra}}</td>
                      <td >{{$activo->descripcion}}</td>
                      <td>{{$activo->grupo->nombre}}</td>
                      
                      <td>
                          <a class="fa-item col-md-3 col-sm-4" data-target="#full-width" data-toggle="modal" href="#responsive">
                                  <i class="fa fa-edit"></i></a>
                          <a href="{{ url($activo->id.'/delete')}}" class="fa-item col-md-3 col-sm-4">
                                  <i class="fa fa-trash-o"></i></a>
                          <a href="{{ url($activo->id.'/actualizar')}}" class="fa-item col-md-3 col-sm-4">
                                  <i class="fa fa-thumbs-o-up"></i></a>
                          <!--<a href="{{ url($activo->id.'/edit')}}" class="fa-item col-md-3 col-sm-4">
                                  <i class="fa fa-eye"></i></a>-->
                         <!--  <a href="#" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-red bg-hover-grey-salsa font-white bg-hover-white socicon-google tooltips" data-original-title="Editar"></a>
                          <a href="#" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-green bg-hover-grey-salsa font-white bg-hover-white socicon-pinterest tooltips" data-original-title="Eliminar"></a>
                          <a href="#" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-yellow bg-hover-grey-salsa font-white bg-hover-white socicon-foursquare tooltips" data-original-title="Aprobar"></a>
                                 -->
                         
                           <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              EDITAR
                          </button>-->
                      </td>

                @endforeach 
                @else
                <tr>
                <td colspan="8">No hay registro !!</td>
                </tr>
                @endif
              </tbody>
            </table>
           </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
</div>
          
  <script> 
    swal({
        "timer":1800,
        "title":"Título",
        "text":"Notificación Básica",
        "showConfirmButton":false
    });
  </script>

  <!-- full width -->
    <div id="full-width" class="modal container fade" tabindex="-1">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edicion de Activo</h4>
        </div>
        <div class="modal-body">
            <!-- BEGIN FORM-->
                    <form action="/create" method="POST" class="form-horizontal form-row-seperated" name="ejemplo">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
                        <div class="form-body">

                       
                            <div class="form-group">
                                <label class="col-md-2 control-label">Codigo de Activo</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control input-circle" name="codigo_actual" id="codigo_actual" placeholder="codigo_nuevo" >
                                </div>
                                <label class="col-md-2 control-label">Fecha de Incorporaci&oacute;n</label>
                                <div class="col-md-2">
                                    <input type="date" class="form-control input-circle" name="fecha_compra" id="fecha_compra">
                                </div>
                                <label class="col-md-2 control-label">Indice UFV Bs</label>
                                <div class="col-md-2">
                                <input type="integer" class="form-control input-circle" name="ufv" id="ufv" placeholder="UFV">
                                </div>
                            </div>


                           

                            <div class="form-group">
                                <label class="control-label col-md-3">Auxiliar Contable</label>
                                    <div class="col-md-4">
                                        <select class="bs-select form-control input-circle" id="auxiliar" name="auxiliar_id">
                                            <option value="0" disable="true" selected="true">----Elija una opcion----</option>
                                            <option value=""></option>
                                            
                                        </select>
                                    </div>
                            </div>

                            <div class="item" id="bloque_1" style="display: none;">
                            <!-- EDIFICACIONES -->
                                <div role="document">
                                    <div class="modal-header">
                                            <h5 class="modal-title" id="Label"><em><b>Caracter&iacute;sticas de Edificaciones</b></em></h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM -->
                                                <div class="form-horizontal form-row-seperated">

                                                    <div class="form-body">
                                                        <div class="form-group float-right">
                                                            <label class="col-md-3 control-label"><b>Dimensiones</b></label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control input-circle bg-secondary" name="modelo_medida_edificaciones"
                                                                    id="emodelo" style="text-transform: uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label"><b>Direcci&oacute;n</b></label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control input-circle" name="material_marca_edificaciones"
                                                                    id="ematerial" style="text-transform: uppercase;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END FORM -->
                                            </div>
                                        </div>
                                </div>
                            <!-- FIN EDIFICACIONES -->
                            </div>

                            <div class="item" id="bloque_2" style="display: none;">
                                <!-- MUEBLES Y ENSERES DE OFICINA -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Muebles y Enseres de Oficina</b></em></h5>
                                </div>
                                <div class="modal-body">
                                        <div class="portlet-body form">
                                            <div class="form-horizontal form-row-seperated">
                                                <div class="form-body">
                                                    <div class="form-group float-right">
                                                        <label class="col-md-3 control-label"><b>Color</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle bg-secondary" name="color_muebles" id="myecolor" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Material</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="material_marca_muebles" id="myematerial" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Medida</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="modelo_medida_muebles" id="myemedida" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                                
                            <div class="item" id="bloque_3" style="display: none;">
                                <!-- MAQUINARIA EN GENERAL-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Maquinaria en General</b></em></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="portlet-body form">
                                            <div class="form-horizontal form-row-seperated">
                                                <div class="form-body">
                                                    <div class="form-group float-right">
                                                        <label class="col-md-3 control-label"><b>Modelo</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle bg-secondary" name="modelo_medida_maquinaria" id="memodelo" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Color</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="color_maquinaria" id="mecolor" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item" id="bloque_5" style="display: none;">
                                <!-- EQUIPO DE COMUNICACION -->
  
                                <div class="modal-header">
                                    <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Equipo De Comunicaci&oacute;n</b></em></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <div class="portlet-body form">
                                                
                                                <div class="form-horizontal form-row-seperated">
                                                    <div class="form-body">
                                                        <div class="form-group float-right">
                                                            <label class="col-md-3 control-label"><b>Marca</b></label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control input-circle bg-secondary" name="material_marca_comunicacion" id="ecmarca" style="text-transform: uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label"><b>Modelo</b></label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control input-circle" name="modelo_medida_comunicacion" id="ecmodelo" style="text-transform: uppercase;">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label"><b>Serie</b></label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control input-circle" name="serie_comunicacion" id="ecserie" style="text-transform: uppercase;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                </div>
                                  
    
                                
                            </div>

                            <div class="item" id="bloque_6" style="display: none;">
                                <!-- EQUIPO EDUCACIONAL Y RECREATIVO -->
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Equipo Educacional y Recreativo</b></em></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                        <div class="portlet-body form">
                                                <!-- BEGIN FORM -->
                                            <div class="form-horizontal form-row-seperated">
                                                <div class="form-body">
                                                    <div class="form-group float-right">
                                                        <label class="col-md-3 control-label"><b>Material</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle bg-secondary" name="material_marca_educacional" id="eermaterial" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Color</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="color_educacional" id="eercolor" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Dimensiones</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="modelo_medida_educacional" id="eerdimensiones" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END FORM -->
                                           
                                        </div>
                                    </div>
                                
                            </div>

                            <div class="item" id="bloque_8" style="display: none;">
                                <!-- VEHICULOS AUTOMOTORES -->
                                <div class="modal-header">
                                <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Vehiculos Automotores</b></em></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM -->
                                        <div class="form-horizontal form-row-seperated">
                                            <div class="form-body">
                                                <div class="form-group float-right">
                                                    <label class="col-md-3 control-label"><b>Placa</b></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control input-circle bg-secondary" name="serie_vehiculos" id="vaserie" style="text-transform: uppercase;">

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Color</b></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control input-circle" name="color_vehiculos" id="vacolor" style="text-transform: uppercase;">
                                                    </div>
                                                </div>

                                                <div class="form-group float-right">
                                                    <label class="col-md-3 control-label"><b>Modelo</b></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control input-circle bg-secondary" name="modelo_medida_vehiculos" id="vamodelo" style="text-transform: uppercase;">

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Numero de Puertas</b></label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control input-circle" name="disco_duro_vehiculos" id="vapuertas" style="text-transform: uppercase;">
                                                    </div>
                                                </div>
                                                                               
                                            </div>
                                        </div>
                                            <!-- END FORM -->
                                    </div>
                                </div>
                                
                            </div>

                            <div class="item" id="bloque_15" style="display: none;">
                                <!-- EQUIPOS DE COMPUTACION -->

                                <div class="modal-header">
                                <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Equipo De Computaci&oacute;n</b></em></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <div class="portlet-body form">
                                            <!-- BEGIN FORM -->
                                            <div class="form-horizontal form-row-seperated">
                                                

                                                <div class="form-body">
                                                    <div class="form-group float-right">
                                                        <label class="col-md-3 control-label"><b>Marca</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle bg-secondary" name="material_marca_computacion" id="ecomarca" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Modelo</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="modelo_medida_computacion" id="ecomodelo" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Serie</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="serie_computacion" id="ecoserie" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Procesador</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="procesador_computacion" id="ecoprocesador" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Memoria RAM</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="memoria_ram_computacion" id="ecomemoria" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Disco Duro</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="disco_duro_computacion" id="ecodisco" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    
                                                       
                                                </div>

                                            </div>
                                            <!-- END FORM -->
                                        </div>
                              </div>
                                
                            </div>

                            <div class="item" id="bloque_36" style="display: none;">
                                <!-- OTROS ACTIVOS FIJOS -->

                                <div class="modal-header">
                                <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Otros Activos Fijos</b></em></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <div class="portlet-body form">
                                            <!-- BEGIN FORM -->
                                            <div class="form-horizontal form-row-seperated">
                                                

                                                <div class="form-body">
                                                    <div class="form-group float-right">
                                                        <label class="col-md-3 control-label"><b>Marca</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle bg-secondary" name="material_marca_otros" id="oafmarca" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Color</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="color_otros" id="oafcolor" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    
                                                       
                                                </div>

                                            </div>
                                            <!-- END FORM-->
                                        </div>
                              </div>
                                
                            </div>

                            <div class="item" id="bloque_39" style="display: none;">
                                 <!-- OTRA MAQUINARIA Y EQUIPO (DEPENDIENTE SEGUN OBJ.GASTO DE 03: MAQUINARIA EN GENERAL) -->

                                 <div class="modal-header">
                                <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Otra Maquinaria y Equipo</b></em></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <div class="portlet-body form">
                                            <!-- BEGIN FORM -->
                                            <div class="form-horizontal form-row-seperated">
                                                

                                                <div class="form-body">
                                                    <div class="form-group float-right">
                                                        <label class="col-md-3 control-label"><b>Marca</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle bg-secondary" name="material_marca_maquinaria" id="omemarca" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Color</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="color_maquinaria" id="omecolor" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Serie</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="serie_maquinaria" id="omeserie" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    
                                                       
                                                </div>

                                            </div>
                                            <!-- END FORM -->
                                        </div>
                              </div>
                                
                            </div>

                            <div class="item" id="bloque_40" style="display: none;">
                                <!-- OTROS -->

                                <div class="modal-header">
                                <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Otros</b></em></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <div class="portlet-body form">
                                            <!-- BEGIN FORM -->
                                            <div class="form-horizontal form-row-seperated">
                                                

                                                <div class="form-body">
                                                    <div class="form-group float-right">
                                                        <label class="col-md-3 control-label"><b>Marca</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle bg-secondary" name="material_marca_otro" id="otmarca" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Modelo</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" id="modelo_medida_otro" id="otmodelo" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"><b>Serie</b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control input-circle" name="serie_otro" id="otserie" style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                    
                                                       
                                                </div>
                                            </div>
                                            <!-- END FORM -->
                              </div>
                              </div>
                            </div>




                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Precio</label>
                                <div class="col-md-3">
                                    <input type="integer" class="form-control input-circle" name="valor" id="valor" placeholder="Precio del Activo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Descripci&oacute;n</label>
                                <!-- readonly para no poder editar en textarea -->
                                <div class="col-md-4">
                                    <textarea rows="4" readonly class="form-control input-circle" name="descripcion" id="descripcion" style="text-transform: uppercase;">
                                    </textarea>
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label class="control-label col-md-3">Organizacion Financiador</label>
                                    <div class="col-md-4">
                                        <select class="bs-select form-control input-circle" id="fuente_financiamiento" name="fuente_financiamiento" style="text-transform: uppercase;">
                                            <option value="0" disable="true" selected="true">----Elija una opcion----</option>
                                            <option value="Tesoro General del Estado">Tesoro General del Estado</option>
                                            <option value="Donaciones">Donaciones</option>
                                            <option value="TGN">TGN</option>
                                            
                                        </select>
                                    </div>
                            </div>
                            
                            
                          <div class="form-group">
                                <label class="control-label col-md-3">Estado del Activo</label>
                                    <div class="col-md-4">
                                        <select class="bs-select form-control input-circle" id="estado" name="estado" style="text-transform: uppercase;">
                                            <option value="0" disable="true" selected="true">----Elija una opcion----</option>
                                            <option value="BUENO">BUENO</option>
                                            <option value="REGULAR">REGULAR</option>
                                            <option value="MALO">MALO</option>
                                            
                                        </select>
                                    </div>
                          </div>


                        <div class="form-group">
                                <label class="col-md-3 control-label">Observaciones</label>
                                
                                <div class="col-md-4">
                                    <textarea rows="4" class="form-control input-circle" name="observaciones" id="observaciones" style="text-transform: uppercase;">
                                    </textarea>
                                </div>
                        </div>
                            
                        </div>  
        
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cerrar</button>
                                <button type="button" class="btn green">Guardar Cambios</button>
                            </div>

                        </div>
                         
                    </form>
                    <!-- END FORM -->
        </div>
       
    </div>



@endsection

@section('js')

<!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('pages/scripts/table-datatables-responsive.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
@endsection
