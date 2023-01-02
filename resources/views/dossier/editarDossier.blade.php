@extends('layout')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <h4> Dossier
                <small>• Editar</small>
            </h4>

        </ol>

    </nav>

@stop


@section('content')
    <section class="content">
        <form method="POST" action="{{ route('dossier.update', $dossier->id) }}">
            {{ csrf_field() }} {{ method_field('PUT') }}
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Editar Dossier</h5>

                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6" style="display: inline-block;">

                                <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }} ">
                                    <label for="titulo">Título</label>
                                    <input name="titulo" type="imput" class="form-control" id="titulo"
                                        placeholder="..." value="{{ old('titulo', $dossier->titulo) }}">
                                    <!--- Muestro los errores de validacion.-->
                                    {!! $errors->first('titulo', '<span class=error style=color:red>:message</span>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('letra') ? 'has-error' : '' }} ">
                                    <label for="letra">Letra</label>
                                    <input name="letra" type="imput" class="form-control" id="letra"
                                        placeholder="..." value="{{ old('letra', $dossier->letra) }}">
                                    <!--- Muestro los errores de validacion.-->
                                    {!! $errors->first('letra', '<span class=error style=color:red>:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <label>Fecha de Inicio</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input name="fechaInicio" type="text" class="form-control datetimepicker-input"
                                            data-target="#reservationdate"
                                            value="{{ old('fechaInicio', $dossier->fechaInicio) }}" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Fecha Fin</label>
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <input name="fechaFin" type="text" class="form-control datetimepicker-input"
                                            data-target="#reservationdate2"
                                            value="{{ old('fechaFin', $dossier->fechaFin) }}" />
                                        <div class="input-group-append" data-target="#reservationdate2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6" style="display: inline-block;">
                                <div class="form-group {{ $errors->has('clasificacion_id') ? 'has-error' : '' }} ">
                                    <label for="clasificacion_id">Clasificación</label>
                                    <select name="clasificacion_id" class="form-control select2" style="width: 100%;"
                                        id="clasificacion_id">
                                        <option value=""> Seleccione una Clasificación
                                        </option>
                                        @foreach ($clasificaciones as $clasificacion)
                                            <option value="{{ $clasificacion->id }}"
                                                {{ old('clasificacion_id', $dossier->clasificacions_id) == $clasificacion->id ? 'selected' : '' }}>
                                                {{ $clasificacion->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group {{ $errors->has('ubicacion_id') ? 'has-error' : '' }} ">
                                    <label for="ubicacion_id">Ubicacion</label>
                                    <select name="ubicacion_id" class="form-control select2" style="width: 100%;"
                                        id="ubicacion_id">
                                        <option value=""> Seleccione una Ubicacion
                                        </option>
                                        @foreach ($ubicaciones as $ubicacion)
                                            <option value="{{ $ubicacion->id }}"
                                                {{ old('ubicacion_id', $dossier->ubicacion_id) == $ubicacion->id ? 'selected' : '' }}>
                                                {{ $ubicacion->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group {{ $errors->has('serie_documental_id') ? 'has-error' : '' }} ">
                                    <label for="serie_documental_id">Serie Documental</label>
                                    <select name="serie_documental_id" class="form-control select2" style="width: 100%;"
                                        id="serie_documental_id">
                                        <option value=""> Seleccione una Serie Documental
                                        </option>
                                        @foreach ($serieDocumental as $serie)
                                            <option value="{{ $serie->id }}"
                                                {{ old('serie_documental_id', $dossier->serie_documental_id) == $serie->id ? 'selected' : '' }}>

                                                {{ $serie->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="temas">Temas</label>
                                    <select name="temas[]" class="select2" multiple="multiple"
                                        data-placeholder="Seleccione Uno o mas temas" style="width: 100%;">
                                        @foreach ($temas as $tema)
                                            <option
                                                {{ collect(old('temas[]', collect($dossierTemas)->pluck('tema_Id')))->contains($tema->id) ? 'selected' : '' }}
                                                value={{ $tema->id }}> {{ $tema->nombre }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" style="display: inline-block;">
                                <label for="resumen">Resumen</label>
                                <textarea name="resumen" class="form-control" rows="5" id="resumen" value="">{{ old('resumen', $dossier->resumen) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-4" style="float: left;">
                            <button type="submit" class="btn btn-success btn-block">Guardar</button>
                        </div>
                        <div class="col-md-4" style="float: right;">
                            <a href="{{ route('dossier.index') }}" class="btn btn-block btn-outline-primary">Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            @include('dossier.parciales.multimedia')
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
                            <tr>
                                <td>
                                    <label for="fichaImper">Fichas Impersonales</label>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 10px; margin-left:10px"
                                        class="btn btn-xs btn-info" id="mostrarFichaImper">Monstrar Panel</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="Observaciones">Observaciones</label>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 10px; margin-left:10px"
                                        class="btn btn-xs btn-info" id="mostrarObservaciones">Monstrar Panel</i></button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 15px 18px; margin-left:10px"
                                        class="btn btn-xs btn-warning" id="cerrarTodos">Cerrar todos</i></button>
                                    <button style="float: rigth; padding: 15px 18px; margin-left:10px"
                                        class="btn btn-xs btn-warning" id="mostrarTodos">Mostrar todos</i></button>
                                </td>
                            <tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row" id=fichaPer style="display: none;">
                    @include('dossier.parciales.fichasPerRel')
                </div>
                <div class="row" id=fichaImper style="display: none;">
                    @include('dossier.parciales.fichasImperRel')
                </div>
                <div class="row" id=Observaciones style="display: none;">
                    @include('dossier.parciales.dossierObservaciones')
                </div>

            </div>
        </div>


    </section>
@stop


@push('styles')
    <link rel="stylesheet" href="adminLTE/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- estilos para las tablas -->
    <link rel="stylesheet" href="/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!--FIN CSS PARA LAS TABLAS -->

    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="/adminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
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

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'DD/MM/YYYY'
            });
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

            //Date picker
            $('#reservationdate2').datetimepicker({
                format: 'DD/MM/YYYY'
            });
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })
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

        $(document).ready(function() {
            $('#mostrarFichaImper').click(function() {
                $('#fichaImper').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#fichaImper').hide();
            });
        });

        $(document).ready(function() {
            $('#mostrarObservaciones').click(function() {
                $('#Observaciones').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#Observaciones').hide();
            });
        });

        $(document).ready(function() {
            $('#cerrarTodos').click(function() {
                $('#fichaPer').hide();
                $('#fichaImper').hide();
                $('#Observaciones').hide();

            })
        });
        $(document).ready(function() {
            $('#mostrarTodos').click(function() {
                $('#fichaPer').slideToggle("fast");
                $('#fichaImper').slideToggle("fast");
                $('#Observaciones').slideToggle("fast");
            })
        });
    </script>
@endpush
