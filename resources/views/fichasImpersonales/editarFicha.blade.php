@extends('layout')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <h4> Ficha Impersonal
                <small>• Editar</small>
            </h4>

        </ol>

    </nav>

@stop


@section('content')
    <section class="content">
        <form method="POST" action="{{ route('fichaImpersonal.update', $fichaImpersonal->id) }}">
            {{ csrf_field() }} {{ method_field('PUT') }}
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Editar Ficha Impersonal</h5>

                    </div>

                    <div class="card-body">
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} ">
                            <label for="nombre">Título</label>
                            <input name="nombre" type="imput" class="form-control" id="nombre" placeholder="..."
                                value="{{ old('nombre', $fichaImpersonal->nombre) }}">
                            <!--- Muestro los errores de validacion.-->
                            {!! $errors->first('nombre', '<span class=error style=color:red>:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('clasificacion_id') ? 'has-error' : '' }} ">
                            <label for="clasificacion_id">Clasificación</label>
                            <select name="clasificacion_id" class="form-control select2" style="width: 100%;"
                                id="clasificacion_id">
                                <option value=""> Clasificación</option>
                                @foreach ($clasificaciones as $clasificacion)
                                    <option value="{{ $clasificacion->id }}"
                                        {{ old('clasificacion_id', $fichaImpersonal->clasificacion_id) == $clasificacion->id ? 'selected' : '' }}>
                                        {{ $clasificacion->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="temas">Temas</label>
                            <select name="temas[]" class="select2" multiple="multiple"
                                data-placeholder="Seleccione Uno o mas temas" style="width: 100%;">
                                @foreach ($temas as $tema)
                                    <option
                                        {{ collect(old('temas[]', collect($fichaTemas)->pluck('tema_Id')))->contains($tema->id) ? 'selected' : '' }}
                                        value={{ $tema->id }}> {{ $tema->nombre }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unidad">Unidades</label>
                            <select name="unidades[]" class="select2" multiple="multiple"
                                data-placeholder="Seleccione Una o mas unidades" style="width: 100%;">
                                @foreach ($unidades as $unidad)
                                    <option
                                        {{ collect(old('unidades[]', collect($fichaUnidades)->pluck('unidad_Id')))->contains($unidad->id) ? 'selected' : '' }}
                                        value={{ $unidad->id }}> {{ $unidad->sigla }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="col-md-4" style="float: left;">
                            <button type="submit" class="btn btn-success btn-block">Guardar</button>
                        </div>
                        <div class="col-md-4" style="float: right;">
                            <a href="{{ route('fichaImpersonal.index') }}"
                                class="btn btn-block btn-outline-primary">Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            @include('fichasImpersonales.parciales.multimedia')
        </div>

        <div class="card card-primary">
            <div class="card-body">

                <div class="row">
                    <table class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th>Relacion</th>
                                <th>Agregar Nueva</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label for="fichaPer">Fichas Personales</label>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 10px; margin-left:10px"
                                        class="btn btn-xs btn-info" id="mostrarFichaPer">Monstrar Panel</i></button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                </td>
                                <td>
                                <button style="float: rigth; padding: 15px 18px; margin-left:10px" class="btn btn-xs btn-warning"
                                    id="cerrarTodos">Cerrar todos</i></button>
                                </td>
                            <tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row" id=fichaPer style="display: none;">
                    @include('fichasImpersonales.parciales.fichasPerRel')
                </div>

            </div>
        </div>


    </section>
@stop


@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/adminLTE/css/adminlte.min.css">
@endpush
@push('scripts')
    <!-- Select2 -->
    <script src="/adminLTE/plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="/adminLTE/plugins/moment/moment.min.js"></script>
    <script src="/adminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });


        });


        $(document).ready(function() {
            $('#mostrarFichaPer').click(function() {
                $('#fichaPer').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#fichaPer').hide();
            });
        });

        $(document).ready(function(){
            $('#cerrarTodos').click(function(){
                
                $('#fichaPer').hide();

            })
        })
    </script>
@endpush
