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
                                <i class="fa fa-info-circle"></i>Lista de Cargos
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                  <a href="#basic" class="btn green" data-toggle="modal">Nuevo Piso
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
                                        <th class="text-center">Piso</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $c = 1; ?>
                                    @foreach ($piso as $pis)
                                        <tr>
                                            <td class="text-center"><?php echo $c; $c = $c + 1; ?></td>
                                            <td class="text-center"><?php echo $pis->piso; ?></td>
                                            <td class="text-center">


                                              <form form method="post" action="{{ url('pisos/' . $pis->id . '/eliminar') }}">
                                                {{ csrf_field() }}
                                                <a href="{{ url('pisos/' . $pis->id . '/editar') }}" rel="tooltip" title="Editar Cargo" class="btn btn-success btn-simple btn-fab btn-fab-mini">
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
                <h4 class="modal-title">Nuevo Piso</h4>
            </div>
            <form method="post" action="crearPiso" class="form-horizontal">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label">Piso</label>
                            <div class="col-md-10">
                                <input type="integer" class="form-control" id="piso" name="piso" >
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

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Editar Piso</h4>
      </div>
      <form method="post" action="editarPiso" class="form-horizontal">
          {{ csrf_field() }}
          <div class="modal-body">
              <div class="form-body">
                  <div class="form-group form-md-line-input">
                      <label class="col-md-2 control-label">Piso</label>
                      <div class="col-md-10">
                          <input type="integer" class="form-control" id="piso2" name="id">
                          <div class="form-control-focus"> </div>
                      </div>

                  </div>

                  <div class="form-group form-md-line-input">
                      <label class="col-md-2 control-label">Piso</label>
                      <div class="col-md-10">
                          <input type="integer" class="form-control" id="piso" name="piso">
                          <div class="form-control-focus"> </div>
                      </div>

                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn green btn-block">Actualizar</button>
          </div>
      </form>

    </div>
  </div>
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
