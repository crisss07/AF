 @extends('layouts.app1')

@section('css')
<!-- BEGIN PAGE LEVEL PLUGINS -->
        

@endsection


 @section('contenido') 
  

<div class="tab-content">
        <div class="tab-pane active" id="tab_0">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Registro de Usuarios</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="/crearasig" method="POST" class="form-horizontal form-row-seperated">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
                        <div class="form-body">
                            <div class="form-group">
                                <label for="single" class="control-label col-md-3">Funcionario</label>
                                    <div class="col-md-4">
                                        <select id="single" class="form-control select2 input-circle" id="persona_id" name="persona_id">
                                            <option>-----Elija una opcion-----</option>
                                            @foreach ($personas as $persona)
                                                <option value="{{$persona->id}}">{{$persona->nombre}} {{$persona->ap_pat}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                           <div class="form-group">
                                <label for="multiple" class="control-label col-md-3">Activos Fijos</label>
                                    <div class="col-md-8">
                                        <select id="multiple" class="form-control select2-multiple input-circle" multiple name="actiapro_id[]">
                                            <optgroup label="-----Elija una Opcion-----">
                                                @foreach ($actapross as $actapros)
                                                <option value="{{$actapros->id}}">{{$actapros->codigo_actual}}, {{$actapros->descripcion}} </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Piso</label>
                                <div class="col-md-4">
                                    <input type="integer" class="form-control input-circle" name="piso" id="piso" placeholder="Piso">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Fecha</label>
                                
                                <div class="col-md-4">
                                    <input type="date" class="form-control input-circle" name="fecha" id="fecha" placeholder="Fecha de Asignacion">
                                    
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




           <script type="text/javascript">
        $('#persona_id').on('change', function(e){
                console.log(e);
                var persona_id = e.target.value;
                $.get(/json-auxiliars?persona_id='+ persona_id, function(data) {
                });

            </script>

            <script type="text/javascript">
                $('#actapro_id').on('change', function(e){
                        console.log(e);
                        var actapro_id = e.target.value;
                        $.get(/json-auxiliars?actapro_id='+ actapro_id, function(data) {
                            });

            </script>
     </div>



    

@endsection

@section('js')
<!-- BEGIN PAGE LEVEL PLUGINS -->
       
@endsection