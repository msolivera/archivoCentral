@extends('layout')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="adminLTE/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="adminLTE/css/adminlte.min.css">
@section('header')
<div class="card-header">
  <div class="row">
    <div class="col-8">
    <h3 class="card-title">Fichas Personales • Vista General</h3>
    </div>
    <div class="col-4">
      <a href="{{route('fichasPersonales.index')}}" style="float: right;" class="btn btn-block btn-outline-primary col-6">Atrás</a>
    </div>

  </div>
</div>

@stop

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">

        <!-- INFORMACION BASICA -->
        <div class="card card-primary">
          <div class="card-header">
          </div>
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="img-fluid"
                   src="dist/img/user4-128x128.jpg"
                   alt="Foto del sujeto">
            </div>

            <h3 class="profile-username text-center">{{$fichaPer->primerNombre}} {{ $fichaPer->primerApellido}}</h3>

            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <b>Nombres:</b> <a class="float-right">{{$fichaPer->primerNombre}}</a>
              </li>
              <li class="list-group-item">
                <b>Apellidos:</b> <a class="float-right">{{ $fichaPer->primerApellido}}</a>
              </li>
              <li class="list-group-item">
                <b>Fecha de Nacimiento</b> <a class="float-right">{{ $fichaPer->fechaNac}}</a>
              </li>
              <li class="list-group-item">
                <b>Cedula de Identidad</b> <a class="float-right">{{ $fichaPer->cedula}}</a>
              </li>
              <li class="list-group-item">
                <b>Sexo</b> <a class="float-right"> </a>
              </li>
              <li class="list-group-item">
                <b>Credencial Civica</b> <a class="float-right"> </a>
              </li>
              <li class="list-group-item">
                <b>Estado Civil</b> <a class="float-right"> </a>
              </li>
              <li class="list-group-item">
                <b>Correo electronico</b> <a class="float-right"> </a>
              </li>
              <li class="list-group-item">
                <b>Fecha de defuncion</b> <a class="float-right"></a>
              </li>
            </ul>
            <a href="#" class="btn btn-primary btn-block"><b>Descargar Ficha PDF</b></a>
          </div>
          <!-- /.card-body -->
        </div>
      </div>

      <!-- /.col -->
      <div class="col-md-8">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#militar" data-toggle="tab">Militar</a></li>
              <li class="nav-item"><a class="nav-link" href="#ubicacion" data-toggle="tab">Ubicacion</a></li>
              <li class="nav-item"><a class="nav-link" href="#profesional" data-toggle="tab">Profesional</a></li>
              <li class="nav-item"><a class="nav-link" href="#anotaciones" data-toggle="tab">Anotaciones</a></li>
              <li class="nav-item"><a class="nav-link" href="#docRelacion" data-toggle="tab">Documentos relacionados</a></li>
              <li class="nav-item"><a class="nav-link" href="#dossRelacion" data-toggle="tab">Dossier relacionados</a></li>
              <li class="nav-item"><a class="nav-link" href="#personalRelacion" data-toggle="tab">Relaciones personales</a></li>
              <li class="nav-item"><a class="nav-link" href="#impersonalRelacion" data-toggle="tab">Relaciones impersonales</a></li>
              <li class="nav-item"><a class="nav-link" href="#galeria" data-toggle="tab">Galeria</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Seguridad</a></li>
            </ul>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="militar">
                <div class="container row">
                  <div class="col-sm-6">
                    <strong>Fuerza: </strong>
                    <p class="text-muted"> </p>
                    <hr>
                    <strong>Situacion: </strong>
                    <p class="text-muted"> </p>
                    <hr>
                    <strong>Unidades: </strong>
                    @foreach ($unidades as $unidad)
                    <p class="text-muted">{{$unidad->nombre}}</p>
                    @endforeach
                    
                    
                  </div>
                  <div class="col-sm-6">
                    <strong>Grado: </strong>
                    <p class="text-muted"> </p>
                    <hr>
                    <strong>Estado de ingreso:</strong>
                    <p class="text-muted"> </p>
                    <hr>
                    <strong>Paquete de ingreso Nro.:</strong>
                    <p class="text-muted"> </p>
                  </div>
                 </div>
              
              </div>

              <div class="tab-pane" id="ubicacion">
                <div class="container row">
                  <div class="col-sm-6">
                    <strong>Pais: </strong>
                    <p class="text-muted">{{$pais->nombre}}</p>                   
                    <hr>
                    <strong>Departamento: </strong>
                    <p class="text-muted"> </p>
                    <hr>
                    <strong>Ciudad/barrio: </strong>
                    <p class="text-muted"> </p>
                  </div>
                  <div class="col-sm-6">
                    <strong>Domicilio/s: </strong>
                    <p class="text-muted"> </p>
                    <hr>
                    <strong>Seccional Policial: </strong>
                    <p class="text-muted"> </p>
                    <hr>
                  </div>
                 </div>
              </div>

              <div class="tab-pane" id="profesional">
                <div class="card-body">
                  <strong><i class="fas fa-book mr-1"></i> Educacion</strong>
  
                  <p class="text-muted">
                     
                  </p>
  
                  <hr>
  
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
  
                  <p class="text-muted"> </p>
  
                  <hr>
  
                  <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
  
                  <p class="text-muted">
                    <span class="tag tag-danger"> </span>
                   
                  </p>
  
                  <hr>
  
                  <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
  
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@stop

<!-- jQuery -->
<script src="adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="adminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="adminLTE/js/adminlte.min.js"></script>
<script src="adminLTE/plugins/jquery/jquery.min.js"></script>