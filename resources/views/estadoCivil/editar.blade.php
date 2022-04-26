@extends('layout')

@section('header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
           <h4> Estado Civil
        <small>• Editar</small>
        </h4>
        
    </ol>

  </nav>

@stop


@section('content')
<section class="content">
    <form method="POST" action="{{route('estadoCivil.update', $estadoCivil)}}">
        {{ csrf_field() }} {{ method_field('PUT') }}
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Editar Estado Civil</h5>
                        
                    </div>
                    
                    <div class="card-body">
                        <div class="form-group {{$errors->has('nombre') ? 'has-error' : ''}} ">
                            <label for="nombre">Estado Civil</label>
                            <input name = "nombre" 
                                  type="imput" 
                                  class="form-control" 
                                  id="nombre" 
                                  placeholder="..." 
                                  value="{{old('nombre',$estadoCivil->nombre)}}">
                            <!--- Muestro los errores de validacion.-->
                            {!! $errors->first('nombre','<span class=error style=color:red>:message</span>')!!}
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="col-md-4" style="float: left;">
                        <button type="submit" class="btn btn-success btn-block">Guardar</button>
                        </div>
                        <div class="col-md-4" style="float: right;">
                        <a href="{{route('estadoCivil.index')}}"  class="btn btn-block btn-outline-primary">Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
    </form>
  
</section>
@stop


@push('styles')
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminLTE/css/adminlte.min.css">
@endpush
@push('scripts')
<!-- InputMask -->
<script src="/adminLTE/plugins/moment/moment.min.js"></script>
<script src="/adminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

@endpush
