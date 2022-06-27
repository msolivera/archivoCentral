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
                                            placeholder="..."
                                            value="{{ old('numeroPaquete', $fichaPer->numeroPaquete) }}">
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
                            <!-- row de tablas inicio -->

                            <!-- /.card-body -->

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
                        <!-- /.card -->

                    </div>
                </div>

            </div>
        </form>

        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Ideologias</h3>
                            </div>
                            <div class="col-4">
                                <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                                    data-toggle="modal" data-target="#IdeologiaModal"><i
                                        class="fa fa-regular fa-plus"></i></button>
                            </div>
                        </div>
                        <table id="ideologiaTable" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ideologias</th>
                                    <th>Observación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichasIdeologias as $fichaIdeologia)
                                    <tr>
                                        <td>{{ $fichaIdeologia->id }}</td>
                                        <td>{{ $fichaIdeologia->ideologia->nombre }}</td>
                                        <td>{{ $fichaIdeologia->observacion }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('fichasPersonalesIdeologia.destroy', $fichaIdeologia->id) }}"
                                                style="display: inline"> {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger"
                                                    onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                                        class="fa fa-light fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Ocupaciones</h3>
                            </div>
                            <div class="col-4">
                                <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                                    data-toggle="modal" data-target="#profesionModal"><i
                                        class="fa fa-regular fa-plus"></i></button>
                            </div>
                        </div>
                        <table id="profesionTable" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ocupaciones</th>
                                    <th>Observación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichasProfesiones as $fichaProfesion)
                                    <tr>
                                        <td>{{ $fichaProfesion->id }}</td>
                                        <td>{{ $fichaProfesion->profesion->nombre }}</td>
                                        <td>{{ $fichaProfesion->observacion }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('fichasPersonalesProfesion.destroy', $fichaProfesion->id) }}"
                                                style="display: inline"> {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger"
                                                    onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                                        class="fa fa-light fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Domicilios</h3>
                            </div>
                            <div class="col-4">
                                <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                                    data-toggle="modal" data-target="#domicilioModal"><i
                                        class="fa fa-regular fa-plus"></i></button>
                            </div>
                        </div>
                        <table id="domicilioTable" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Domicilio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichasDomicilios as $fichaDomicilio)
                                    <tr>
                                        <td>{{ $fichaDomicilio->id }}</td>
                                        <td>{{ $fichaDomicilio->domicilio }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('domicilio.destroy', $fichaDomicilio->id) }}"
                                                style="display: inline"> {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger"
                                                    onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                                        class="fa fa-light fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Estudios</h3>
                            </div>
                            <div class="col-4">
                                <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                                    data-toggle="modal" data-target="#estudiosModal"><i
                                        class="fa fa-regular fa-plus"></i></button>
                            </div>
                        </div>
                        <table id="estudiosTable" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Completo</th>
                                    <th>Instituto</th>
                                    <th>Tipo Inst.</th>
                                    <th>Nivel</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichasEstudios as $fichaEstudio)
                                    <tr>
                                        <td>{{ $fichaEstudio->id }}</td>
                                        <td>{{ $fichaEstudio->nombreEstudio }}</td>
                                        <td>{{ $fichaEstudio->completado }}</td>
                                        <td>{{ $fichaEstudio->nombreInstituto }}</td>
                                        <td>{{ $fichaEstudio->tipoInstituto }}</td>
                                        <td>{{ $fichaEstudio->nivelAcademico }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('estudio.destroy', $fichaEstudio->id) }}"
                                                style="display: inline"> {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger"
                                                    onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                                        class="fa fa-light fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Roles y Organizaciones</h3>
                            </div>
                            <div class="col-4">
                                <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                                    data-toggle="modal" data-target="#organizacionesModal"><i
                                        class="fa fa-regular fa-plus"></i></button>
                            </div>
                        </div>
                        <table id="organizacionTable" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Organizacion</th>
                                    <th>Observaciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichasOrganizaciones as $fichaOrganizacion)
                                    <tr>
                                        <td>{{ $fichaOrganizacion->id }}</td>
                                        <td>{{ $fichaOrganizacion->nombre }}</td>
                                        <td>{{ $fichaOrganizacion->organizacion->nombre }}</td>
                                        <td>{{ $fichaOrganizacion->observacion }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('rolOrganizacion.destroy', $fichaOrganizacion->id) }}"
                                                style="display: inline"> {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger"
                                                    onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                                        class="fa fa-light fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Anotaciones</h3>
                            </div>
                            <div class="col-4">
                                <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                                    data-toggle="modal" data-target="#anotacionesModal"><i
                                        class="fa fa-regular fa-plus"></i></button>
                            </div>
                        </div>
                        <table id="anotacionesTable" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Anotacion</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichasAnotaciones as $fichaAnotacion)
                                    <tr>
                                        <td>{{ $fichaAnotacion->id }}</td>
                                        <td>{{ $fichaAnotacion->nombre }}</td>
                                        <td>{{ $fichaAnotacion->tipoAnotacion->nombre }}</td>

                                        <td>
                                            <form method="POST"
                                                action="{{ route('anotacion.destroy', $fichaAnotacion->id) }}"
                                                style="display: inline"> {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-xs btn-danger"
                                                    onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                                        class="fa fa-light fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Fichas personales relacionadas</h3>
                            </div>
                            <div class="col-4">
                                <button style="float: right; padding: 15px;" id="mostrarParientes"
                                    class="btn btn-xs btn-info"><i class="fa fa-regular fa-plus"></i></button>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ideologias</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>prueba</td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-info"><i
                                                class="fa fa-light fa-pen"></i></a>
                                        <form method="POST" action="#" style="display: inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-xs btn-danger"
                                                onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                                    class="fa fa-light fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-12" id="parientes" style="display: none;">
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
                                    <th>Primer Nombre</th>
                                    <th>Segundo Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form method="POST" action="{{ route('parientes.store', $fichaPer->id) }}">
                                    {{ csrf_field() }}
                                    @foreach ($fichasPerParientes as $fichaPerPariente)
                                        <tr>
                                            <td>
                                                <button class="btn btn-primary">Crear</button>
                                            </td>
                                            <td><select name="parentesco_id" class="form-control select2"
                                                    style="width: 100%;" id="parentesco_id">
                                                    <option value=""> Seleccione</option>
                                                    @foreach ($parentescos as $parentesco)
                                                        <option value="{{ $parentesco->id }}"
                                                            {{ old('parentesco_id', $fichaPer->parentesco_id) == $parentesco->id ? 'selected' : '' }}>
                                                            {{ $parentesco->nombre }}</option>
                                                    @endforeach
                                                </select></td>
                                            <td>{{ $fichaPerPariente->cedula }}</td>
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

            <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Fichas Impersonales Relacionadas</h3>
                            </div>
                            <div class="col-4">
                                <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                                    data-toggle="modal" data-target="#fichasImperModal"><i
                                        class="fa fa-regular fa-plus"></i></button>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ideologias</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>prueba</td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-info"><i
                                                class="fa fa-light fa-pen"></i></a>
                                        <form method="POST" action="#" style="display: inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-xs btn-danger"
                                                onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                                    class="fa fa-light fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Dossier Relacionados</h3>
                            </div>
                            <div class="col-4">
                                <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                                    data-toggle="modal" data-target="#dossierModal"><i
                                        class="fa fa-regular fa-plus"></i></button>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ideologias</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>prueba</td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-info"><i
                                                class="fa fa-light fa-pen"></i></a>
                                        <form method="POST" action="#" style="display: inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-xs btn-danger"
                                                onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                                    class="fa fa-light fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Documentos Relacionados</h3>
                            </div>
                            <div class="col-4">
                                <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning"
                                    data-toggle="modal" data-target="#documentosModal"><i
                                        class="fa fa-regular fa-plus"></i></button>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ideologias</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>prueba</td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-info"><i
                                                class="fa fa-light fa-pen"></i></a>
                                        <form method="POST" action="#" style="display: inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-xs btn-danger"
                                                onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"><i
                                                    class="fa fa-light fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- row de tablas fin -->
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="IdeologiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('fichasPersonalesIdeologia.store', $fichaPer) }}">
                {{ csrf_field() }}
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-6" style="display: inline-block;">

                                    <div class="form-group">
                                        <label for="ideologia">Ideologia</label>
                                        <select name="ideologia" class="form-control select2" style="width: 100%;"
                                            id="ideologia">
                                            <option value=""> Seleccione </option>
                                            @foreach ($ideologias as $ideologia)
                                                <option value="{{ $ideologia->id }}">
                                                    {{ $ideologia->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="observacion">Observación</label>
                                        <input name="observacion" type="imput" class="form-control" id="observacion"
                                            placeholder="..." value="{{ old('observacion') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="profesionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('fichasPersonalesProfesion.store', $fichaPer) }}">
                {{ csrf_field() }}
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="profesionLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-6" style="display: inline-block;">

                                    <div class="form-group">
                                        <label for="profesion">Ocupaciones</label>
                                        <select name="profesion" class="form-control select2" style="width: 100%;"
                                            id="profesion">
                                            <option value=""> Seleccione </option>
                                            @foreach ($profesiones as $profesion)
                                                <option value="{{ $profesion->id }}">
                                                    {{ $profesion->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="observacion">Observación</label>
                                        <input name="observacion" type="imput" class="form-control" id="observacion"
                                            placeholder="..." value="{{ old('observacion') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="domicilioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('domicilio.store', $fichaPer) }}">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="domicilio">domicilio</label>
                            <input name="domicilio" type="imput" class="form-control" id="domicilio"
                                placeholder="..." value="{{ old('domicilio') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="estudiosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('estudio.store', $fichaPer) }}">
                {{ csrf_field() }}
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="estudioLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-6" style="display: inline-block;">
                                    <div class="form-group">
                                        <label for="nombreEstudio">Nombre</label>
                                        <input name="nombreEstudio" type="imput" class="form-control"
                                            id="nombreEstudio" placeholder="..." value="{{ old('nombreEstudio') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="completado">Completo</label>
                                        <select name="completado" class="form-control select2" style="width: 100%;"
                                            id="completado">
                                            <option value=""> Seleccione </option>
                                            <option value="SI"> SI </option>
                                            <option value="NO"> NO </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombreInstituto">Instituto</label>
                                        <input name="nombreInstituto" type="imput" class="form-control"
                                            id="nombreInstituto" placeholder="..."
                                            value="{{ old('nombreInstituto') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tipoInstituto">Tipo Inst.</label>
                                        <select name="tipoInstituto" class="form-control select2" style="width: 100%;"
                                            id="tipoInstituto">
                                            <option value=""> Seleccione </option>
                                            <option value="Público"> Público </option>
                                            <option value="Privado"> Privado </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nivelAcademico">Nivel</label>
                                        <select name="nivelAcademico" class="form-control select2" style="width: 100%;"
                                            id="nivelAcademico">
                                            <option value=""> Seleccione </option>
                                            <option value="Ciclo Basico"> Ciclo Basico </option>
                                            <option value="Bachillerato"> Bachillerato </option>
                                            <option value="Terciario"> Terciario </option>
                                            <option value="Grado"> Grado </option>
                                            <option value="Post Grado"> Post Grado </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="organizacionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('rolOrganizacion.store', $fichaPer) }}">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" type="imput" class="form-control" id="nombre" placeholder="..."
                                value="{{ old('nombre') }}">
                        </div>
                        <div class="form-group">
                            <label for="organizacion">Organizacion</label>
                            <select name="organizacion" class="form-control select2" style="width: 100%;"
                                id="organizacion">
                                <option value=""> Seleccione </option>
                                @foreach ($organizaciones as $organizacion)
                                    <option value="{{ $organizacion->id }}">
                                        {{ $organizacion->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="observacion">Observación</label>
                            <input name="observacion" type="imput" class="form-control" id="observacion"
                                placeholder="..." value="{{ old('observacion') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="anotacionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('anotacion.store', $fichaPer) }}">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anotaciones</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Texto</label>
                            <input name="nombre" type="imput" class="form-control" id="nombre" placeholder="..."
                                value="{{ old('nombre') }}">
                        </div>
                        <div class="form-group">
                            <label for="tipo_anotacion">Tipo de Anotacion</label>
                            <select name="tipo_anotacion" class="form-control select2" style="width: 100%;"
                                id="tipo_anotacion">
                                <option value=""> Seleccione </option>
                                @foreach ($tipoAnotaciones as $tipoAnotacion)
                                    <option value="{{ $tipoAnotacion->id }}">
                                        {{ $tipoAnotacion->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalPersonaNueva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form method="POST" action="{{ route('fichasIngresos.storeIngreso') }}">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Persona</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6" style="display: inline-block;">
                                <div class="form-group {{ $errors->has('numeroPaquete') ? 'has-error' : '' }} ">
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
                                            <select name="otroDocNombre" class="form-control select2"
                                                style="width: 100%;" id="otroDocNombre">
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

                                <div class="form-group" style='margin-bottom: 35px;'>
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

                                <div class="form-group {{ $errors->has('numeroPaquete') ? 'has-error' : '' }} ">
                                    <label for="numeroPaquete">Nro. Paquete de Ingreso</label>
                                    <input name="numeroPaquete" type="imput" class="form-control" id="numeroPaquete"
                                        placeholder="..." value="{{ old('numeroPaquete') }}">
                                    <!--- Muestro los errores de validacion.-->
                                    {!! $errors->first('numeroPaquete', '<span class=error style=color:red>:message</span>') !!}
                                </div>
                            </div>

                            <div class="col-md-6" style="display: inline-block; float: right;">
                                <div class="form-group {{ $errors->has('clasificacion_id') ? 'has-error' : '' }} ">
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
                                        <input name="fechaNac" type="text"
                                            class="form-control datetimepicker-input" data-target="#reservationdate"
                                            value="{{ old('fechaNac') }}" />
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
                                    <label>Fecha de Defuncion</label>
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <input name="fechaDef" type="text"
                                            class="form-control datetimepicker-input" data-target="#reservationdate2"
                                            value="{{ old('fechaDef') }}" />
                                        <div class="input-group-append" data-target="#reservationdate2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
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
                                                <option value=""> </option>
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
                                                <option value=""> </option>
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

    <div class="modal fade" id="fichasImperModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">fichasImperModal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dossierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">dossierModal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="documentosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">documentosModal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@stop


@push('styles')
    <!-- estilos para las tablas -->
    <link rel="stylesheet" href="/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!--FIN CSS PARA LAS TABLAS -->
    <!--ESTILOS PARA CALENDARIO daterange picker -->
    <link rel="stylesheet" href="/adminLTE/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="/adminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="/adminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminLTE/css/adminlte.min.css">
@endpush
@push('scripts')
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

    <!-- FIN DataTables  & Plugins -->
    <!-- INICIO TODO ESTO PARA CALENDARIO -->

    <!-- date-range-picker -->
    <script src="/adminLTE/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Select2 -->
    <script src="/adminLTE/plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="/adminLTE/plugins/moment/moment.min.js"></script>
    <script src="/adminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>


    <script>
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
        $(function() {
            $("#ideologiaTable").DataTable({
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
        $(function() {
            $("#profesionTable").DataTable({
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
        $(function() {
            $("#domicilioTable").DataTable({
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
        $(function() {
            $("#estudiosTable").DataTable({
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
        $(function() {
            $("#organizacionTable").DataTable({
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
        $(function() {
            $("#anotacionesTable").DataTable({
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
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'DD/MM/YYYY'
            });
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })
        })

        $(document).ready(function() {
            $('#mostrarParientes').click(function() {
                $('#parientes').slideToggle("fast");
            });
        });
    </script>
@endpush
