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
  <div class="row">
  
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h5 class="card-title">Nueva Ficha</h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
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
          </div>
          <!-- /.card-body -->
        </form>
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
          </div>
          <!-- /.card-body -->
        
      </div>
      <!-- /.card -->

    </div>
  
  </div>
</section>
@stop