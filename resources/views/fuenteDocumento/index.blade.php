@extends('layout')
@section('header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <h4> Fuente de Documentos
        <small>• Ver</small>
        </h4>
    </ol>

  </nav>

@stop

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">


        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-8">
              <h3 class="card-title">Vista General</h3>
              </div>
              <div class="col-4">
              <button style="float: right;" class="btn btn-block btn-outline-primary col-6" 
              data-toggle="modal" data-target="#insertModal">Nuevo</button>
              </div>
          
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($fuentes as $fuente)
                <tr>
                  <td>{{$fuente->id}}</td>
                  <td>{{$fuente->nombre}}</td>
                  <td>
                   
                  <a href="fuenteDocumento/edit/{{$fuente->id}}" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                  <form method="POST" action="{{route('fuenteDocumento.destroy',$fuente->id)}}" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
                    <button class="btn btn-xs btn-danger"
                      onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"
                    ><i class="fa fa-light fa-trash"></i></button>
                  </form> 
                  </td> 
                </tr> 
                @endforeach
                          
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>


@stop
@push('styles')
<!--INICIO CSS PARA LAS TABLAS -->
<link rel="stylesheet" href="adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!--FIN CSS PARA LAS TABLAS -->
@endpush
@push('scripts')

<!-- INICIO DataTables  & Plugins -->
<script src="adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="adminLTE/plugins/jszip/jszip.min.js"></script>
<script src="adminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="adminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="adminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- FIN DataTables  & Plugins -->
<!-- Page specific script DE LA TABLA DE FICHAS -->
<script>
$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      buttons: [
            {
                extend: 'copy',
                exportOptions: {
                  columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                  columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                  columns: ':visible'
                }
            },
            'colvis'
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<!-- Page specific script DE LA TABLA DE FICHAS -->
<!-- Modal para insertar -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form method="POST" action="{{route('fuenteDocumento.store')}}">
    {{ csrf_field() }}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear</h4>
      </div>
      <div class="modal-body">
        <div class="form-group {{$errors->has('nombre') ? 'has-error' : ''}} ">
          <label for="nombre">Nombre</label>
          <input name = "nombre" 
                type="imput" 
                class="form-control" 
                id="nombre" 
                placeholder="..." 
                value="{{old('nombre')}}">
          <!--- Muestro los errores de validacion.-->
          {!! $errors->first('nombre','<span class=error style=color:red>:message</span>')!!}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button  class="btn btn-primary">Crear</button>
      </div>
    </div>
  </div>
  </form>
</div>


@endpush 