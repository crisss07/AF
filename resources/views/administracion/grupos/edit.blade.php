@extends('layouts.app1')

@section('css')
@endsection

@section('contenido')
    
<div class="row">        
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-settings font-green-haze"></i>
                    <span class="caption-subject bold uppercase"> Edición de Cargo</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body form">
                @foreach($grupo as $row)
                    <form method="post" action="{{ url('grupo/' . $row->id . '/actualizar') }}" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-body">                                                
                            <div class="form-group form-md-line-input">
                                <label class="col-md-2 control-label">Nombre del Grupo</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="grupo" name="grupo" value="{{ $row->nombre }}">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-2 control-label">Vida util</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="vida_util" name="vida_util" value="{{ $row->vida_util }}">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-2 control-label">Porcentaje</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="porcentaje" name="porcentaje" value="{{ $row->porcentaje }}">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>                      
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    <a class="btn default" href="{{ url('home') }}" >Cancelar</a>
                                    <button class="btn blue">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
       
    </div>                    
</div>
@endsection

@section('js')

@endsection
