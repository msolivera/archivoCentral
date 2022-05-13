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
            <div class="row">
              <div class="col-8">
              <h3 class="card-title">Vista General de Fichas Personales</h3>
              </div>
              <div class="col-4">
              <button style="float: right;" class="btn btn-block btn-outline-primary col-6" 
                      data-toggle="modal" data-target=".bd-example-modal-lg">Nuevo</button>
              </div>
            </div>
          
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Cedula</th>
                <th>Primer Nombre</th>
                <th>Primer Apellido</th>
                <th>País ID</th>
                <th>Estado Ingreso</th>
                <th>Fuerza</th>
                <th>Grado</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($fichasPer as $ficha)
                <tr>
                  <td>{{$ficha->cedula}}</td>
                  <td>{{$ficha->primerNombre}}</td>
                  <td>{{$ficha->primerApellido}}</td>
                  <td>{{$ficha->paisId}}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                  <a href="fichasPersonales/{{$ficha->id}}" class="btn btn-xs btn-success"><i class="fa fa-light fa-eye"></i></a>  
                  <a href="fichasPersonales/edit/{{$ficha->id}}" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                  <form method="POST" action="{{route('fichasPersonales.destroy',$ficha->id)}}" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
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
<!--ESTILOS PARA CALENDARIO daterange picker -->
<link rel="stylesheet" href="adminLTE/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="adminLTE/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="adminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="adminLTE/css/adminlte.min.css">
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
<!-- date-range-picker -->
<script src="adminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="adminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="adminLTE/plugins/moment/moment.min.js"></script>
<script src="adminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- FIN DataTables  & Plugins -->
<!-- Page specific script DE LA TABLA DE FICHAS -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", /*"csv",*/ "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
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
<!-- Page specific script DE LA TABLA DE FICHAS -->
<!--Script para date picker y select -->

<!-- Modal para insertar -->
<div class="modal fade bd-example-modal-lg" id=".bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form method="POST" action="{{route('fichasPersonales.store')}}">
    {{ csrf_field() }}
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
              <div class="form-group {{$errors->has('numeroPaquete') ? 'has-error' : ''}} ">
                  <label for="numeroPaquete">Nro. Paquete de Ingreso</label>
                  <input name = "numeroPaquete" 
                      type="imput" 
                      class="form-control" 
                      id="numeroPaquete" 
                      placeholder="..." 
                      value="{{old('numeroPaquete')}}">
                  <!--- Muestro los errores de validacion.-->
                  {!! $errors->first('numeroPaquete','<span class=error style=color:red>:message</span>')!!}
              </div>
          </div>    
          <div class="col-md-4">
              <div class="form-group {{$errors->has('clasificacion') ? 'has-error' : ''}} ">
                <label for="clasificacionId">Clasificación</label>
                <select name="clasificacionId" 
                class="form-control select2" 
                style="width: 100%;" 
                id="clasificacionId">
                <option value=""> Seleccione una Clasificación</option>
                    @foreach ($clasificaciones as $clasificacion)
                    <option value="{{$clasificacion->id}}">{{$clasificacion->nombre}}</option>
                    @endforeach
        </select>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="temas">Temas</label>
                  <select  name="unidades[]" 
                      class="select2" 
                      multiple="multiple" 
                      data-placeholder="Seleccione Uno o mas temas" 
                      style="width: 100%;">
                      <option value=""> Seleccione un Temas</option>
                    @foreach ($temas as $tema)
                    <option value="{{$tema->id}}">{{$tema->nombre}}</option>
                    @endforeach
                  </select>  
              </div> 
          </div>
           
      </div>
        <div class="col-md-6" style= "display: inline-block;" >
          <div class="form-group {{$errors->has('primerNombre') ? 'has-error' : ''}} ">
            <label for="nombre">Primer Nombre</label>
            <input name = "primerNombre" 
                  type="imput" 
                  class="form-control" 
                  id="nombre" 
                  placeholder="..." 
                  value="{{old('primerNombre')}}">
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
                  value="{{old('primerApellido')}}">
            {!! $errors->first('primerApellido','<span class=error style=color:red>:message</span>')!!}
          </div>
          
          <div class="form-group" {{$errors->has('cedula') ? 'has-error' :''}}">
            <label for="cedula">Cedula</label>
            <input name = "cedula" 
                  type="imput" 
                  class="form-control" 
                  id="cedula" placeholder="..."
                  value="{{old('cedula')}}">
                  {!! $errors->first('cedula','<span class=error style=color:red>:message</span>')!!}
          </div>

          <div class="form-group">
            <label for="otroDocNombre">Otro Documento</label>
            <div class="row">
            <div class="col-md-6" >
              <select name="otroDocNombre" 
                class="form-control select2" 
                style="width: 100%;" 
                id="otroDocNombre">
                <option value=""> Seleccione un Documento</option> 
                <option value="dni">DNI</option>      
                <option value="libretaEmbarque">Libreta de Embarque</option>      
              </select> 
            </div>
            <div class="col-md-6" style= "display: inline-block; float: right;">
              <input name = "otroDocNumero" 
              type="imput" 
              class="form-control" 
              id="otroDocNumero" placeholder="..."
              value="{{old('otroDocNumero')}}">
            </div>
          </div>
          </div>

          <div class="form-group">
            <label for="pais">Pais</label>
            <select name="paisId" 
                    class="form-control select2" 
                    style="width: 100%;" 
                    id="paisId">
                    <option value=""> Seleccione un Pais</option>
                    @foreach ($paises as $pais)
                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                    @endforeach
            </select> 
          </div>

          <div class="form-group">
            <label for="departamentoId">Departamento</label>
            <select name = "departamentoId" 
                  class="form-control select2" 
                  id="departamentoId"> 
                  <option value=""> Seleccione un Departamento</option>
                  @foreach ($departamentos as $departamento)
                  <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                  @endforeach
             </select> 
          </div>

          <div class="form-group {{$errors->has('correoElectronico') ? 'has-error' : ''}} ">
            <label for="correoElectronico">Correo Electrónico</label>
            <input name = "correoElectronico" 
                  type="imput" 
                  class="form-control" 
                  id="correoElectronico" 
                  placeholder="..." 
                  value="{{old('correoElectronico')}}">
            <!--- Muestro los errores de validacion.-->
            {!! $errors->first('correoElectronico','<span class=error style=color:red>:message</span>')!!}
          </div>

          <div class="form-group" style= 'margin-bottom: 35px;'>
            <label for="sexo">Sexo</label>
            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="sexo1" name="sexo" value="Hombre">
              <label for="sexo1" class="custom-control-label">Hombre</label>
            </div>
            <div class="custom-control custom-radio" >
              <input class="custom-control-input" type="radio" id="sexo2" name="sexo" value="Mujer">
              <label for="sexo2" class="custom-control-label">Mujer</label>
            </div>
          </div>

          <div class="form-group">
            <label for="estadoIngreso">Estado de Ingreso</label>
            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="estado0" name="estadoIngreso" value="No Aplica">
              <label for="estado0" class="custom-control-label">No Aplica</label>
            </div>
            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="estado1" name="estadoIngreso" value="Primera Vez">
              <label for="estado1" class="custom-control-label">Primera Vez</label>
            </div>
            <div class="custom-control custom-radio" >
              <input class="custom-control-input" type="radio" id="estado2" name="estadoIngreso" value="Reingreso">
              <label for="estado2" class="custom-control-label">Reingreso</label>
            </div>
            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="estado3" name="estadoIngreso" value="Sol. Anteriores">
              <label for="estado3" class="custom-control-label">Sol. Anteriores</label>
            </div>
          </div>

          <div class="form-group {{$errors->has('numeroPaquete') ? 'has-error' : ''}} ">
            <label for="numeroPaquete">Nro. Paquete de Ingreso</label>
            <input name = "numeroPaquete" 
                  type="imput" 
                  class="form-control" 
                  id="numeroPaquete" 
                  placeholder="..." 
                  value="{{old('numeroPaquete')}}">
            <!--- Muestro los errores de validacion.-->
            {!! $errors->first('numeroPaquete','<span class=error style=color:red>:message</span>')!!}
          </div>
        </div>

        <div class="col-md-6" style= "display: inline-block; float: right;" >
          <div class="form-group {{$errors->has('segundoNombre') ? 'has-error' : ''}} ">
            <label for="nombre">Segundo Nombre</label>
            <input name = "segundoNombre" 
                  type="imput" 
                  class="form-control" 
                  id="nombre" 
                  placeholder="..." 
                  value="{{old('segundoNombre')}}">
            <!--- Muestro los errores de validacion.-->
            {!! $errors->first('segundoNombre','<span class=error style=color:red>:message</span>')!!}
          </div>

          <div class="form-group {{$errors->has('segundoApellido') ? 'has-error' :''}}">
            <label for="apellido">Segundo apellido</label>
            <input name = "segundoApellido" 
                  type="imput" 
                  class="form-control" 
                  id="apellido" 
                  placeholder="..."
                  value="{{old('segundoApellido')}}">
            {!! $errors->first('segundoApellido','<span class=error style=color:red>:message</span>')!!}
          </div>

          <div class="form-group">
            <label for="credencial">Credencial Cívica</label>
            <input name = "credencial" 
                  type="imput" 
                  class="form-control" 
                  id="credencial" placeholder="..."
                  value="{{old('credencial')}}">
          </div>

          <div class="form-group">
            <label>Fecha de Nacimiento</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input name = "fechaNac" 
                        type="text" 
                        class="form-control datetimepicker-input" 
                        data-target="#reservationdate"
                        value="{{old('fechaNac')}}"/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
          </div>
          
          <div class="form-group">
            <label for="ciudad">Ciudad - Barrio</label>
            <select name="ciudadId" 
                    class="form-control select2" 
                    style="width: 100%;" 
                    id="ciudadId">
              <option value=""> Seleccione una Ciudad - Barrio</option>
                @foreach ($ciudades as $ciudad)
                  <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                @endforeach
            </select> 
          </div>

          <div class="form-group">
            <label for="estadoCivilId">Estado Civil</label>
            <select name="estadoCivilId" 
                    class="form-control select2" 
                    style="width: 100%;" 
                    id="estadoCivilId">
              <option value=""> Seleccione un Estado Civil</option>
                @foreach ($estadosCiviles as $estadoCivil)
                  <option value="{{$estadoCivil->id}}">{{$estadoCivil->nombre}}</option>
                @endforeach
            </select> 
          </div>

          <div class="form-group {{$errors->has('seccional') ? 'has-error' : ''}} ">
            <label for="seccionalPolicial">Seccional Policial</label>
            <input name = "seccionalPolicial" 
                  type="imput" 
                  class="form-control" 
                  id="seccionalPolicial" 
                  placeholder="..." 
                  value="{{old('seccionalPolicial')}}">
            <!--- Muestro los errores de validacion.-->
            {!! $errors->first('seccionalPolicial','<span class=error style=color:red>:message</span>')!!}
          </div>

          <div class="form-group">
            <label>Fecha de Defuncion</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input name = "fechaDef" 
                        type="text" 
                        class="form-control datetimepicker-input" 
                        data-target="#reservationdate"
                        value="{{old('fechaDef')}}"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
          </div>
      
          <div class="form-group">
            <label for="situacionId">Situación</label>
            <select name="situacionId" 
                    class="form-control select2" 
                    style="width: 100%;" 
                    id="situacionId">
              <option value=""> Seleccione un Situación</option>
                @foreach ($situaciones as $situacion)
                  <option value="{{$situacion->id}}">{{$situacion->nombre}}</option>
                @endforeach
            </select> 
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-6" >
                <label for="fuerzaId">Fuerza</label>
                <select name="fuerzaId" 
                  class="form-control select2" 
                  style="width: 100%;" 
                  id="fuerzaId">
                  <option value=""> </option> 
                    @foreach ($fuerzas as $fuerza)
                      <option value="{{$fuerza->id}}">{{$fuerza->nombre}}</option>
                    @endforeach
                </select> 
              </div>
              <div class="col-md-6" style= "display: inline-block; float: right;">
                <label for="gradoId">Grado</label>
                <select name="gradoId" 
                  class="form-control select2" 
                  style="width: 100%;" 
                  id="gradoId">
                  <option value=""> </option> 
                    @foreach ($grados as $grado)
                      <option value="{{$grado->id}}">{{$grado->nombre}}</option>
                    @endforeach
                </select>
              </div>
              </div>
          </div>

          <div class="form-group">
            <label for="cuerpoId">Cuerpo/Arma</label>
            <select name="cuerpoId" 
                    class="form-control select2" 
                    style="width: 100%;" 
                    id="cuerpoId">
              <option value=""> Seleccione Cuerpo/Arma</option>
                @foreach ($cuerpos as $cuerpo)
                  <option value="{{$cuerpo->id}}">{{$cuerpo->nombre}}</option>
                @endforeach
            </select> 
          </div>
        
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