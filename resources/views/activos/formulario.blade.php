@extends('layouts.app1')

@section('js')


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

        if (grupo == 1) {
            var emodelo = document.getElementById('emodelo').value;
            var ematerial = document.getElementById('ematerial').value;
            $("#descripcion").val(emodelo+', '+ematerial);
        }

        if (grupo == 2) {
            var myecolor = document.getElementById('myecolor').value;
            var myematerial = document.getElementById('myematerial').value;
            var myemedida = document.getElementById('myemedida').value;
            $("#descripcion").val(myecolor+', '+myematerial+', '+myemedida);
        }

        if (grupo == 3) {
            var memodelo = document.getElementById('memodelo').value;
            var mecolor = document.getElementById('mecolor').value;
            $("#descripcion").val(memodelo+', '+mecolor);
        }

        if (grupo == 5) {
            var ecmarca = document.getElementById('ecmarca').value;
            var ecmodelo = document.getElementById('ecmodelo').value;
            var ecserie = document.getElementById('ecserie').value;
            $("#descripcion").val(ecmarca+', '+ecmodelo+', '+ecserie);
        }

        if (grupo == 6) {
            var eermaterial = document.getElementById('eermaterial').value;
            var eercolor = document.getElementById('eercolor').value;
            var eerdimensiones = document.getElementById('eerdimensiones').value;
            $("#descripcion").val(eermaterial+', '+eercolor+', '+eerdimensiones);
        }

        if (grupo == 8) {
            var vaserie = document.getElementById('vaserie').value;
            var vacolor = document.getElementById('vacolor').value;
            var vamodelo = document.getElementById('vamodelo').value;
            var vapuertas = document.getElementById('vapuertas').value;
            $("#descripcion").val(vaserie+', '+vacolor+', '+vamodelo+', '+vapuertas);
        }

        if (grupo == 15) {
            var ecomarca = document.getElementById('ecomarca').value;
            var ecomodelo = document.getElementById('ecomodelo').value;
            var ecoserie = document.getElementById('ecoserie').value;
            var ecoprocesador = document.getElementById('ecoprocesador').value;
            var ecomemoria = document.getElementById('ecomemoria').value;
            var ecodisco = document.getElementById('ecodisco').value;
            $("#descripcion").val(ecomarca+', '+ecomodelo+', '+ecoserie+', '+ecoprocesador+', '+ecomemoria+', '+ecodisco);
        }

        if (grupo == 36) {
            var oafmarca = document.getElementById('oafmarca').value;
            var oafcolor = document.getElementById('oafcolor').value;
            $("#descripcion").val(oafmarca+', '+oafcolor);
        }

        if (grupo == 39) {
            var omemarca = document.getElementById('omemarca').value;
            var omecolor = document.getElementById('omecolor').value;
            var omeserie = document.getElementById('omeserie').value;
            $("#descripcion").val(omemarca+', '+omecolor+', '+omeserie);
        }

        if (grupo == 40) {
            var otmarca = document.getElementById('otmarca').value;
            var otmodelo = document.getElementById('otmodelo').value;
            var otserie = document.getElementById('otserie').value;
            $("#descripcion").val(otmarca+', '+otmodelo+', '+otserie);
        }



        // switch(grupo) {
        //         case 1:
        //             var emodelo = document.getElementById('emodelo').value;
        //             var ematerial = document.getElementById('ematerial').value;
        //             $("#descripcion").val(emodelo+', '+ematerial);
        //         break;
        //         case 2:
        //             var myecolor = document.getElementById('myecolor').value;
        //             var myematerial = document.getElementById('myematerial').value;
        //             var myemedida = document.getElementById('myemedida').value;
        //             $("#descripcion").val(myecolor+', '+myematerial+', '+myemedida);

        //         break;
        //         case 3:

        //         break;
        //         case 5:

        //         break;
        //         case 6:

        //         break;
        //         case 8:

        //         break;
        //         case 15:

        //         break;
        //         case 36:
        //         break;
        //         case 39:
               
        //         break;
        //         case 40:
               
        //         break;
        //         default:
               
        //     }
        
     });







// para mostrar los items

    // var all_spans = $('.item a').parent().find('span');
    // $('.item a').click(function(e){
    //     e.preventDefault();
    //     // hide all span
    //     all_spans.hide();
    //     $this = $(this).parent().find('span');
    //     // here is what I want to do
    //     if ($this.is(':hidden')) {
    //         $(this).parent().find('span').show();
    //     } else {
    //         $(this).parent().find('span').hide();
    //     }
    // });
// fin mostrar los items

      
   /* jQuery(document).ready(function(){

        $('#descripcion').empty();

        $('#edimension').empty();
        $('#edireccion').empty();


        $('#edimension').on('keyup', function(){
            $('#descripcion').empty();
            var x = this.value;
        });

        $('#edireccion').on('keyup', function(){
            $('#descripcion').empty();
            $('#descripcion').append(this.value);
        });
      
    })*/

// function procesar() {
//     grupo=document.getElementById('grupo').value;
   
//     if (grupo==1) {
//         campo1=document.getElementById('edimension').value;
//         campo=', ';
//         campo2=document.getElementById('edireccion').value;
//         descripcion=campo1+campo+campo2;
        
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//         $('#descripcion').empty();
        
//             $(descripcion).on('keyup', function(){
//             $('#descripcion').empty();
//             var x = this.value;
//         });
//     }
//     if (grupo==2) {
//         campo1=document.getElementById('myecolor').value;
//         campo=', ';
//         campo2=document.getElementById('myematerial').value;
//         campo3=document.getElementById('myemedida').value;
//         descripcion=campo1+campo+campo2+campo+campo3;
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//     }
//     if (grupo==3) {
//         campo1=document.getElementById('memodelo').value;
//         campo=', ';
//         campo2=document.getElementById('mecolor').value;
//         descripcion=campo1+campo+campo2;
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//     }
//     switch (grupo) {
//     case 1:
        
//         campo1=document.getElementById('edimension').value;
//         campo=', ';
//         campo2=document.getElementById('edireccion').value;
//         descripcion=campo1+campo+campo2;
        
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//         break;  
//     case 2:
//         campo1=document.getElementById('myecolor').value;
//         campo=', ';
//         campo2=document.getElementById('myematerial').value;
//         campo3=document.getElementById('myemedida').value;
//         descripcion=campo1+campo+campo2+campo+campo3;
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//         break;
//     case 3:
//         campo1=document.getElementById('memodelo').value;
//         campo=', ';
//         campo2=document.getElementById('mecolor').value;
//         descripcion=campo1+campo+campo2;
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//         break;
//     case 5:
//         campo1=document.getElementById('ecmarca').value;
//         campo=', ';
//         campo2=document.getElementById('ecmodelo').value;
//         campo3=document.getElementById('ecserie').value;
//         descripcion=campo1+campo+campo2+campo+campo3;
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//         break;
//     case 6:
//         campo1=document.getElementById('eermaterial').value;
//         campo=', ';
//         campo2=document.getElementById('eercolor').value;
//         campo3=document.getElementById('eerdimensiones').value;
//         descripcion=campo1+campo+campo2+campo+campo3;
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//         break;
//     case 8:
//         campo1=document.getElementById('vaserie').value;
//         campo=', ';
//         campo2=document.getElementById('vacolor').value;
//         campo3=document.getElementById('vamodelo').value;
//         campo4=document.getElementById('vapuertas').value;
//         descripcion=campo1+campo+campo2+campo+campo3+campo+campo4;
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//         break;
//     case 15:
//         campo1=document.getElementById('ecomarca').value;
//         campo=', ';
//         campo2=document.getElementById('ecomodelo').value;
//         campo3=document.getElementById('ecoserie').value;
//         campo4=document.getElementById('ecoprocesador').value;
//         campo5=document.getElementById('ecomemoria').value;
//         campo6=document.getElementById('ecodisco').value;
//         descripcion=campo1+campo+campo2+campo+campo3+campo+campo4+campo+campo5+campo+campo6;
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//         break;
//     case 36:
//         campo1=document.getElementById('oafmarca').value;
//         campo=', ';
//         campo2=document.getElementById('oafcolor').value;
//         descripcion=campo1+campo+campo2;
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//         break;
//     case 39:
//         campo1=document.getElementById('omemarca').value;
//         campo=', ';
//         campo2=document.getElementById('omecolor').value;
//         campo3=document.getElementById('omeserie').value;
//         descripcion=campo1+campo+campo2+campo+campo3;
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//         break;
//     case 40:
//         campo1=document.getElementById('otmarca').value;
//         campo=', ';
//         campo2=document.getElementById('otmodelo').value;
//         campo3=document.getElementById('otserie').value;
//         descripcion=campo1+campo+campo2+campo+campo3;
//         document.getElementById('descripcion').value=descripcion;
//         document.forms.ejemplo.submit();
//         break;
// }

// }

</script>
@endsection

@section('contenido')
<div class="col-md-12">
  <div class="tabbable-line boxless tabbable-reversed">    
    <div class="tab-content">
        <div class="tab-pane active" id="tab_0">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Crear Nuevo Activo</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="/create" method="POST" class="form-horizontal form-row-seperated" name="ejemplo">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
                        <div class="form-body">

                            <!-- @foreach($cam as $xm)   -->
                       
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

                            <!-- @endforeach -->

                            <div class="form-group">
                                <label class="control-label col-md-3">Grupo Contable</label>
                                    <div class="col-md-4">
                                        <select class="bs-select form-control input-circle" id="grupo" name="grupo_id">
                                            <option value="0" disable="true" selected="true">----Elija una opcion----</option>
                                            @foreach ($gruposcon as $grupoco)
                                            <option value="{{$grupoco->id}}" data-toggle="modal" data-target="#prueba" >{{$grupoco->nombre}}</option>
                                            @endforeach
                                            
                                        </select>
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
                                                                    id="emodelo">
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
                                                            <input type="text" class="form-control input-circle" name="modelo_medida_muebles" id="myemedida">
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
                                                            <input type="text" class="form-control input-circle" name="modelo_medida_educacional" id="eerdimensiones">
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
                                    <textarea rows="4" readonly class="form-control input-circle" name="descripcion" id="descripcion">
                                    </textarea>
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label class="control-label col-md-3">Organizacion Financiador</label>
                                    <div class="col-md-4">
                                        <select class="bs-select form-control input-circle" id="fuente_financiamiento" name="fuente_financiamiento">
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
                                        <select class="bs-select form-control input-circle" id="estado" name="estado">
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
                                    <textarea rows="4" class="form-control input-circle" name="observaciones" id="observaciones" value="{{ 'hola' }}">
                                    </textarea>
                                </div>
                        </div>
                            
                        </div>   
                        </div>




                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green" id="showtoast">Guardar</button>
                                    <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM -->
                </div>
          </div>
     </div>
     </div>
</div>
@endsection

