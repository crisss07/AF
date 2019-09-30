@extends('layouts.app1')

@section('css')

<!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('global/plugins/socicon/socicon.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->
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
                          <a href="{{ url($activo->id.'/edit')}}" data-toggle="modal" data-target="#exampleModal" class="fa-item col-md-3 col-sm-4">
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



<!-- modal de edicion -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><em><b>Edicion de Activos</b></em></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form class="form-horizontal form-row-seperated">
                        <input type="hidden">
                  
                        <div class="form-body">
                            <div class="form-group float-right">
                                <label class="col-md-3 control-label"><b>Codigo</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle bg-secondary" readonly>
                                    <span class="help-block"> Codigo de Activo</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Fecha de Adquisici&oacute;n</b></label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control input-circle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Precio</b></label>
                                <div class="col-md-9">
                                    <input type="integer" class="form-control input-circle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Descripci&oacute;n</b></label>
                                
                                <div class="col-md-9">
                                    <textarea rows="4" cols="50" class="form-control input-circle"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3"><b>Grupo Contable</b></label>
                                    <div class="col-md-9">
                                        <select class="bs-select form-control input-circle">
                                            <option></option>
                                            <option value="edificaciones">Edificaciones</option>
                                            <option value="muebles y enseres de oficina">Muebles y Enseres de Oficina</option>
                                            <option value="maquinaria en general">Maquinaria en General</option>
                                            <option value="vehiculo">Veh&iacute;culos</option>
                                            <option value="equipo de computacion">Equipos de Computaci&oacute;n</option>
                                            <option value="equipo de comunicaciones">Equipo de Comunicaciones</option>
                                            <option value="equipo medico y de laboratorio">Equipo M&eacute;dico y de Laboratorio</option>
                                            
                                        </select>
                                    </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Grupo Auxiliar Contable</b></label>
                                
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle">
                                    <span class="help-block"></span>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Estado</b></label>
                                
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-circle">
                                    <span class="help-block"> 
                                    Estado del Activo</span>
                                </div>
                                </div>
                            </div>   
                        </div>

                    </form>




                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
                    <!-- END FORM-->


                    <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green" id="showtoast">Guardar</button>
                                    <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancelar</button>
                                </div>
                            </div>
                    </div>
                </div>
      </div></div>
    </div>
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
@endsection
