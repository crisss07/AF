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
                          <th>Nombre</th>
                          <th>Fecha</th>
                          <th>Gestion</th>
                          <th>Piso</th>
                          <th>Id</th>
                          <th>Accion</th>
                          
                      </thead>
                    <!-- {{$num = 0 }} -->
                    <tbody>
                                              
                      @foreach($results as $asig)  
                      <tr>
                            <td>{{$num = $num + 1}}</td>
                            <td>{{$asig->nombre}} {{$asig->ap_pat}}</td>
                            <td>{{$asig->fecha}}</td>
                            <td>{{$asig->fecha}}</td>
                            <td>{{$asig->piso}}</td>
                            <td>{{$asig->id}}</td>
                            <td>
                                <a href="{{ url($asig->id.'/editasig')}}" class="fa-item col-md-3 col-sm-4">
                                        <i class="fa fa-edit"></i></a>
                                <a href="{{ url($asig->id.'/deleteasig')}}" class="fa-item col-md-3 col-sm-4">
                                        <i class="fa fa-trash-o"></i></a>
                                <a href="{{ url($asig->id.'/actualizarasig')}}" class="fa-item col-md-3 col-sm-4">
                                        <i class="fa fa-file-pdf-o"></i></a>
                            </td>
                      @endforeach 
                     <!--$request->fecha->format('Y');-->
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Gestion</th>
                            <th>Piso</th>
                            <th>Id</th>
                            <th></th>                            
                        </tr>
                    </tfoot>
                    
                  </table>

                    

                 </div>
          </div>
         
          <!-- END SAMPLE TABLE PORTLET-->
      </div>
  
@endsection
