@extends('layout')

@section('header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
           <h4> Fichas Personales
        <small>• Crear</small>
        </h4>
    </ol>

  </nav>

@stop

@section('content')
<section class="content">
<form>


  <div class="row">
  
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h5 class="card-title">Nueva Ficha</h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
          <div class="card-body">
            <div class="form-group">
              <label for="nombre">Primer Nombre</label>
              <input type="imput" class="form-control" id="nombre" placeholder="...">
            </div>
            <div class="form-group">
              <label for="apellido">Primer apellido</label>
              <input type="imput" class="form-control" id="apellido" placeholder="...">
            </div>
            <div class="form-group">
              <label for="cedula">Cedula</label>
              <input type="imput" class="form-control" id="cedula" placeholder="...">
            </div>

            <div class="form-group">
              <label>Fecha de Nacimiento</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input name = "fechaNac" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
          </div>
          <!-- /.card-body -->
        
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
       
      </div>
      <!-- /.card -->

    </div>

    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h5 class="card-title"></h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
          <div class="card-body">
            <div class="form-group">
              <label for="pais">Pais</label>
              <input type="imput" class="form-control" id="pais" placeholder="...">
            </div>
            <div class="form-group">
              <label for="unidad">Unidad</label>
              <select class="form-control">
                <option value=""> Seleccione una Unidad</option>
                @foreach ($unidades as $unidad)
                  <option value={{$unidad->id}}> {{$unidad->nombre}}</option>
                @endforeach
              </select>  
            </div>
          </div>
          <!-- /.card-body -->
        
      </div>
      <!-- /.card -->

    </div>
  
  
  </form>
</div>
</section>
@stop

@push('styles')
<!--ESTILOS PARA CALENDARIO daterange picker -->
<link rel="stylesheet" href="../adminLTE/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="../adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@endpush
@push('scripts')
<!-- INICIO TODO ESTO PARA CALENDARIO -->
<!-- date-range-picker -->
<script src="../adminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="../adminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../adminLTE/plugins/moment/moment.min.js"></script>
<script src="../adminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
 $(function () {
    
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  
  </script>
@endpush

