@extends('layout')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <div class="col-md-6">
                <h4> Dossier
                    @switch($fichaTitular->tipo)
                        @case('fichaPersonal')
                            <small>• Relacionar Con: {{ $fichaTitular->primerNombre }}
                                {{ $fichaTitular->primerApellido }}</small>
                        @break

                        @case('fichaImpersonal')
                            <small>• Relacionar Con: {{ $fichaTitular->nombre }}</small>
                        @break

                        @case('dossier')
                            <small>• Relacionar Con: {{ $fichaTitular->titulo }}</small>
                        @break

                    </h4>
                @endswitch
            </div>
            <div class="col-md-6" style="float: left;">
                @switch($fichaTitular->tipo)
                    @case('fichaPersonal')
                        <a style="float: right;"href="{{ route('fichasPersonales.editarFicha', $fichaTitular->id) }}"
                            class="btn btn-block btn-outline-primary">Atrás</a>
                    @break

                    @case('fichaImpersonal')
                        <a style="float: right;"href="{{ route('fichasImpersonales.editarFicha', $fichaTitular->id) }}"
                            class="btn btn-block btn-outline-primary">Atrás</a>
                    @break

                    @case('dossier')
                        <a style="float: right;"href="{{ route('dossier.editarDossier', $fichaTitular->id) }}"
                            class="btn btn-block btn-outline-primary">Atrás</a>
                    @break
                @endswitch
            </div>
        </ol>
    </nav>
@stop

@section('content')
    <section class="content">
        <div class="card" id="parientes" style="display: none;">
            <form method="POST" action="{{ route('dossier.store') }}">
                {{ csrf_field() }}
                <div class="card-dialog card-lg" role="document">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">

                                <div class="row">

                                    <div class="col-md-6" style="display: inline-block;">

                                        <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }} ">
                                            <label for="titulo">Título</label>
                                            <input name="titulo" type="imput" class="form-control" id="titulo"
                                                placeholder="..." value="{{ old('titulo') }}">
                                            <!--- Muestro los errores de validacion.-->
                                            {!! $errors->first('titulo', '<span class=error style=color:red>:message</span>') !!}
                                        </div>
                                        <div class="form-group {{ $errors->has('letra') ? 'has-error' : '' }} ">
                                            <label for="letra">Letra</label>
                                            <input name="letra" type="imput" class="form-control" id="letra"
                                                placeholder="..." value="{{ old('letra') }}">
                                            <!--- Muestro los errores de validacion.-->
                                            {!! $errors->first('letra', '<span class=error style=color:red>:message</span>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha de Inicio</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input name="fechaInicio" type="text"
                                                    class="form-control datetimepicker-input" data-target="#reservationdate"
                                                    value="{{ old('fechaInicio') }}" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha Fin</label>
                                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                                <input name="fechaFin" type="text"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#reservationdate2" value="{{ old('fechaFin') }}" />
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
                                            <select name="clasificacion_id" class="form-control select2"
                                                style="width: 100%;" id="clasificacion_id">
                                                <option value=""> Seleccione una Clasificación
                                                </option>
                                                @foreach ($clasificaciones as $clasificacion)
                                                    <option value="{{ $clasificacion->id }}">
                                                        {{ $clasificacion->nombre }}
                                                    </option>
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
                                                    <option value="{{ $ubicacion->id }}">
                                                        {{ $ubicacion->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div
                                            class="form-group {{ $errors->has('serie_documental_id') ? 'has-error' : '' }} ">
                                            <label for="serie_documental_id">Serie Documental</label>
                                            <select name="serie_documental_id" class="form-control select2"
                                                style="width: 100%;" id="serie_documental_id">
                                                <option value=""> Seleccione una Serie Documental
                                                </option>
                                                @foreach ($serieDocumental as $serie)
                                                    <option value="{{ $serie->id }}">
                                                        {{ $serie->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="display: inline-block;">
                                        <label for="resumen">Resumen</label>
                                        <textarea name="resumen" class="form-control" rows="5" id="resumen" value="{{ old('resumen') }}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-default" id="cerrarForm">Cerrar</button>
                                <button class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                    </div>
            </form>

        </div>
        <div class="col-12" id="parientes">
            <div class="card" style="background-color: #E6EFF6;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Dossier</h3>
                        </div>
                    </div>

                    <div class="row">

                        <table id="parientesTable" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Letra</th>
                                   
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($dossierRel as $dossier)
                                    <tr>
                                        <form method="POST"
                                            href="/dossierRelacionada/{{ $fichaTitular->id }}/{{ $fichaTitular->tipo }}"
                                            style="display: inline"> {{ csrf_field() }}
                                            <td>
                                                <button class="btn btn-md btn-success"><i
                                                        class="fa fa-light fa-plus"></i></button>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input name="ficha_Id" type="imput" class="form-control"
                                                        id="ficha_Id" value="{{ $dossier->id }}"readonly>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $dossier->titulo }}</td>
                                            <td>{{ $dossier->letra }}</td>

                                        </form>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="nuevaPersona">¿No encuentra el dossier deseado?</label>
                            <button style="float: rigth; padding: 10px; margin-left:10px" class="btn btn-xs btn-info"
                                id="mostrarNuevaFicha">Agregar Nueva</i></button>
                        </div>
                    </div>
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
    <!--ESTILOS PARA CALENDARIO daterange picker -->
    <link rel="stylesheet" href="/adminLTE/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">


    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="/adminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminLTE/css/adminlte.min.css">
@endpush
@push('scripts')
    <!-- date-range-picker -->
    <script src="/adminLTE/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Select2 -->
    <script src="/adminLTE/plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="/adminLTE/plugins/moment/moment.min.js"></script>
    <script src="/adminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>


    <!-- INICIO DataTables  & Plugins -->
    <script src="/adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/adminLTE/plugins/jszip/jszip.min.js"></script>
    <script src="/adminLTE/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/adminLTE/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- FIN DataTables  & Plugins -->
    <!-- INICIO TODO ESTO PARA CALENDARIO -->



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
            });
        });

        $(function() {
            $("#parientesTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                buttons: [{
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]

            }).buttons().container().appendTo('#example1_wrapper .col-sm-6:eq(0)');
        });

        $(document).ready(function() {
            $('#mostrarNuevaFicha').click(function() {
                $('#parientes').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#parientes').hide();
            });
        });
    </script>
@endpush
