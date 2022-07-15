@extends('layout')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <div class="col-md-6">
                <h4> Fichas Personales
                    <small>• Agregar Parientes a {{ $fichaPerTitular->primerNombre }}
                        {{ $fichaPerTitular->primerApellido }}</small>
                </h4>
            </div>
            <div class="col-md-6" style="float: left;">
                <a style="float: right;"href="{{ route('fichasPersonales.editarFicha', $fichaPerTitular->id) }}"
                    class="btn btn-block btn-outline-primary">Atrás</a>
            </div>

        </ol>

    </nav>

@stop

@section('content')
    <section class="content">
        <div class="col-12" id="parientes">
            <div class="card" style="background-color: #E6EFF6;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">Parientes</h3>
                        </div>
                    </div>


                    <table id="parientesTable" class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th>Acciones</th>
                                <th>Parentesco</th>
                                <th>Cedula</th>
                                <th>ID</th>
                                <th>Primer Nombre</th>
                                <th>Segundo Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form method="POST">
                                {{ csrf_field() }}
                                @foreach ($fichasParientePer as $fichaPerPariente)
                                    <tr>
                                        <td>
                                            <a href="#" class="btn btn-md btn-success"><i
                                                    class="fa fa-light fa-plus"></i></a>
                                        </td>
                                        <td><select name="parentesco_id" class="form-control select2" style="width: 100%;">
                                                <option value=""> Seleccione </option>
                                                @foreach ($parentescos as $parentesco)
                                                    <option value="{{ $parentesco->id }}">
                                                        {{ $parentesco->nombre }}</option>
                                                @endforeach

                                            </select></td>
                                        <td>{{ $fichaPerPariente->cedula }}</td>
                                        <td>{{ $fichaPerPariente->id }}</td>
                                        <td>{{ $fichaPerPariente->primerNombre }}</td>
                                        <td>{{ $fichaPerPariente->segundoNombre }}</td>
                                        <td>{{ $fichaPerPariente->primerApellido }}</td>
                                        <td>{{ $fichaPerPariente->segundoApellido }}</td>


                                    </tr>
                                @endforeach
                            </form>
                        </tbody>

                    </table>

                    <div class="row">
                        <div class="form-group">
                            <label for="nuevaPersona">¿No encuentra a la persona deseada?</label>
                            <button style="float: rigth; padding: 10px; margin-left:10px" class="btn btn-xs btn-info"
                                data-toggle="modal" data-target="#modalPersonaNueva">Agregar Nueva</i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <div class="modal fade" id="modalPersonaNueva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form method="POST" action="{{ route('fichasIngresos.storeIngreso') }}">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6" style="display: inline-block;">
                                <div class="form-group {{ $errors->has('numeroPaquete') ? 'has-error' : '' }} "
                                    style="display:none">
                                    <label for="numeroPaquete">Nro. Paquete de Ingreso</label>
                                    <input name="numeroPaquete" type="imput" class="form-control" id="numeroPaquete"
                                        placeholder="..." value="{{ old('numeroPaquete') }}">
                                    <!--- Muestro los errores de validacion.-->
                                    {!! $errors->first('numeroPaquete', '<span class=error style=color:red>:message</span>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('primerNombre') ? 'has-error' : '' }} ">
                                    <label for="nombre">Primer Nombre</label>
                                    <input name="primerNombre" type="imput" class="form-control" id="nombre"
                                        placeholder="..." value="{{ old('primerNombre') }}">
                                    <!--- Muestro los errores de validacion.-->
                                    {!! $errors->first('primerNombre', '<span class=error style=color:red>:message</span>') !!}
                                </div>

                                <div class="form-group {{ $errors->has('primerApellido') ? 'has-error' : '' }}">
                                    <label for="apellido">Primer apellido</label>
                                    <input name="primerApellido" type="imput" class="form-control" id="apellido"
                                        placeholder="..." value="{{ old('primerApellido') }}">
                                    {!! $errors->first('primerApellido', '<span class=error style=color:red>:message</span>') !!}
                                </div>

                                <div class="form-group" {{ $errors->has('cedula') ? 'has-error' : '' }}">
                                    <label for="cedula">Cedula</label>
                                    <input name="cedula" type="imput" class="form-control" id="cedula"
                                        placeholder="..." value="{{ old('cedula') }}">
                                    {!! $errors->first('cedula', '<span class=error style=color:red>:message</span>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="otroDocNombre">Otro Documento</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="otroDocNombre" class="form-control select2" style="width: 100%;"
                                                id="otroDocNombre">
                                                <option value=""> Seleccione un Documento</option>
                                                <option value="dni">DNI</option>
                                                <option value="libretaEmbarque">Libreta de Embarque</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" style="display: inline-block; float: right;">
                                            <input name="otroDocNumero" type="imput" class="form-control"
                                                id="otroDocNumero" placeholder="..."
                                                value="{{ old('otroDocNumero') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pais">Pais</label>
                                    <select name="pais_id" class="form-control select2" style="width: 100%;"
                                        id="pais_id">
                                        <option value=""> Seleccione un Pais</option>
                                        @foreach ($paises as $pais)
                                            <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="departamento_id">Departamento</label>
                                    <select name="departamento_id" class="form-control select2" id="departamento_id">
                                        <option value=""> Seleccione un Departamento</option>
                                        @foreach ($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group {{ $errors->has('correoElectronico') ? 'has-error' : '' }} ">
                                    <label for="correoElectronico">Correo Electrónico</label>
                                    <input name="correoElectronico" type="imput" class="form-control"
                                        id="correoElectronico" placeholder="..."
                                        value="{{ old('correoElectronico') }}">
                                    <!--- Muestro los errores de validacion.-->
                                    {!! $errors->first('correoElectronico', '<span class=error style=color:red>:message</span>') !!}
                                </div>

                                <div class="form-group" style='margin-bottom: 7px;'>
                                    <label for="sexo">Sexo</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="sexo1" name="sexo"
                                            value="Hombre">
                                        <label for="sexo1" class="custom-control-label">Hombre</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="sexo2" name="sexo"
                                            value="Mujer">
                                        <label for="sexo2" class="custom-control-label">Mujer</label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Fecha de Defuncion</label>
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <input name="fechaDef" type="text" class="form-control datetimepicker-input"
                                            data-target="#reservationdate2" value="{{ old('fechaDef') }}" />
                                        <div class="input-group-append" data-target="#reservationdate2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="display:none">
                                    <label for="estadoIngreso">Estado de Ingreso</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="estado0"
                                            name="estadoIngreso" value="No Aplica">
                                        <label for="estado0" class="custom-control-label">No Aplica</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="estado1"
                                            name="estadoIngreso" value="Primera Vez">
                                        <label for="estado1" class="custom-control-label">Primera Vez</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="estado2"
                                            name="estadoIngreso" value="Reingreso">
                                        <label for="estado2" class="custom-control-label">Reingreso</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="estado3"
                                            name="estadoIngreso" value="Sol. Anteriores">
                                        <label for="estado3" class="custom-control-label">Sol. Anteriores</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6" style="display: inline-block; float: right;">
                                <div
                                    class="form-group {{ $errors->has('clasificacion_id') ? 'has-error' : '' }} "style="display:none">
                                    <label for="clasificacion_id">Clasificación</label>
                                    <select name="clasificacion_id" class="form-control select2" style="width: 100%;"
                                        id="clasificacion_id">
                                        <option value=""> Seleccione una Clasificación</option>
                                        @foreach ($clasificaciones as $clasificacion)
                                            <option value="{{ $clasificacion->id }}">{{ $clasificacion->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group {{ $errors->has('segundoNombre') ? 'has-error' : '' }} ">
                                    <label for="nombre">Segundo Nombre</label>
                                    <input name="segundoNombre" type="imput" class="form-control" id="nombre"
                                        placeholder="..." value="{{ old('segundoNombre') }}">
                                    <!--- Muestro los errores de validacion.-->
                                    {!! $errors->first('segundoNombre', '<span class=error style=color:red>:message</span>') !!}
                                </div>

                                <div class="form-group {{ $errors->has('segundoApellido') ? 'has-error' : '' }}">
                                    <label for="apellido">Segundo apellido</label>
                                    <input name="segundoApellido" type="imput" class="form-control" id="apellido"
                                        placeholder="..." value="{{ old('segundoApellido') }}">
                                    {!! $errors->first('segundoApellido', '<span class=error style=color:red>:message</span>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="credencial">Credencial Cívica</label>
                                    <input name="credencial" type="imput" class="form-control" id="credencial"
                                        placeholder="..." value="{{ old('credencial') }}">
                                </div>

                                <div class="form-group">
                                    <label>Fecha de Nacimiento</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input name="fechaNac" type="text" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" value="{{ old('fechaNac') }}" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ciudad">Ciudad - Barrio</label>
                                    <select name="ciudad_id" class="form-control select2" style="width: 100%;"
                                        id="ciudad_id">
                                        <option value=""> Seleccione una Ciudad - Barrio</option>
                                        @foreach ($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="estadoCivil_id">Estado Civil</label>
                                    <select name="estadoCivil_id" class="form-control select2" style="width: 100%;"
                                        id="estadoCivil_id">
                                        <option value=""> Seleccione un Estado Civil</option>
                                        @foreach ($estadosCiviles as $estadoCivil)
                                            <option value="{{ $estadoCivil->id }}">{{ $estadoCivil->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group {{ $errors->has('seccional') ? 'has-error' : '' }} ">
                                    <label for="seccionalPolicial">Seccional Policial</label>
                                    <input name="seccionalPolicial" type="imput" class="form-control"
                                        id="seccionalPolicial" placeholder="..."
                                        value="{{ old('seccionalPolicial') }}">
                                    <!--- Muestro los errores de validacion.-->
                                    {!! $errors->first('seccionalPolicial', '<span class=error style=color:red>:message</span>') !!}
                                </div>

                                <div class="form-group">
                                    <label for="situacion_id">Situación</label>
                                    <select name="situacion_id" class="form-control select2" style="width: 100%;"
                                        id="situacion_id">
                                        <option value=""> Seleccione un Situación</option>
                                        @foreach ($situaciones as $situacion)
                                            <option value="{{ $situacion->id }}">{{ $situacion->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="fuerza_id">Fuerza</label>
                                            <select name="fuerza_id" class="form-control select2" style="width: 100%;"
                                                id="fuerza_id">
                                                <option value=""> Seleccione </option>
                                                @foreach ($fuerzas as $fuerza)
                                                    <option value="{{ $fuerza->id }}">{{ $fuerza->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6" style="display: inline-block; float: right;">
                                            <label for="grado_id">Grado</label>
                                            <select name="grado_id" class="form-control select2" style="width: 100%;"
                                                id="grado_id">
                                                <option value=""> Seleccione </option>
                                                @foreach ($grados as $grado)
                                                    <option value="{{ $grado->id }}">{{ $grado->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cuerpo_id">Cuerpo/Arma</label>
                                    <select name="cuerpo_id" class="form-control select2" style="width: 100%;"
                                        id="cuerpo_id">
                                        <option value=""> Seleccione Cuerpo/Arma</option>
                                        @foreach ($cuerpos as $cuerpo)
                                            <option value="{{ $cuerpo->id }}">{{ $cuerpo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
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
    </script>
@endpush
