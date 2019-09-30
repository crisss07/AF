@extends('layouts.app1')
@section('css')


@endsection

@section('contenido')

    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-bubble font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Nuevo Activo Fijo</span>
            </div>
             <div class="actions">
                <div class="actions">
                    <a href="javascript:;" class="btn btn-circle btn-default">
                        <i class="fa fa-copy"></i> Copiar </a>
                    <a href="javascript:;" class="btn btn-circle btn-default">
                        <i class="fa fa-paste"></i> Pegar </a>
                   
                </div>
            </div>
        </div>
        <div class="portlet-body">
            <ul class="nav nav-pills">
                <li class="active">
                    <a href="#tab_2_1" data-toggle="tab"> Normal </a>
                </li>
                <li>
                    <a href="#tab_2_2" data-toggle="tab"> Por Lote </a>
                </li>
                
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade" id="tab_2_2">
                
                     <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Nuevo Depto</h4>
                        </div>
                        <form method="post" action="{{ url('dep/guardar') }}" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-body">
                                    <div class="form-group form-md-line-input">
                                        <label class="col-md-2 control-label">Tipo de Depto</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="depto" name="depto" >
                                            <div class="form-control-focus"> </div>
                                        </div>
                                    </div>                       
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn green btn-block">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
               <div class="tab-pane fade active in" id="tab_2_1">
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
                                                                                    <input type="text" class="form-control input-circle bg-secondary" name="modelo_medida"
                                                                                        id="edimension">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label"><b>Direcci&oacute;n</b></label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" class="form-control input-circle" name="material_marca"
                                                                                        id="edireccion" style="text-transform: uppercase;">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                <div class="item" id="bloque_36" style="display: none;">
                                                    aqui va el 36
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
            </div>
    </div>
    


@endsection                     

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
</script>

@endsection


       