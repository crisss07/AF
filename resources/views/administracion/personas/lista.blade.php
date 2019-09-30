@extends('layouts.app1')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>
@endsection

@section('contenido')

<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-info-circle"></i>Lista de Personas
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                  <a href="#basic" class="btn green" data-toggle="modal">Nueva Persona
                                      <i class="fa fa-plus"></i>
                                  </a>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body flip-scroll">
                            <table class="table table-bordered table-striped table-condensed flip-content" id="table_id">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nombres</th>
                                        <th class="text-center">A. Patero</th>
                                        <th class="text-center">A. Materno</th>
                                        <th class="text-center">Carnet</th>
                                        <th class="text-center">Cargo</th>
                                        <th class="text-center">Oficina</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $c = 1; ?>
                                    @foreach ($datos as $per)
                                        <tr>
                                            <td class="text-center"><?php echo $c; $c = $c + 1; ?></td>
                                            <td class="text-center"><?php echo $per->nombre; ?></td>
                                            <td class="text-center"><?php echo $per->ap_pat; ?></td>
                                            <td class="text-center"><?php echo $per->ap_mat; ?></td>
                                            <td class="text-center"><?php echo $per->ci; ?></td>
                                            <td class="text-center"><?php echo $per->cargo; ?></td>
                                            <td class="text-center"><?php echo $per->oficina; ?></td>
                                            <td class="text-center">


                                              <form form method="post" action="{{ url('personas/' . $per->id . '/eliminar') }}">
                                                {{ csrf_field() }}
                                                <a href="{{ url('personas/' . $per->id . '/editar') }}" rel="tooltip" title="Editar Cargo" class="btn btn-success btn-simple btn-fab btn-fab-mini">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-fab btn-fab-mini">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                </form>


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <a class="btn blue btn-block" href="{{ url('home') }}">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Nueva persona</h4>
            </div>
            <form method="post" action="crearPersona" class="form-horizontal">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label">Nombres</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="nombre" name="nombre" >
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label">Ap. Paterno</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="ap_pat" name="ap_pat" >
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label">Ap. Materno</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="ap_mat" name="ap_mat" >
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label">Carnet</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="ci" name="ci" >
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label">Cargo</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="cargo_id" name="cargo_id" >
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label">Oficina</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="oficina_id" name="oficina_id" >
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>

<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<script>

function recupera(id){
  $('#piso2').val(id);
}

</script>
@endsection
