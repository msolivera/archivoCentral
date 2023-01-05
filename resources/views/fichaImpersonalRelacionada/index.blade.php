@extends('layout')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <div class="col-md-6">
                <h4> Fichas Impersonales
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
                @endswitch
            </div>

        </ol>

    </nav>

@stop

@section('content')
    <section class="content">
        <div class="card" id="parientes" style="display: none;">
            <form method="POST" action="{{ route('fichaImpersonal.store') }}">
                {{ csrf_field() }}
                <div class="card-dialog card-lg" role="document">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} ">
                                    <label for="nombre">Título</label>
                                    <input name="nombre" type="imput" class="form-control" id="nombre"
                                        placeholder="..." value="{{ old('nombre') }}">
                                    <!--- Muestro los errores de validacion.-->
                                    {!! $errors->first('nombre', '<span class=error style=color:red>:message</span>') !!}
                                </div>

                                <div class="form-group {{ $errors->has('clasificacion_id') ? 'has-error' : '' }} ">
                                    <label for="clasificacion_id">Clasificación</label>
                                    <select name="clasificacion_id" class="form-control select2" style="width: 100%;"
                                        id="clasificacion_id">
                                        <option value=""> Seleccione una Clasificación
                                        </option>
                                        @foreach ($clasificaciones as $clasificacion)
                                            <option value="{{ $clasificacion->id }}">
                                                {{ $clasificacion->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
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
                            <h3 class="card-title">Fichas Personales</h3>
                        </div>
                    </div>

                    <div class="row">

                        <table id="parientesTable" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Clasificacion</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($fichasImperRel as $fichasImper)
                                    <tr>
                                        <form method="POST"
                                            href="/fichaImpersonalRelacionada/{{ $fichaTitular->id }}/{{ $fichaTitular->tipo }}"
                                            style="display: inline"> {{ csrf_field() }}
                                            <td>
                                                <button class="btn btn-md btn-success"><i
                                                        class="fa fa-light fa-plus"></i></button>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input name="ficha_Id" type="imput" class="form-control"
                                                        id="ficha_Id" value="{{ $fichasImper->id }}"readonly>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $fichasImper->nombre }}</td>
                                            <td>{{ $fichasImper->clasificacionNombre }}</td>

                                        </form>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="nuevaPersona">¿No encuentra la ficha deseada?</label>
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
