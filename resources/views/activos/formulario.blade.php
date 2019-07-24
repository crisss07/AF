@extends('layouts.app1')
<!--
@section('js')
 <script type="text/javascript">
    //jquery para hacer select de select
        $('#grupo').on('change', function(e){
                console.log(e);

                var grupo_id = e.target.value;
                
                $.get('/json-auxiliars?grupo_id='+ grupo_id, function(data) {

                console.log(data);
                    $('#auxiliar').empty();
                    $('#auxiliar').append('<option ="0" disable="true" selected="true">----Elija una opcion----</option>');
                      
                    $.each(data, function(index, auxiliarsObj){
                        $('#auxiliar').append('<option value="'+ auxiliarsObj.id +'">'+ auxiliarsObj.nombre +'</option>');
                       
                        });
                    });
                });
        
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

function procesar() {
    grupo=document.getElementById('grupo').value;
   
    if (grupo==1) {
        campo1=document.getElementById('edimension').value;
        campo=', ';
        campo2=document.getElementById('edireccion').value;
        descripcion=campo1+campo+campo2;
        
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
        $('#descripcion').empty();
        
            $(descripcion).on('keyup', function(){
            $('#descripcion').empty();
            var x = this.value;
        });
    }
    if (grupo==2) {
        campo1=document.getElementById('myecolor').value;
        campo=', ';
        campo2=document.getElementById('myematerial').value;
        campo3=document.getElementById('myemedida').value;
        descripcion=campo1+campo+campo2+campo+campo3;
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
    }
    if (grupo==3) {
        campo1=document.getElementById('memodelo').value;
        campo=', ';
        campo2=document.getElementById('mecolor').value;
        descripcion=campo1+campo+campo2;
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
    }
    switch (grupo) {
    case 1:
        
        campo1=document.getElementById('edimension').value;
        campo=', ';
        campo2=document.getElementById('edireccion').value;
        descripcion=campo1+campo+campo2;
        
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
        break;  
    case 2:
        campo1=document.getElementById('myecolor').value;
        campo=', ';
        campo2=document.getElementById('myematerial').value;
        campo3=document.getElementById('myemedida').value;
        descripcion=campo1+campo+campo2+campo+campo3;
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
        break;
    case 3:
        campo1=document.getElementById('memodelo').value;
        campo=', ';
        campo2=document.getElementById('mecolor').value;
        descripcion=campo1+campo+campo2;
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
        break;
    case 5:
        campo1=document.getElementById('ecmarca').value;
        campo=', ';
        campo2=document.getElementById('ecmodelo').value;
        campo3=document.getElementById('ecserie').value;
        descripcion=campo1+campo+campo2+campo+campo3;
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
        break;
    case 6:
        campo1=document.getElementById('eermaterial').value;
        campo=', ';
        campo2=document.getElementById('eercolor').value;
        campo3=document.getElementById('eerdimensiones').value;
        descripcion=campo1+campo+campo2+campo+campo3;
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
        break;
    case 8:
        campo1=document.getElementById('vaserie').value;
        campo=', ';
        campo2=document.getElementById('vacolor').value;
        campo3=document.getElementById('vamodelo').value;
        campo4=document.getElementById('vapuertas').value;
        descripcion=campo1+campo+campo2+campo+campo3+campo+campo4;
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
        break;
    case 15:
        campo1=document.getElementById('ecomarca').value;
        campo=', ';
        campo2=document.getElementById('ecomodelo').value;
        campo3=document.getElementById('ecoserie').value;
        campo4=document.getElementById('ecoprocesador').value;
        campo5=document.getElementById('ecomemoria').value;
        campo6=document.getElementById('ecodisco').value;
        descripcion=campo1+campo+campo2+campo+campo3+campo+campo4+campo+campo5+campo+campo6;
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
        break;
    case 36:
        campo1=document.getElementById('oafmarca').value;
        campo=', ';
        campo2=document.getElementById('oafcolor').value;
        descripcion=campo1+campo+campo2;
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
        break;
    case 39:
        campo1=document.getElementById('omemarca').value;
        campo=', ';
        campo2=document.getElementById('omecolor').value;
        campo3=document.getElementById('omeserie').value;
        descripcion=campo1+campo+campo2+campo+campo3;
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
        break;
    case 40:
        campo1=document.getElementById('otmarca').value;
        campo=', ';
        campo2=document.getElementById('otmodelo').value;
        campo3=document.getElementById('otserie').value;
        descripcion=campo1+campo+campo2+campo+campo3;
        document.getElementById('descripcion').value=descripcion;
        document.forms.ejemplo.submit();
        break;
}

}

</script>
@endsection
-->
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

                           @foreach($cam as $xm)  
                       
                            <div class="form-group">
                                <label class="col-md-2 control-label">Codigo de Activo</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control input-circle" name="codigo_actual" id="codigo_actual" placeholder="codigo_nuevo" value="MPD-000">
                                </div>
                                <label class="col-md-2 control-label">Fecha de Incorporaci&oacute;n</label>
                                <div class="col-md-2">
                                    <input type="integer" class="form-control input-circle" name="fecha_compra" id="fecha_compra" value="{{$xm->fecha}}">
                                    
                                </div>
                                <label class="col-md-2 control-label">Indice UFV Bs</label>
                                <div class="col-md-2">
                                    <input type="integer" class="form-control input-circle" name="ufv" id="ufv" placeholder="UFV" value="{{$xm->ufv}}">
                                    
                                </div>
                                                        
                            </div>

                            @endforeach

                            <div class="form-group">
                                <label class="control-label col-md-3">Grupo Contable</label>
                                    <div class="col-md-4">
                                        <select class="bs-select form-control input-circle" id="grupo" name="grupo_id">
                                            <option value="0" disable="true" selected="true">----Elija una opcion----</option>
                                            @foreach ($gruposcon as $grupoco)
                                            <option value="{{$grupoco->id}}" data-toggle="modal" data-target="#{{$grupoco->id}}" >{{$grupoco->nombre}}</option>
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
                                    <textarea rows="4" class="form-control input-circle" name="descripcion" id="descripcion">
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
                                    <textarea rows="4" class="form-control input-circle" name="observaciones" id="observaciones">
                                    </textarea>
                                </div>
                        </div>
                            
                        </div>   
                        </div>

<!-- EDIFICACIONES -->
<!--
<div class="modal fade" id="1" tabindex="-1" role="dialog" aria-labelledby="2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Edificaciones</b></em></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="portlet-body form">
                        <!-- BEGIN FORM
                        <div class="form-horizontal form-row-seperated">
                            
                            <div class="form-body">
                                <div class="form-group float-right">
                                    <label class="col-md-3 control-label"><b>Dimensiones</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control input-circle bg-secondary" name="modelo_medida" id="edimension">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><b>Direcci&oacute;n</b></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control input-circle" name="material_marca" id="edireccion" style="text-transform: uppercase;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="button" class="btn green" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END FORM
            </div>
      </div>
    </div>
   </div>
</div>
-->

<!-- MUEBLES Y ENSERES DE OFICINA -->
<!--
<div class="modal fade" id="2" tabindex="-1" role="dialog" aria-labelledby="2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Muebles y Enseres de Oficina</b></em></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="portlet-body form">
                    <!-- BEGIN FORM
                <div class="form-horizontal form-row-seperated">
                    <div class="form-body">
                        <div class="form-group float-right">
                            <label class="col-md-3 control-label"><b>Color</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle bg-secondary" name="color" id="myecolor" style="text-transform: uppercase;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Material</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle" name="material_marca" id="myematerial" style="text-transform: uppercase;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Medida</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle" name="modelo_medida" id="myemedida">
                            </div>
                        </div>
                           
                    </div>
                     <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" class="btn green" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                     </div>
                </div>
                    <!-- END FORM
            </div>
      </div>
    </div>
   </div>
</div>
-->

<!-- MAQUINARIA EN GENERAL-->
<!--
<div class="modal fade" id="3" tabindex="-1" role="dialog" aria-labelledby="2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Maquinaria en General</b></em></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="portlet-body form">
                        <!-- BEGIN FORM
                <div class="form-horizontal form-row-seperated">
                    <div class="form-body">
                        <div class="form-group float-right">
                            <label class="col-md-3 control-label"><b>Modelo</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle bg-secondary" name="modelo_medida" id="memodelo" style="text-transform: uppercase;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Color</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle" name="color" id="mecolor" style="text-transform: uppercase;">
                            </div>
                        </div>
                    </div>
                </div>
                        <!-- END FORM
                <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" class="btn green" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
-->

<!-- EQUIPO DE COMUNICACION-->
<!--
<div class="modal fade" id="5" tabindex="-1" role="dialog" aria-labelledby="2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Equipo De Comunicaci&oacute;n</b></em></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="portlet-body form">
                    <!-- BEGIN FORM
                    <div class="form-horizontal form-row-seperated">
                        <div class="form-body">
                            <div class="form-group float-right">
                                <label class="col-md-3 control-label"><b>Marca</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle bg-secondary" name="material_marca" id="ecmarca" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Modelo</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" name="modelo_medida" id="ecmodelo" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Serie</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" name="serie" id="ecserie" style="text-transform: uppercase;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END FORM
                    <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="button" class="btn green" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
      </div>
    </div>
</div>
-->

<!-- EQUIPO EDUCACIONAL Y RECREATIVO-->

<!--
<div class="modal fade" id="6" tabindex="-1" role="dialog" aria-labelledby="2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Equipo Educacional y Recreativo</b></em></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="portlet-body form">
                    <!-- BEGIN FORM
                <div class="form-horizontal form-row-seperated">
                    <div class="form-body">
                        <div class="form-group float-right">
                            <label class="col-md-3 control-label"><b>Material</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle bg-secondary" name="material_marca" id="eermaterial" style="text-transform: uppercase;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Color</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle" name="color" id="eercolor" style="text-transform: uppercase;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Dimensiones</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle" name="modelo_medida" id="eerdimensiones">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END FORM
                <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" class="btn green" data-dismiss="modal">Cerrar</button>
                           </div>
                        </div>
                </div>
            </div>
        </div>
       </div>
    </div>
</div>


<!-- VEHICULOS AUTOMOTORES
<div class="modal fade" id="8" tabindex="-1" role="dialog" aria-labelledby="2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Avehiculos Automotores</b></em></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="portlet-body form">
                <!-- BEGIN FORM
                <div class="form-horizontal form-row-seperated">
                    <div class="form-body">
                        <div class="form-group float-right">
                            <label class="col-md-3 control-label"><b>Placa</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle bg-secondary" name="serie" id="vaserie" style="text-transform: uppercase;">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Color</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle" name="color" id="vacolor" style="text-transform: uppercase;">
                            </div>
                        </div>

                        <div class="form-group float-right">
                            <label class="col-md-3 control-label"><b>Modelo</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle bg-secondary" name="modelo_medida" id="vamodelo" style="text-transform: uppercase;">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><b>Numero de Puertas</b></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-circle" name="disco_duro" id="vapuertas" style="text-transform: uppercase;">
                            </div>
                        </div>
                                                       
                    </div>

                     <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" class="btn green" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- END FORM
            </div>
        </div>
      </div>
    </div>
</div>
 

<!-- EQUIPOS DE COMPUTACIÓN
<div class="modal fade" id="15" tabindex="-1" role="dialog" aria-labelledby="2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Equipo De Computaci&oacute;n</b></em></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="portlet-body form">
                    <!-- BEGIN FORM
                    <div class="form-horizontal form-row-seperated">
                        

                        <div class="form-body">
                            <div class="form-group float-right">
                                <label class="col-md-3 control-label"><b>Marca</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle bg-secondary" name="material_marca" id="ecomarca" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Modelo</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" name="modelo_medida" id="ecomodelo" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Serie</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" name="serie" id="ecoserie" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Procesador</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" name="procesador" id="ecoprocesador" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Memoria RAM</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" name="memoria_ram" id="ecomemoria" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Disco Duro</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" name="disco_duro" id="ecodisco" style="text-transform: uppercase;">
                                </div>
                            </div>
                            
                               
                        </div>

                    </div>




                    <!-- END FORM


                    <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="button" class="btn green" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                    </div>
                </div>
      </div></div>
    </div>
  </div>


<!-- OTROS ACTIVOS FIJOS
<div class="modal fade" id="36" tabindex="-1" role="dialog" aria-labelledby="2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Otros Activos Fijos</b></em></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="portlet-body form">
                    <!-- BEGIN FORM
                    <div class="form-horizontal form-row-seperated">
                        

                        <div class="form-body">
                            <div class="form-group float-right">
                                <label class="col-md-3 control-label"><b>Marca</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle bg-secondary" name="material_marca" id="oafmarca" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Color</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" name="color" id="oafcolor" style="text-transform: uppercase;">
                                </div>
                            </div>
                            
                               
                        </div>

                    </div>




                    <!-- END FORM


                    <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="button" class="btn green" data-dismiss="modal">Cerrar</button>
                               </div>
                            </div>
                    </div>
                </div>
      </div></div>
    </div>
  </div>


<!-- OTRA MAQUINARIA Y EQUIPO (DEPENDIENTE SEGÚN OBJ.GASTO DE 03: MAQUINARIA EN GENERAL)
<div class="modal fade" id="39" tabindex="-1" role="dialog" aria-labelledby="2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Otra Maquinaria y Equipo</b></em></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="portlet-body form">
                    <!-- BEGIN FORM
                    <div class="form-horizontal form-row-seperated">
                        

                        <div class="form-body">
                            <div class="form-group float-right">
                                <label class="col-md-3 control-label"><b>Marca</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle bg-secondary" name="material_marca" id="omemarca" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Color</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" name="color" id="omecolor" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Serie</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" name="serie" id="omeserie" style="text-transform: uppercase;">
                                </div>
                            </div>
                            
                               
                        </div>

                    </div>




                    <!-- END FORM


                    <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="button" class="btn green" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                    </div>
                </div>
      </div></div>
    </div>
  </div>


<!-- OTROS
<div class="modal fade" id="40" tabindex="-1" role="dialog" aria-labelledby="2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="2Label"><em><b>Caracter&iacute;sticas de Otros</b></em></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="portlet-body form">
                    <!-- BEGIN FORM
                    <div class="form-horizontal form-row-seperated">
                        

                        <div class="form-body">
                            <div class="form-group float-right">
                                <label class="col-md-3 control-label"><b>Marca</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle bg-secondary" name="material_marca" id="otmarca" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Modelo</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" id="modelo_medida" id="otmodelo" style="text-transform: uppercase;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Serie</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle" name="serie" id="otserie" style="text-transform: uppercase;">
                                </div>
                            </div>
                            
                               
                        </div>
                    </div>
                    <!-- END FORM
                    <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="button" class="btn green" data-dismiss="modal" id="showtoast" onClick="javascript:procesar();">Cerrar</button>
                     
                                </div>
                            </div>
                    </div>
      </div>
      </div>
     </div>
    </div>
  </div>
  -->


                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green" id="showtoast">Guardar</button>
                                    <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
          </div>
     </div>
     </div>
</div>
@endsection

