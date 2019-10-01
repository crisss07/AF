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
                        $('#auxiliar').append('<option value="'+ auxiliarsObj.nombre +'">'+ auxiliarsObj.nombre +'</option>');
                       
                        });
                    });
                });
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
                                <i class="fa fa-gift"></i>Editar Activo</div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                <a href="javascript:;" class="reload"> </a>
                                <a href="javascript:;" class="remove"> </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="{{ url($activo->id.'/edit')}}" method="POST" class="form-horizontal form-row-seperated">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Codigo</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control input-circle" name="codigo_actual" id="codigo_actual" placeholder="codigo_actual" value="{{ $activo->codigo_actual}}">
                                        </div>
                                        <label class="col-md-2 control-label">Fecha de Adquisici&oacute;n</label>
                                        <div class="col-md-2">
                                            <input type="date" class="form-control input-circle" name="fecha_compra" id="fecha_compra" placeholder="{{$activo->fecha_compra}}" value="{{$activo->fecha_compra}}">
                                            
                                        </div>
                                        <label class="col-md-2 control-label">Indice UFV Bs</label>
                                        <div class="col-md-2">
                                            <input type="intger" class="form-control input-circle" name="ufv" id="ufv" placeholder="UFV" value="{{$activo->ufv}}">
                                            
                                        </div>
                                                                
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Grupo Contable</label>
                                            <div class="col-md-4">
                                                <select class="bs-select form-control input-circle" id="grupo" name="grupo_id">
                                                    <option value="{{ $activo->grupo->id}}">{{ $activo->grupo->nombre}}</option>
                                                    @foreach ($gruposcon as $grupoco)
                                                    <option value="{{$grupoco->id}}" data-toggle="modal" data-target="#{{$grupoco->id}}" >{{$grupoco->nombre}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Auxiliar Contable</label>
                                        
                                        <div class="col-md-4">
                                            <select type="text" class="form-control input-circle" name="auxiliar_id" id="auxiliar_id">
                                            <option value="{{ $activo->auxiliar->id}}">{{ $activo->auxiliar->nombre}}</option>
                                                    <option value=""></option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Precio</label>
                                        <div class="col-md-4">
                                            <input type="integer" class="form-control input-circle" name="valor" id="valor" placeholder="Precio del Activo" value="{{ $activo->valor}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Descripci&oacute;n</label>
                                        
                                        <div class="col-md-4">
                                            <textarea rows="4" cols="50" class="form-control input-circle" name="descripcion" id="descripcion">{{ $activo->descripcion}}
                                        </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Organizacion Financiador</label>
                                            <div class="col-md-4">
                                                <select class="bs-select form-control input-circle" id="fuente_financiamiento" name="fuente_financiamiento">
                                                     <option value="{{ $activo->fuente_financiamiento}}">{{ $activo->fuente_financiamiento}}</option>
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
                                                    <option value="{{ $activo->estado}}">{{ $activo->estado}}</option>
                                                     <option value="Bueno">Bueno</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Malo">Malo</option>
                                                    
                                                </select>
                                            </div>
                                    </div>
                                    </div>   
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-circle green">Guardar</button>
                                            <a href="/vista" type="button" class="btn btn-circle grey-salsa btn-outline">Cancelar</a>
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
@endsection