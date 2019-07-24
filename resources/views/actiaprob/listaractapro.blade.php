@extends('layouts.app1')

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function (i) {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="'+title+'" data-index="'+i+'" />' );
    } );
  
    // DataTable
    var table = $('#example').DataTable( {
      
        scrollY:        "600px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true
    } );
 
    // Filter event handler
    $( table.table().container() ).on( 'keyup', 'tfoot input', function () {
        table
            .column( $(this).data('index') )
            .search( this.value )
            .draw();
    } );
} );
</script>

@endsection

@section('contenido')
      <div class="col-md-12">
          
          <div class="portlet box green">
              <div class="portlet-title">
                  <div class="caption">
                      <i class="fa fa-globe"></i>Lista de Activos Asignados</div>
                  
              </div>
              <div class="portlet-body">
                  <table class="table table-bordered table-striped table-hover display" id="example">
                      <thead>
                          <th>#</th>  
                          <th>Codigo</th>
                          <th>Fecha</th>
                          <th>Precio</th>
                          <th>Descripci&oacute;n</th>
                          <th>Grupo Contable</th>
                          <th>Auxiliar Contable</th>
                          <th>Estado</th>
                          
                      </thead>
                    <!-- {{$num = 0 }} -->
                    <tbody>
                      @if($actiapros->count())
                        
                      @foreach($actiapros as $activo)  
                      <tr>
                            <td>{{$num = $num + 1}}</td>
                            <td>{{$activo->codigo_actual}}</td>
                            <td>{{$activo->fecha_compra}}</td>
                            <td>{{$activo->valor}}</td>
                            <td>{{$activo->descripcion}}</td>
                            <td>{{$activo->grupo->nombre}}</td>
                            <td>{{$activo->auxiliar->nombre}}</td>
                            <td>{{$activo->estado}}</td>
                      @endforeach 
                      @else
                          <tr>
                          <td colspan="8">No hay registro !!</td>
                          </tr>
                      @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>Precio</th>
                            <th>Descripci&oacute;n</th>
                            <th>Grupo Contable</th>
                            <th>Auxiliar Contable</th>
                            <th>Estado</th>
                        </tr>
                    </tfoot>
                    
                  </table>

                    

                 </div>
          </div>
         
          <!-- END SAMPLE TABLE PORTLET-->
      </div>
  
@endsection
