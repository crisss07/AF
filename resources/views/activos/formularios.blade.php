@extends('layouts.app1')

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

                           @foreach($xml as $xm)  
                       
                            <div class="form-group">
                                <label class="col-md-2 control-label">Codigo de Activo</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control input-circle" name="codigo_actual" id="codigo_actual" placeholder="codigo_nuevo" value="MPD">
                                </div>
                                <label class="col-md-2 control-label">Fecha de Incorporaci&oacute;n</label>
                                <div class="col-md-2">
                                    <input type="date" class="form-control input-circle" name="fecha_compra" id="fecha_compra" value="{{$xm->fecha}}">
                                    
                                </div>
                                <label class="col-md-2 control-label">Indice UFV Bs</label>
                                <div class="col-md-2">
                                    <input type="intger" class="form-control input-circle" name="ufv" id="ufv" placeholder="UFV" value="{{$xm->valor}}">
                                    
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
                                
                                <div class="col-md-4">
                                    <textarea rows="4" class="form-control input-circle" name="descripcion" id="descripcion" readonly>
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
                                                            <!-- BEGIN FORM-->
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
                                                            <!-- END FORM-->
                                                </div>
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
                    <!-- END FORM-->
                </div>
          </div>
     </div>
     </div>
</div>
@endsection