@extends('layout')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <h4> Fichas Personales
                <small>• Editar</small>
            </h4>
        </ol>

    </nav>

@stop

@section('content')
    <section class="content">
        <form method="POST" action="{{ route('fichasPersonales.update', $fichaPer) }}">
            {{ csrf_field() }} {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h5 class="card-title">Editar Ficha</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('numeroPaquete') ? 'has-error' : '' }} ">
                                        <label for="numeroPaquete">Nro. Paquete de Ingreso</label>
                                        <input name="numeroPaquete" type="imput" class="form-control" id="numeroPaquete"
                                            placeholder="..." value="{{ old('numeroPaquete', $fichaPer->numeroPaquete) }}">
                                        <!--- Muestro los errores de validacion.-->
                                        {!! $errors->first('numeroPaquete', '<span class=error style=color:red>:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="clasificacion_id">Clasificación</label>
                                        <select name="clasificacion_id" class="form-control select2" style="width: 100%;"
                                            id="clasificacion_id">
                                            <option value=""> Seleccione una Clasificación</option>
                                            @foreach ($clasificaciones as $clasificacion)
                                                <option value="{{ $clasificacion->id }}"
                                                    {{ old('clasificacion_id', $fichaPer->clasificacion_id) == $clasificacion->id ? 'selected' : '' }}>
                                                    {{ $clasificacion->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="display: inline-block;">
                                    <div class="form-group {{ $errors->has('primerNombre') ? 'has-error' : '' }} ">
                                        <label for="nombre">Primer Nombre</label>
                                        <input name="primerNombre" type="imput" class="form-control" id="nombre"
                                            placeholder="..." value="{{ old('primerNombre', $fichaPer->primerNombre) }}">
                                        <!--- Muestro los errores de validacion.-->
                                        {!! $errors->first('primerNombre', '<span class=error style=color:red>:message</span>') !!}
                                    </div>

                                    <div class="form-group {{ $errors->has('primerApellido') ? 'has-error' : '' }}">
                                        <label for="apellido">Primer apellido</label>
                                        <input name="primerApellido" type="imput" class="form-control" id="apellido"
                                            placeholder="..."
                                            value="{{ old('primerApellido', $fichaPer->primerApellido) }}">
                                        {!! $errors->first('primerApellido', '<span class=error style=color:red>:message</span>') !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="cedula">Cedula</label>
                                        <input name="cedula" type="imput" class="form-control" id="cedula"
                                            placeholder="..." value="{{ old('cedula', $fichaPer->cedula) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="otroDocNombre">Otro Documento</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="otroDocNombre" class="form-control select2"
                                                    style="width: 100%;" id="otroDocNombre">
                                                    <option value=""> Seleccione un Documento</option>
                                                    <option value="dni"
                                                        {{ 'dni' == $fichaPer->otroDocNombre ? 'selected=true' : '' }}>
                                                        DNI</option>
                                                    <option value="libretaEmbarque"
                                                        {{ 'libretaEmbarque' == $fichaPer->otroDocNombre ? 'selected=true' : '' }}>
                                                        Libreta de Embarque</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6" style="display: inline-block; float: right;">
                                                <input name="otroDocNumero" type="imput" class="form-control"
                                                    id="otroDocNumero" placeholder="..."
                                                    value="{{ old('otroDocNumero', $fichaPer->otroDocNumero) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pais">Pais</label>
                                        <select name="pais_id" class="form-control select2" style="width: 100%;"
                                            id="pais_id">
                                            <option value=""> Seleccione un Pais</option>
                                            @foreach ($paises as $pais)
                                                <option value="{{ $pais->id }}"
                                                    {{ old('pais_id', $fichaPer->pais_id) == $pais->id ? 'selected' : '' }}>
                                                    {{ $pais->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="departamento">Departamento</label>
                                        <select name="departamento_id" class="form-control select2" id="departamento">
                                            <option value=""> Seleccione un Departamento</option>
                                            @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->id }}"
                                                    {{ old('departamento_id', $fichaPer->departamento_id) == $departamento->id ? 'selected' : '' }}>
                                                    {{ $departamento->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group {{ $errors->has('correoElectronico') ? 'has-error' : '' }} ">
                                        <label for="correoElectronico">Correo Electrónico</label>
                                        <input name="correoElectronico" type="imput" class="form-control"
                                            id="correoElectronico" placeholder="..."
                                            value="{{ old('correoElectronico', $fichaPer->correoElectronico) }}">
                                        <!--- Muestro los errores de validacion.-->
                                        {!! $errors->first('correoElectronico', '<span class=error style=color:red>:message</span>') !!}
                                    </div>
                                    <div class="form-group" style='margin-bottom: 35px;'>
                                        <label for="sexo">Sexo</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="sexo1"
                                                name="sexo" value="Hombre"
                                                {{ $fichaPer->sexo == 'Hombre' ? 'checked=true' : '' }}>
                                            <label for="sexo1" class="custom-control-label">Hombre</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="sexo2"
                                                name="sexo" value="Mujer"
                                                {{ $fichaPer->sexo == 'Mujer' ? 'checked=true' : '' }}>
                                            <label for="sexo2" class="custom-control-label">Mujer</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="estadoIngreso">Estado de Ingreso</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="estado0"
                                                name="estadoIngreso" value="No Aplica"
                                                {{ 'No Aplica' == $fichaPer->estadoIngreso ? 'checked=true' : '' }}>
                                            <label for="estado0" class="custom-control-label">No Aplica</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="estado1"
                                                name="estadoIngreso" value="Primera Vez"
                                                {{ 'Primera Vez' == $fichaPer->estadoIngreso ? 'checked=true' : '' }}>
                                            <label for="estado1" class="custom-control-label">Primera Vez</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="estado2"
                                                name="estadoIngreso" value="Reingreso"
                                                {{ 'Reingreso' == $fichaPer->estadoIngreso ? 'checked=true' : '' }}>
                                            <label for="estado2" class="custom-control-label">Reingreso</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="estado3"
                                                name="estadoIngreso" value="Sol. Anteriores"
                                                {{ 'Sol. Anteriores' == $fichaPer->estadoIngreso ? 'checked=true' : '' }}>
                                            <label for="estado3" class="custom-control-label">Sol. Anteriores</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="fuerza_id">Fuerza</label>
                                                <select name="fuerza_id" class="form-control select2"
                                                    style="width: 100%;" id="fuerza_id">
                                                    <option value=""> Seleccione una Fuerza</option>
                                                    @foreach ($fuerzas as $fuerza)
                                                        <option value="{{ $fuerza->id }}"
                                                            {{ old('fuerza_id', $fichaPer->fuerza_id) == $fuerza->id ? 'selected' : '' }}>
                                                            {{ $fuerza->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6" style="display: inline-block; float: right;">
                                                <label for="grado_id">Grado</label>
                                                <select name="grado_id" class="form-control select2" style="width: 100%;"
                                                    id="grado_id">
                                                    <option value=""> Seleccione un Grado</option>
                                                    @foreach ($grados as $grado)
                                                        <option value="{{ $grado->id }}"
                                                            {{ old('grado_id', $fichaPer->grado_id) == $grado->id ? 'selected' : '' }}>
                                                            {{ $grado->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="display: inline-block; float: right;">
                                    <div class="form-group {{ $errors->has('segundoNombre') ? 'has-error' : '' }} ">
                                        <label for="nombre">Segundo Nombre</label>
                                        <input name="segundoNombre" type="imput" class="form-control" id="nombre"
                                            placeholder="..."
                                            value="{{ old('segundoNombre', $fichaPer->segundoNombre) }}">
                                        <!--- Muestro los errores de validacion.-->
                                        {!! $errors->first('segundoNombre', '<span class=error style=color:red>:message</span>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('segundoApellido') ? 'has-error' : '' }}">
                                        <label for="apellido">Segundo apellido</label>
                                        <input name="segundoApellido" type="imput" class="form-control" id="apellido"
                                            placeholder="..."
                                            value="{{ old('segundoApellido', $fichaPer->segundoApellido) }}">
                                        {!! $errors->first('segundoApellido', '<span class=error style=color:red>:message</span>') !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="credencial">Credencial Cívica</label>
                                        <input name="credencial" type="imput" class="form-control" id="credencial"
                                            placeholder="..." value="{{ old('credencial', $fichaPer->credencial) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input name="fechaNac" type="text"
                                                class="form-control datetimepicker-input" data-target="#reservationdate"
                                                value="{{ old('fechaNac', $fichaPer->fechaNac) }}" />
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
                                                <option value="{{ $ciudad->id }}"
                                                    {{ old('ciudad_id', $fichaPer->ciudad_id) == $ciudad->id ? 'selected' : '' }}>
                                                    {{ $ciudad->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="estadoCivil">Estado Civil</label>
                                        <select name="estadoCivil_id" class="form-control select2" style="width: 100%;"
                                            id="estadoCivil_id">
                                            <option value=""> Seleccione un Estado Civil</option>
                                            @foreach ($estadosCiviles as $estadoCivil)
                                                <option value="{{ $estadoCivil->id }}"
                                                    {{ old('estadoCivil_id', $fichaPer->estadoCivil_id) == $estadoCivil->id ? 'selected' : '' }}>
                                                    {{ $estadoCivil->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group {{ $errors->has('seccional') ? 'has-error' : '' }} ">
                                        <label for="seccionalPolicial">Seccional Policial</label>
                                        <input name="seccionalPolicial" type="imput" class="form-control"
                                            id="seccionalPolicial" placeholder="..."
                                            value="{{ old('seccionalPolicial', $fichaPer->seccionalPolicial) }}">
                                        <!--- Muestro los errores de validacion.-->
                                        {!! $errors->first('seccionalPolicial', '<span class=error style=color:red>:message</span>') !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de Defuncion</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input name="fechaDef" type="text"
                                                class="form-control datetimepicker-input" data-target="#reservationdate"
                                                value="{{ old('fechaDef', $fichaPer->fechaDef) }}" />
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
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
                                    <div class="form-group">
                                        <label for="situacion">Situación</label>
                                        <select name="situacion_id" class="form-control select2" style="width: 100%;"
                                            id="situacion_id">
                                            <option value=""> Seleccione un Situación</option>
                                            @foreach ($situaciones as $situacion)
                                                <option value="{{ $situacion->id }}"
                                                    {{ old('situacion_id', $fichaPer->situacion_id) == $situacion->id ? 'selected' : '' }}>
                                                    {{ $situacion->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="cuerpo_id">Cuerpo/Arma</label>
                                        <select name="cuerpo_id" class="form-control select2" style="width: 100%;"
                                            id="cuerpo_id">
                                            <option value=""> Seleccione Cuerpo/Arma</option>
                                            @foreach ($cuerpos as $cuerpo)
                                                <option value="{{ $cuerpo->id }}"
                                                    {{ old('cuerpo_id', $fichaPer->cuerpo_id) == $cuerpo->id ? 'selected' : '' }}>
                                                    {{ $cuerpo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-md-6" style="float: left;">
                                    <button type="submit" class="btn btn-success btn-block">Guardar esta
                                        información</button>
                                </div>
                                <div class="col-md-6" style="float: right;">
                                    <a href="{{ route('fichasPersonales.index') }}"
                                        class="btn btn-block btn-outline-primary">Atrás</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">Galeria</h5>
            </div>
            <div class="card-body">
                @include('fichasPersonales.parciales.multimedia')
            </div>
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
                                    <label for="ideologias">Ideologias</label>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 10px; margin-left:10px"
                                        class="btn btn-xs btn-info" id="mostrarIdeologia">Monstrar Panel</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="ocupaciones">Ocupaciones</label>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 10px; margin-left:10px"
                                        class="btn btn-xs btn-info" id="mostrarOcupaciones">Monstrar Panel</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="domicilios">Domicilios</label>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 10px; margin-left:10px"
                                        class="btn btn-xs btn-info" id="mostrarDomicilios">Monstrar Panel</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="estudios">Estudios</label>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 10px; margin-left:10px"
                                        class="btn btn-xs btn-info" id="mostrarEstudios">Monstrar Panel</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="roles">Organizaciones y Roles</label>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 10px; margin-left:10px"
                                        class="btn btn-xs btn-info" id="mostrarRoles">Monstrar Panel</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="anotaciones">Anotaciones</label>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 10px; margin-left:10px"
                                        class="btn btn-xs btn-info" id="mostrarAnotaciones">Monstrar Panel</i></button>
                                </td>
                            </tr>
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
                                    <label for="dossier">Dossier</label>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 10px; margin-left:10px"
                                        class="btn btn-xs btn-info" id="mostrarDossier">Monstrar Panel</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="documentos">Documentos</label>
                                </td>
                                <td>
                                    <button style="float: rigth; padding: 10px; margin-left:10px"
                                        class="btn btn-xs btn-info" id="mostrarDocumentos">Monstrar Panel</i></button>
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
                                <button style="float: rigth; padding: 15px 18px; margin-left:10px" class="btn btn-xs btn-warning"
                                    id="mostrarTodos">Mostrar todos</i></button>
                                </td>
                            <tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row" id=ideologias style="display: none;">
                    @include('fichasPersonales.parciales.ideologias')
                </div>
                <div class="row" id=ocupaciones style="display: none;">
                    @include('fichasPersonales.parciales.ocupaciones')
                </div>
                <div class="row" id=domicilios style="display: none;">
                    @include('fichasPersonales.parciales.domicilios')
                </div>
                <div class="row" id=estudios style="display: none;">
                    @include('fichasPersonales.parciales.estudios')
                </div>
                <div class="row" id=roles style="display: none;">
                    @include('fichasPersonales.parciales.rolesOrganizaciones')
                </div>
                <div class="row" id=anotaciones style="display: none;">
                    @include('fichasPersonales.parciales.anotaciones')
                </div>
                <div class="row" id=fichaPer style="display: none;">
                    @include('fichasPersonales.parciales.fichasPerRel')
                </div>
                <div class="row" id=fichaImper style="display: none;">
                    @include('fichasPersonales.parciales.fichasImperRel')
                </div>
                <div class="row" id=dossier style="display: none;">
                    @include('fichasPersonales.parciales.dossierRel')
                </div>
                <div class="row" id=documentos style="display: none;">
                    @include('fichasPersonales.parciales.documentosRel')
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

        $(document).ready(function() {
            $('#mostrarIdeologia').click(function() {
                $('#ideologias').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#ideologias').hide();
            });
        });
        $(document).ready(function() {
            $('#mostrarOcupaciones').click(function() {
                $('#ocupaciones').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#ocupaciones').hide();
            });
        });
        $(document).ready(function() {
            $('#mostrarDomicilios').click(function() {
                $('#domicilios').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#domicilios').hide();
            });
        });
        $(document).ready(function() {
            $('#mostrarEstudios').click(function() {
                $('#estudios').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#estudios').hide();
            });
        });
        $(document).ready(function() {
            $('#mostrarRoles').click(function() {
                $('#roles').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#roles').hide();
            });
        });
        $(document).ready(function() {
            $('#mostrarAnotaciones').click(function() {
                $('#anotaciones').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#anotaciones').hide();
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
            $('#mostrarDossier').click(function() {
                $('#dossier').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#dossier').hide();
            });
        });
        $(document).ready(function() {
            $('#mostrarDocumentos').click(function() {
                $('#documentos').slideToggle("fast");
            });
        });
        $(document).ready(function() {
            $('#cerrarForm').click(function() {
                $('#documentos').hide();
            });
        });

        $(document).ready(function(){
            $('#cerrarTodos').click(function(){
                $('#ideologias').hide();
                $('#ocupaciones').hide();
                $('#domicilios').hide();
                $('#estudios').hide();
                $('#roles').hide();
                $('#anotaciones').hide();
                $('#fichaPer').hide();
                $('#fichaImper').hide();
                $('#dossier').hide();
                $('#documentos').hide();
            })
        });
        $(document).ready(function(){
            $('#mostrarTodos').click(function(){
                $('#ideologias').slideToggle("fast");
                $('#ocupaciones').slideToggle("fast");
                $('#domicilios').slideToggle("fast");
                $('#estudios').slideToggle("fast");
                $('#roles').slideToggle("fast");
                $('#anotaciones').slideToggle("fast");
                $('#fichaPer').slideToggle("fast");
                $('#fichaImper').slideToggle("fast");
                $('#dossier').slideToggle("fast");
                $('#documentos').slideToggle("fast");
            })
        });
    </script>
@endpush
