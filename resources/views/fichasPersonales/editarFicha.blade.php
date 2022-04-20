@extends('layout')

@section('header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
           <h4> Fichas Personales
        <small>• Editar</small>
        </h4>
    </ol>

  </nav>

@stop

@section('content')
<section class="content">
    <form method="POST" action="{{route('fichasPersonales.update', $fichaPer)}}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Editar Ficha</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group {{$errors->has('primerNombre') ? 'has-error' : ''}} ">
                            <label for="nombre">Primer Nombre</label>
                            <input name = "primerNombre" 
                                  type="imput" 
                                  class="form-control" 
                                  id="nombre" 
                                  placeholder="..." 
                                  value="{{old('primerNombre',$fichaPer->primerNombre)}}">
                            <!--- Muestro los errores de validacion.-->
                            {!! $errors->first('primerNombre','<span class=error style=color:red>:message</span>')!!}
                        </div>
                        <div class="form-group {{$errors->has('primerApellido') ? 'has-error' :''}}">
                            <label for="apellido">Primer apellido</label>
                            <input name = "primerApellido" 
                                  type="imput" 
                                  class="form-control" 
                                  id="apellido" 
                                  placeholder="..."
                                  value="{{$fichaPer->primerApellido}}">
                            {!! $errors->first('primerApellido','<span class=error style=color:red>:message</span>')!!}
                        </div>
                        <div class="form-group">
                            <label for="cedula">Cedula</label>
                            <input name = "cedula" 
                                  type="imput" 
                                  class="form-control" 
                                  id="cedula" placeholder="..."
                                  value="{{old('primerApellido',$fichaPer->cedula)}}">
                        </div>
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                  <input name = "fechaNac" 
                                        type="text" 
                                        class="form-control datetimepicker-input" 
                                        data-target="#reservationdate"
                                        value="{{old('fechaNac',$fichaPer->fechaNac)}}"/>
                                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                      <h5 class="card-title"></h5>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                          <label for="pais">Pais</label>
                          <select name="paisId" 
                                  class="form-control select2" 
                                  style="width: 100%;" 
                                  id="paisId">
                            <option value="{{$fichaPais->id}}"> Seleccione un Pais</option>
                                @foreach ($paises as $pais)
                                <option value="{{$pais->id}}"
                                    {{old('paisId', $fichaPer->paisId) == $pais->id ? 'selected' : ''}}>
                                    {{$pais->nombre}}</option>
                                @endforeach
                          </select> 
                        </div>
                        
                        
                        <div class="form-group">
                          <label for="unidad">Unidad</label>
                            <select  name="unidades[]" 
                                  class="select2" 
                                  multiple="multiple" 
                                  data-placeholder="Seleccione Una o mas unidades" 
                                  style="width: 100%;"
                                  > 
                                @foreach ($unidades as $unidad)
                                <option {{collect(old('unidades', /*$fichaPer->unidades->pluck('id')*/))->contains($unidad->id) ? 'selected' : ''}} 
                                    value={{$unidad->id}}> {{$unidad->nombre}}
                                </option>
                                @endforeach
                            </select>  
                        </div>     
                </div>
            </div>
        </div>
    </form>
</section>
@stop


@push('styles')
<!--ESTILOS PARA CALENDARIO daterange picker -->
<link rel="stylesheet" href="/adminLTE/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="/adminLTE/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/adminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminLTE/css/adminlte.min.css">
@endpush
@push('scripts')
<!-- INICIO TODO ESTO PARA CALENDARIO -->
<!-- date-range-picker -->
<script src="/adminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="/adminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="/adminLTE/plugins/moment/moment.min.js"></script>
<script src="/adminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
 $(function () {
   //Initialize Select2 Elements
   $('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
    
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })

  </script>
@endpush

