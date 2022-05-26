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
  <div class="row md-12">
    <div class="container-fluid">
      
            <!-- INFORMACION BASICA -->
          <div class="card card-primary">
            
            <div class="card-body">
              <div class="text-center">
                <img class="img-fluid"
                    src="dist/img/user4-128x128.jpg"
                    alt="Foto del sujeto">
              </div>

              <h3 class="profile-username text-center">{{$fichaPer->primerNombre}} {{ $fichaPer->primerApellido}} - {{ $fichaPer->situacion->nombre}}</h3>

              
                <div class= "col-sm-4"style="display: inline-block;">
                  <li class="list-group-item">
                    <b>Nombres:</b> <a class="float-right">{{$fichaPer->primerNombre}} {{ $fichaPer->segundoNombre}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Apellidos:</b> <a class="float-right">{{ $fichaPer->primerApellido}} {{ $fichaPer->segundoApellido}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Fecha Nac</b> <a class="float-right">{{ $fichaPer->fechaNac}}</a>
                  </li>
                </div>
                <div class= "col-sm-3" style="display: inline-block;">
                  <li class="list-group-item">
                    <b>Cedula</b> <a class="float-right">{{ $fichaPer->cedula}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Sexo</b> <a class="float-right">{{ $fichaPer->sexo}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Credencial</b> <a class="float-right">{{ $fichaPer->credencial}} </a>
                  </li>
                </div>
                <div class= "col-sm-4" style="display: inline-block;">
                  <li class="list-group-item">
                    <b>Estado Civil</b> <a class="float-right">{{ $fichaPer->estadoCivil->nombre}} </a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $fichaPer->correoElectronico}} </a>
                  </li>
                  <li class="list-group-item">
                    <b>Fecha def</b> <a class="float-right">{{ $fichaPer->fechaDef}}</a>
                  </li>
                </div>
              
              
            </div>
        
            <div class="card-body">
              <h3 class="profile-username text-center">{{$fichaPer->primerNombre}} {{ $fichaPer->primerApellido}}</h3>
                    
                <div class= "col-sm-4"style="display: inline-block;">
                  <li class="list-group-item">
                    <b>Nombres:</b> <a class="float-right">{{$fichaPer->primerNombre}} {{ $fichaPer->segundoNombre}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Apellidos:</b> <a class="float-right">{{ $fichaPer->primerApellido}} {{ $fichaPer->segundoApellido}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Fecha Nac</b> <a class="float-right">{{ $fichaPer->fechaNac}}</a>
                  </li>
                </div>
                <div class= "col-sm-3" style="display: inline-block;">
                  <li class="list-group-item">
                    <b>Cedula</b> <a class="float-right">{{ $fichaPer->cedula}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Sexo</b> <a class="float-right">{{ $fichaPer->sexo}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Credencial</b> <a class="float-right">{{ $fichaPer->credencial}} </a>
                  </li>
                </div>
                <div class= "col-sm-4" style="display: inline-block;">
                  <li class="list-group-item">
                    <b>Estado Civil</b> <a class="float-right">{{ $fichaPer->estadoCivil->nombre}} </a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $fichaPer->correoElectronico}} </a>
                  </li>
                  <li class="list-group-item">
                    <b>Fecha def</b> <a class="float-right">{{ $fichaPer->fechaDef}}</a>
                  </li>
                </div>
              
              
            </div>
            <a href="#" class="btn btn-primary btn-block"><b>Descargar Ficha PDF</b></a>
            <!-- /.card-body -->

          </div>

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