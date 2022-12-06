@extends('layout')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

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
                            <div class="row">
                                <div class="col-8">
                                    <h3 class="card-title">Dossier • Ver</h3>
                                </div>
                                <div class="col-4">
                                    <button style="float: right;" class="btn btn-block btn-outline-primary col-6"
                                        id="mostrarNuevoDossier">Nuevo Dossier</button>
                                </div>
                            </div>
                        </div>         
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card" id="dossier" style="display: none;">
                                    <form method="POST" action="{{ route('dossier.store') }}">
                                        {{ csrf_field() }}
                                        <div class="card-dialog card-lg" role="document">
                                            <div class="card-content">

                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-md-6" style="display: inline-block;">
                                                            
                                                            <div
                                                                class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }} ">
                                                                <label for="titulo">Título</label>
                                                                <input name="titulo" type="imput" class="form-control"
                                                                    id="titulo" placeholder="..."
                                                                    value="{{ old('titulo') }}">
                                                                <!--- Muestro los errores de validacion.-->
                                                                {!! $errors->first('titulo', '<span class=error style=color:red>:message</span>') !!}
                                                            </div>

                                                            <div
                                                                class="form-group {{ $errors->has('clasificacion_id') ? 'has-error' : '' }} ">
                                                                <label for="clasificacion_id">Clasificación</label>
                                                                <select name="clasificacion_id" class="form-control select2"
                                                                    style="width: 100%;" id="clasificacion_id">
                                                                    <option value=""> Seleccione una Clasificación
                                                                    </option>
                                                                    {{-- @foreach ($clasificaciones as $clasificacion)
                                                                        <option value="{{ $clasificacion->id }}">
                                                                            {{ $clasificacion->nombre }}
                                                                        </option>
                                                                    @endforeach --}}
                                                                </select>
                                                            </div>
                                                            <div
                                                            class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }} ">
                                                            <label for="titulo">Letra</label>
                                                            <input name="titulo" type="imput" class="form-control"
                                                                id="titulo" placeholder="..."
                                                                value="{{ old('titulo') }}">
                                                            <!--- Muestro los errores de validacion.-->
                                                            {!! $errors->first('titulo', '<span class=error style=color:red>:message</span>') !!}
                                                        </div>
                                                        <div
                                                                class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }} ">
                                                                <label for="titulo">Fecha Inicio</label>
                                                                <input name="titulo" type="imput" class="form-control"
                                                                    id="titulo" placeholder="..."
                                                                    value="{{ old('titulo') }}">
                                                                <!--- Muestro los errores de validacion.-->
                                                                {!! $errors->first('titulo', '<span class=error style=color:red>:message</span>') !!}
                                                            </div>
                                                            <div
                                                                class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }} ">
                                                                <label for="titulo">Fecha Fin</label>
                                                                <input name="titulo" type="imput" class="form-control"
                                                                    id="titulo" placeholder="..."
                                                                    value="{{ old('titulo') }}">
                                                                <!--- Muestro los errores de validacion.-->
                                                                {!! $errors->first('titulo', '<span class=error style=color:red>:message</span>') !!}
                                                            </div>                                                    
                                                        </div>
                                                        <div class="col-md-6" style="display: inline-block;"></div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="col-md-6" style="float: left;">
                                                            <button type="submit"
                                                                class="btn btn-success btn-block">Crear</button>
                                                        </div>
                                                        <div class="col-md-6" style="float: right;">
                                                            <button type="button" id="cerrarForm"
                                                                class="btn btn-block btn-outline-primary">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Acciones</th>
                                            <th>Título</th>
                                            <th>Letra</th>
                                            <th>Ubicacion</th>
                                            <th>Serie Doc</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Clasificación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($fichasImper as $fichaImper)
                                            <tr>
                                                <td>
                                                    <a href="fichaImpersonal/{{$fichaImper->id}}"
                                                        class="btn btn-xs btn-success"><i
                                                            class="fa fa-light fa-eye"></i></a>
                                                    <a href="fichaImpersonal/edit/{{ $fichaImper->id }}"
                                                        class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>
                                                    <form method="POST"
                                                        action="{{ route('fichaImpersonal.destroy', $fichaImper->id) }}"
                                                        style="display: inline"> {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-xs btn-danger"
                                                            onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                                                class="fa fa-light fa-trash"></i></button>
                                                    </form>
                                                </td>
                                                <td>{{ $fichaImper->nombre }}</td>
                                                <td>{{ $fichaImper->clasificacion->nombre }}</td>
                                                
                                            </tr>
                                        @endforeach --}}

                                    </tbody>
                                </table>
                            </div>
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

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2({
                tags: true
            })
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
        $(function() {
            $("#example1").DataTable({
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
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(document).ready(function() {
            $('#mostrarNuevoDossier').click(function() {
                $('#dossier').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#dossier').hide();
            });
        });
    </script>
@endpush
