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

              <h3 class="profile-username text-center">General</h3>

              
                <div class= "col-sm-4"style="display: inline-block; vertical-align: top;">
                  <li class="list-group-item">
                    <b>Nombres:</b> <a class="float-right">{{$fichaPer->primerNombre}} {{ $fichaPer->segundoNombre}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Apellidos:</b> <a class="float-right">{{ $fichaPer->primerApellido}} {{ $fichaPer->segundoApellido}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Fecha Nac</b> <a class="float-right">{{ $fichaPer->fechaNac}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Pais</b> <a class="float-right">{{ $fichaPer->pais->nombre}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Secc. Policial</b> <a class="float-right">{{ $fichaPer->seccionalPolicial}}</a>
                  </li>
                </div>
                <div class= "col-sm-3" style="display: inline-block; vertical-align: top;">
                  <li class="list-group-item">
                    <b>Cedula</b> <a class="float-right">{{ $fichaPer->cedula}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Otro doc</b> <a class="float-right">{{ $fichaPer->otroDocNombre}} {{ $fichaPer->otroDocNumero}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Sexo</b> <a class="float-right">{{ $fichaPer->sexo}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Credencial</b> <a class="float-right">{{ $fichaPer->credencial}} </a>
                  </li>
                  <li class="list-group-item">
                    <b>Depto.</b> <a class="float-right">{{ $fichaPer->departamento->nombre}} </a>
                  </li>
                  
                </div>
                <div class= "col-sm-4" style="display: inline-block; vertical-align: top;">
                  <li class="list-group-item">
                    <b>Estado Civil</b> <a class="float-right">{{ $fichaPer->estadoCivil->nombre}} </a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $fichaPer->correoElectronico}} </a>
                  </li>
                  <li class="list-group-item">
                    <b>Fecha def</b> <a class="float-right">{{ $fichaPer->fechaDef}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Barrio</b> <a class="float-right">{{ $fichaPer->ciudad->nombre}}</a>
                  </li>
                 
                </div>
              
              
            </div>
        
            <div class="card-body" style="padding-top: 1px">
              <h3 class="profile-username text-center">Militar</h3>
                    
                <div class= "col-sm-4"style="display: inline-block; vertical-align: top;">
                  <li class="list-group-item">
                    <b>Fuerza</b> <a class="float-right">{{ $fichaPer->fuerza->nombre}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Situacion</b> <a class="float-right">{{ $fichaPer->situacion->nombre}}</a>
                  </li>
                </div>
                <div class= "col-sm-3" style="display: inline-block; vertical-align: top;">
                  <li class="list-group-item">
                    <b>Grado</b> <a class="float-right">{{ $fichaPer->grado->nombre}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Paquete Ingreso</b> <a class="float-right">{{ $fichaPer->numeroPaquete}}</a>
                  </li>
                </div>
                <div class= "col-sm-4" style="display: inline-block; vertical-align: top;">
                  <li class="list-group-item">
                    <b>Especialidad</b> <a class="float-right">{{ $fichaPer->armaCuerpo->nombre}} </a>
                  </li>
                  <li class="list-group-item">
                    <b>Estado Ingreso</b> <a class="float-right">{{ $fichaPer->estadoIngreso}} </a>
                  </li>
                  
                </div>
            </div>

            <div class="card-body" style="padding-top: 1px">
              <h3 class="profile-username text-center">Unidades</h3>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sigla</th>
                  <th>Nombre</th>
                </tr>
                </thead>
                <tbody>  
                  @foreach ($unidades as $unidad)          
                  <tr>
                    <td>{{$unidad->sigla}}</td>
                    <td>{{$unidad->nombre}}</td> 
                  </tr> 
                  @endforeach     
                </tbody>
              </table>               
            </div>

            <div class="card-body" style="padding-top: 1px">
              <h3 class="profile-username text-center">Ideologias</h3>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Ideologia</th>
                  <th>Observación</th>
                </tr>
                </thead>
                <tbody>            
                  <tr>
                    <td>Ideologia</td>
                    <td>Observación</td> 
                  </tr>      
                </tbody>
              </table>               
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