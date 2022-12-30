@extends('layout')

@section('header')
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                <h3 class="card-title">Dossier • Vista General</h3>
            </div>
            <div class="col-4">
                <a href="{{ route('dossier.index') }}" style="float: right;"
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
                                            class="float-right">{{ $dossier->clasificacion->nombre }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8"style="display: inline-block; vertical-align: top; padding:5px;">
                        
                        <!--<div class="card card-widget widget-user-2">
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <b>Temas:</b>
                                        foreach ($fichaTemas as $tema)
                                            <a class="float-right">{ $tema->nombre }}{ '/' }}</a>
                                        endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>-->
                    </div>
                    <div class="col-sm-12"style="display: inline-block; vertical-align: top; padding:5px;">
                        <div class="card card-widget widget-user-2">
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <b>Título:</b> <a
                                            class="float-right">{{ $dossier->titulo }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        
        <!--<div class="col-sm-6">

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
                    foreach ($fichaUnidades as $unidad)
                        <tr>
                            <td>{ $unidad->sigla }}</td>
                            <td>{ $unidad->nombre }}</td>
                        </tr>
                    endforeach
                </tbody>
            </table>
        </div> -->
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
                <!--<tbody>
                    foreach ($fichasImperRel as $fichasImper)
                        <tr>
                            <td>{ $fichasImper->nombre }}</td>
                            <td>{ $fichasImper->nombreClasificacion }}</td>
                        </tr>
                    endforeach
                </tbody>-->
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
                    </tr>
                </thead>
                <!--<tbody>

                    foreach ($fichasPerRel as $fichasPer)
                        <tr>
                            <td>{ $fichasPer->primerNombre }} </td>
                            <td>{ $fichasPer->primerApellido }} </td>
                        </tr>
                    endforeach
                </tbody>-->
            </table>
        </div>
    </div>

        <a href="#" class="btn btn-success btn-block" onclick="window.print();"><b>Descargar Ficha
                PDF</b></a>

    </section>
@stop



@push('styles')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
