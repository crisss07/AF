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
                                <i class="fa fa-info-circle"></i>Lista de Departamentos
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    <a href="#crear" class="btn green" data-toggle="modal">Nuevo Depto
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
                                        <th class="text-center">Depto</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>                                
                                    @foreach ($deptos as $key => $depto)
                                        <tr>
                                            <td class="text-center">{{ ($key+1) }}</td>
                                            <td class="text-center">{{ $depto->depto }}</td>
                                            <td class="text-center">
                                                
                                                <form form method="post" action="{{ url('dep/' . $depto->id . '/eliminar') }}">
                                                {{ csrf_field() }}
                                                <a href="{{ url('dep/' . $depto->id . '/editar') }}" rel="tooltip" title="Editar Depto" class="btn btn-success btn-simple btn-fab btn-fab-mini">
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


<div class="modal fade in" id="crear" tabindex="-1" role="crear" aria-hidden="true">
    <div class="modal-dialog">
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
function enviarDato(id){
    $('#depto1').val(id);

}
</script>

@endsection


