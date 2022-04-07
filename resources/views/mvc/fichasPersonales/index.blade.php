@extends('layout')

@section('header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <h4> Fichas Personales
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
            <h3 class="card-title">Vista General de Fichas Personales</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Cedula</th>
                <th>Primer Nombre</th>
                <th>Primer Apellido</th>
                <th>País ID</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($fichasPer as $ficha)
                <tr>
                  <td>{{$ficha->id}}</td>
                  <td>{{$ficha->cedula}}</td>
                  <td>{{$ficha->PrimerNombre}}</td>
                  <td>{{$ficha->PrimerApellido}}</td>
                  <td>{{$ficha->paisId}}</td>
                  <td>
                  <a href="#" class="btn btn-xs btn-success"><i class="fa fa-light fa-eye"></i></a>  
                  <a href="#" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                  <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-light fa-trash"></i></a>  
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
<link rel="stylesheet" href="../adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!--FIN CSS PARA LAS TABLAS -->
@endpush
@push('scripts')

<!-- INICIO DataTables  & Plugins -->
<script src="../adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../adminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../adminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../adminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../adminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- FIN DataTables  & Plugins -->
<!-- Page specific script DE LA TABLA DE FICHAS -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", /*"excel",*/ "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<!-- Page specific script DE LA TABLA DE FICHAS -->


@endpush 