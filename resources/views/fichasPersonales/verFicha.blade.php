@extends('layout')

@section('header')
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                <h3 class="card-title">Fichas Personales • Vista General</h3>
            </div>
            <div class="col-4">
                <a href="{{ route('fichasPersonales.index') }}" style="float: right;"
                    class="btn btn-block btn-outline-primary col-6">Atrás</a>
            </div>

        </div>
    </div>

@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row md-12">
            <div class="container-fluid">
<<<<<<< HEAD
=======
                <!-- INFORMACION BASICA -->
                <div class="card card-primary">

                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid" src="dist/img/user4-128x128.jpg" alt="Foto del sujeto">
                        </div>
                        <div class="col-sm-4" style="display: inline-block; vertical-align: top;">
                            <li class="list-group-item">
                                <b>Clasificacion:</b> <a class="float-right">{{ $fichasPerRep->clasificacionNombre }}</a>
                            </li>
                        </div>
                        <div class="col-sm-7" style="display: inline-block; vertical-align: top;">
                            <li class="list-group-item">
                                <b>Temas:</b>
                                @foreach ($fichaTemas as $tema)
                                    <a class="float-right">{{ $tema->nombre }}{{ '/' }}</a>
                                @endforeach
                            </li>
                        </div>
                        <h3 class="profile-username text-center">General</h3>
                        <div class="col-sm-4" style="display: inline-block; vertical-align: top;">
                            <li class="list-group-item">
                                <b>Nombres:</b> <a class="float-right">{{ $fichasPerRep->primerNombre }}
                                    {{ $fichasPerRep->segundoNombre }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Apellidos:</b> <a class="float-right">{{ $fichasPerRep->primerApellido }}
                                    {{ $fichasPerRep->segundoApellido }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Fecha Nac</b> <a class="float-right">{{ $fichasPerRep->fechaNac }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Pais</b> <a class="float-right">{{ $fichasPerRep->paisNombre }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Secc. Policial</b> <a class="float-right">{{ $fichasPerRep->seccionalPolicial }}</a>
                            </li>
                        </div>
                        <div class="col-sm-3" style="display: inline-block; vertical-align: top;">
                            <li class="list-group-item">
                                <b>Cedula</b> <a class="float-right">{{ $fichasPerRep->cedula }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Otro doc</b> <a class="float-right">{{ $fichasPerRep->otroDocNombre }}
                                    {{ $fichasPerRep->otroDocNumero }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Sexo</b> <a class="float-right">{{ $fichasPerRep->sexo }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Credencial</b> <a class="float-right">{{ $fichasPerRep->credencial }} </a>
                            </li>
                            <li class="list-group-item">
                                <b>Depto.</b> <a class="float-right">{{ $fichasPerRep->departamentoNombre }}</a>
                            </li>

                        </div>
                        <div class="col-sm-4" style="display: inline-block; vertical-align: top;">
                            <li class="list-group-item">
                                <!--<b>Estado Civil</b> <a class="float-right">{ $fichasPerRep->estadoCivil}} </a>-->
                                <b>Estado Civil</b> <a class="float-right">{{ $fichasPerRep->estadoCivilNombre }} </a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ $fichasPerRep->correoElectronico }} </a>
                            </li>
                            <li class="list-group-item">
                                <b>Fecha def</b> <a class="float-right">{{ $fichasPerRep->fechaDef }}</a>
                            </li>
                            <li class="list-group-item">
                                <!--<b>Barrio</b> <a class="float-right">{ $fichasPerRep->ciudad}}</a>-->
                                <b>Ciudad</b> <a class="float-right">{{ $fichasPerRep->ciudadNombre }}</a>
                            </li>

                        </div>


                    </div>

                    <div class="card-body" style="padding-top: 1px">
                        <h3 class="profile-username text-center">Militar</h3>

                        <div class="col-sm-4" style="display: inline-block; vertical-align: top;">
                            <li class="list-group-item">
                                <!--<b>Fuerza</b> <a class="float-right">{ $fichasPerRep->fuerza}}</a>-->
                                <b>Fuerza</b> <a class="float-right">{{ $fichasPerRep->fuerzaNombre }}</a>
                            </li>
                            <li class="list-group-item">
                                <!--<b>Situacion</b> <a class="float-right">{ $fichasPerRep->situacion}}</a>-->
                                <b>Situacion</b> <a class="float-right">{{ $fichasPerRep->situacionNombre }}</a>
                            </li>
                        </div>
                        <div class="col-sm-3" style="display: inline-block; vertical-align: top;">
                            <li class="list-group-item">
                                <!--<b>Grado</b> <a class="float-right">{ $fichasPerRep->grado}}</a>-->
                                <b>Grado</b> <a class="float-right">{{ $fichasPerRep->gradoNombre }}{{$fichasPerRep->gradoSigla}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Paquete Ingreso</b> <a class="float-right">{{ $fichasPerRep->numeroPaquete }}</a>
                            </li>
                        </div>
                        <div class="col-sm-4" style="display: inline-block; vertical-align: top;">
                            <li class="list-group-item">
                                <!--<b>Especialidad</b> <a class="float-right">{ $fichasPerRep->armaCuerpo}} </a> -->
                                <b> Cuerpo/Especialidad</b> <a class="float-right"> {{ $fichasPerRep->cuerpoNombre }}{{$fichasPerRep->cuerpoSigla}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Estado de Ingreso</b> <a class="float-right">{{ $fichasPerRep->estadoIngreso }} </a>
                            </li>

                        </div>
                    </div>

                    <div class="card-body" style="padding-top: 1px">
                        <h3 class="profile-username text-center">Domicilios</h3>
                        <table class="table table-bordered table-striped">

                            <tbody>
                                @foreach ($fichasDomicilios as $fichaDomicilio)
                                    <tr>
                                        <td>{{ $fichaDomicilio->domicilio }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body" style="padding-top: 1px">
                        <h3 class="profile-username text-center">Unidades</h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sigla</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichaUnidades as $unidad)
                                    <tr>
                                        <td>{{ $unidad->sigla }}</td>
                                        <td>{{ $unidad->nombre }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body" style="padding-top: 1px">
                        <h3 class="profile-username text-center">Ideologias</h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Ideologia</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichasIdeologias as $ideologia)
                                    <tr>
                                        <td>{{ $ideologia->ideologia->nombre }}</td>
                                        <td>{{ $ideologia->observacion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body" style="padding-top: 1px">
                        <h3 class="profile-username text-center">Estudios</h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Completo</th>
                                    <th>Instituto</th>
                                    <th>Tipo Inst.</th>
                                    <th>Nivel</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichasEstudios as $fichaEstudio)
                                    <tr>
                                        <td>{{ $fichaEstudio->nombreEstudio }}</td>
                                        <td>{{ $fichaEstudio->completado }}</td>
                                        <td>{{ $fichaEstudio->nombreInstituto }}</td>
                                        <td>{{ $fichaEstudio->tipoInstituto }}</td>
                                        <td>{{ $fichaEstudio->nivelAcademico }}</td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="card-body" style="padding-top: 1px">
                        <h3 class="profile-username text-center">Ocupaciones</h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Ocupaciones</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichasProfesiones as $fichaProfesion)
                                    <tr>
                                        <td>{{ $fichaProfesion->profesion->nombre }}</td>
                                        <td>{{ $fichaProfesion->observacion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body" style="padding-top: 1px">
                        <h3 class="profile-username text-center">Organizaciones</h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Organizacion</th>
                                    <th>Observaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichasOrganizaciones as $fichaOrganizacion)
                                    <tr>
                                        <td>{{ $fichaOrganizacion->nombre }}</td>
                                        <td>{{ $fichaOrganizacion->organizacion->nombre }}</td>
                                        <td>{{ $fichaOrganizacion->observacion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body" style="padding-top: 1px">
                        <h3 class="profile-username text-center">Anotaciones</h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Anotacion</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fichasAnotaciones as $fichaAnotacion)
                                    <tr>
                                        <td>{{ $fichaAnotacion->nombre }}</td>
                                        <td>{{ $fichaAnotacion->tipoAnotacion->nombre }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <a href="#" class="btn btn-primary btn-block" onclick="window.print();"><b>Descargar Ficha
                            PDF</b></a>
                    <!-- /.card-body -->
>>>>>>> 4a26ece56a26f5ea1b2898c80a309c7fd131e5e8

                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">General</h3>
                </div>

                <div class="row md-12">
                    <div class="col-sm-4"style="display: inline-block; vertical-align: top; padding:5px;">
                        <div class="card card-widget widget-user-2">
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <b>Clasificacion:</b> <a
                                            class="float-right">{{ $fichasPerRep->clasificacionNombre }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8"style="display: inline-block; vertical-align: top; padding:5px;">
                        <div class="card card-widget widget-user-2">
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <b>Temas:</b>
                                    @foreach ($fichaTemas as $tema)
                                        <a class="float-right">{{ $tema->nombre }}{{ '/' }}</a>
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row md-12">
                    <div class="col-sm-4"style="display: inline-block; vertical-align: top; padding:5px;">
                        <div class="card card-widget widget-user-2">
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">

                                        <b>Nombres:</b> <a class="float-right">{{ $fichasPerRep->primerNombre }}
                                            {{ $fichasPerRep->segundoNombre }}</a>

                                    </li>
                                    <li class="nav-item">

                                        <b>Apellidos:</b> <a class="float-right">{{ $fichasPerRep->primerApellido }}
                                            {{ $fichasPerRep->segundoApellido }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Fecha Nac</b> <a class="float-right">{{ $fichasPerRep->fechaNac }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Pais</b> <a class="float-right">{{ $fichasPerRep->paisNombre }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Secc. Policial</b> <a
                                            class="float-right">{{ $fichasPerRep->seccionalPolicial }}</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4"style="display: inline-block; vertical-align: top;padding:5px;">
                        <div class="card card-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <b>Cedula</b> <a class="float-right">{{ $fichasPerRep->cedula }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Otro doc</b> <a class="float-right">{{ $fichasPerRep->otroDocNombre }}
                                            {{ $fichasPerRep->otroDocNumero }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Sexo</b> <a class="float-right">{{ $fichasPerRep->sexo }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Credencial</b> <a class="float-right">{{ $fichasPerRep->credencial }} </a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Depto.</b> <a class="float-right">{{ $fichasPerRep->departamentoNombre }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4"style="display: inline-block; vertical-align: top;padding:5px;">
                        <div class="card card-widget widget-user-2">
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <!--<b>Estado Civil</b> <a class="float-right">{ $fichasPerRep->estadoCivil}} </a>-->
                                        <b>Estado Civil</b> <a class="float-right">{{ $fichasPerRep->estadoCivilNombre }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Email</b> <a class="float-right">{{ $fichasPerRep->correoElectronico }} </a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Fecha def</b> <a class="float-right">{{ $fichasPerRep->fechaDef }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <!--<b>Barrio</b> <a class="float-right">{ $fichasPerRep->ciudad}}</a>-->
                                        <b>Ciudad</b> <a class="float-right">{{ $fichasPerRep->ciudadNombre }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Militar</h3>
                </div>
                <div class="row md-12">
                    <div class="col-sm-4"style="display: inline-block; vertical-align: top; padding:5px;">
                        <div class="card card-widget widget-user-2">
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <b>Fuerza</b> <a class="float-right">{{ $fichasPerRep->fuerzaNombre }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Situacion</b> <a class="float-right">{{ $fichasPerRep->situacionNombre }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4"style="display: inline-block; vertical-align: top; padding:5px;">
                        <div class="card card-widget widget-user-2">
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <b>Grado</b> <a
                                            class="float-right">{{ $fichasPerRep->gradoNombre }}{{ $fichasPerRep->gradoSigla }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Paquete Ingreso</b> <a class="float-right">{{ $fichasPerRep->numeroPaquete }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4"style="display: inline-block; vertical-align: top; padding:5px;">
                        <div class="card card-widget widget-user-2">
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <!--<b>Especialidad</b> <a class="float-right">{ $fichasPerRep->armaCuerpo}} </a> -->
                                        <b> Cuerpo/Especialidad</b> <a class="float-right">
                                            {{ $fichasPerRep->cuerpoNombre }}{{ $fichasPerRep->cuerpoSigla }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <b>Estado Ingreso</b> <a class="float-right">{{ $fichasPerRep->estadoIngreso }} </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Domicilios</h3>
                </div>
                <table class="table table-sm">

                    <tbody>
                        @foreach ($fichasDomicilios as $fichaDomicilio)
                            <tr>
                                <td>{{ $fichaDomicilio->domicilio }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                
                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Unidades</h3>
                    
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Sigla</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichaUnidades as $unidad)
                            <tr>
                                <td>{{ $unidad->sigla }}</td>
                                <td>{{ $unidad->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Ideologías</h3>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Ideologia</th>
                            <th>Observación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichasIdeologias as $ideologia)
                            <tr>
                                <td>{{ $ideologia->ideologia->nombre }}</td>
                                <td>{{ $ideologia->observacion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                
                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Estudios</h3>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Completo</th>
                            <th>Instituto</th>
                            <th>Tipo Inst.</th>
                            <th>Nivel</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichasEstudios as $fichaEstudio)
                            <tr>
                                <td>{{ $fichaEstudio->nombreEstudio }}</td>
                                <td>{{ $fichaEstudio->completado }}</td>
                                <td>{{ $fichaEstudio->nombreInstituto }}</td>
                                <td>{{ $fichaEstudio->tipoInstituto }}</td>
                                <td>{{ $fichaEstudio->nivelAcademico }}</td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Ocupaciones</h3>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Ocupaciones</th>
                            <th>Observación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichasProfesiones as $fichaProfesion)
                            <tr>
                                <td>{{ $fichaProfesion->profesion->nombre }}</td>
                                <td>{{ $fichaProfesion->observacion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                
                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Organizaciones</h3>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Organizacion</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichasOrganizaciones as $fichaOrganizacion)
                            <tr>
                                <td>{{ $fichaOrganizacion->nombre }}</td>
                                <td>{{ $fichaOrganizacion->organizacion->nombre }}</td>
                                <td>{{ $fichaOrganizacion->observacion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                
                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Anotaciones</h3>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Anotacion</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichasAnotaciones as $fichaAnotacion)
                            <tr>
                                <td>{{ $fichaAnotacion->nombre }}</td>
                                <td>{{ $fichaAnotacion->tipoAnotacion->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-sm-6">
                
                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Doss. Relacionados</h3>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Clasificación</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichasAnotaciones as $fichaAnotacion)
                            <tr>
                                
                                <td>{{ $fichaAnotacion->tipoAnotacion->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-sm-6">
                
                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Docs. Relacionados</h3>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Clasificación</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichasAnotaciones as $fichaAnotacion)
                            <tr>
                                
                                <td>{{ $fichaAnotacion->tipoAnotacion->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-sm-6">
                
                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Ficha Imper. Relacionados</h3>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Clasificación</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichasImperRel as $fichasImper)
                            <tr>
                                <td>{{ $fichasImper->nombreFicha }}</td>
                                <td>{{ $fichasImper->nombreClasificacion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12">
                
                <div class="widget-user-header bg-primary">
                    <h3 class="profile-username text-center">Fichas Personales. Relacionados</h3>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nombre/s</th>
                            <th>Apellido/s</th>
                            <th>Relacion</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichasPerRel as $fichasPer)
                            <tr>            
                                <td>{{ $fichasPer->primerNombre }} {{ $fichasPer->segundoNombre }}</td>
                                <td>{{ $fichasPer->primerApellido }} {{ $fichasPer->segundoApellido }}</td>
                                <td>{{ $fichasPer->parentesco }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="#" class="btn btn-success btn-block" onclick="window.print();"><b>Descargar Ficha
             PDF</b></a>

    </section>



@stop

@push('styles')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="adminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="adminLTE/css/adminlte.min.css">
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="adminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="adminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="adminLTE/js/adminlte.min.js"></script>
    <script src="adminLTE/plugins/jquery/jquery.min.js"></script>
@endpush
