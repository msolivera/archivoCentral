@extends('layout')

@section('header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
           <h2> Fichas Personales
        <small>Opciones</small>
        </h2>
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