<nav class="sidebar-menu">

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->


        <li class="nav-item">
            <a href="home" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Inicio
                </p>
            </a>

        </li>
        <!--INGRESOS -->
        <li class="nav-item {{ request()->is('fichasIngresos*') ? 'active' : '' }}">
            <a href="fichasIngresos" class="nav-link">
                <i class="nav-icon fa fa-folder-open"></i>
                <p>
                    Ingresos
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: {{ request()->is('fichasIngresos*') ? 'block' : 'none' }};">
                <li class="nav-item">
                    <a href="{{ route('fichasIngresos.index') }}" class="nav-link"
                        {{ request()->is('fichasIngresos*') ? 'style=color:#3498db' : '' }}>
                        <i class="fa fa-eye nav-icon"></i>
                        <p>Ver Fichas</p>
                    </a>
                </li>
            </ul>
        </li>
        <!--FICHAS PERSONALES -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-id-card"></i>
                <p>
                    Fichas Personales
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview"  style="display: {{ request()->is('fichasPersonales*') ? 'block' : 'none' }};">
                <li class="nav-item">
                    <a href="{{ route('fichasPersonales.index') }}" class="nav-link"
                        {{ request()->is('fichasPersonales*') ? 'style=color:#3498db' : '' }}>
                        <i class="fa fa-user nav-icon"></i>
                        <p>Ver Fichas Personales</p>
                    </a>
                </li>
            </ul>
        </li>
        <!--FICHAS IMPERSONALES -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-id-card"></i>
                <p>
                    Fichas Impersonales
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview"  style="display: {{ request()->is('fichasPersonales*') ? 'block' : 'none' }};">
                <li class="nav-item">
                    <a href="{{ route('fichasPersonales.index') }}" class="nav-link">
                        <i class="fa fa-ship nav-icon"></i>
                        <p>Ver Fichas Impersonales</p>
                    </a>
                </li>
            </ul>
        </li>
        <!--DOSSIER -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-folder-open"></i>
                <p>
                    Dossier
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display:none;">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-eye nav-icon"></i>
                        <p>Ver Dossier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-plus-square nav-icon"></i>
                        <p>Crear Dossier</p>
                    </a>
                </li>
            </ul>
        </li>

        <!--DOCUMENTOS -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Documentos
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display:none;">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-eye nav-icon"></i>
                        <p>Ver Documentos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-plus-square nav-icon"></i>
                        <p>Crear Documentos</p>
                    </a>
                </li>
            </ul>
        </li>
        <!--ADMINISTRACION -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-cogs"></i>
                <p>
                    Administracion
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display:none;">
                <!--USUARIOS -->
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fa fa-lock nav-icon"></i>
                        <p>Usuarios <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview" style="display:none;">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Ver Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-plus-square nav-icon"></i>
                                <p>Crear Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- METADATOS -->
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fa fa-cog nav-icon"></i>
                        <p>Metadatos <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview" style="display:none;">
                        <li class="nav-item">
                            <a href="{{ route('ambito.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Ambitos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('armaCuerpo.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Arma/Cuerpos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ciudad.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Ciudades</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('clasificacion.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Clasificaciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('departamentos.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Departamentos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('estadoCivil.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Estado Civil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fuenteDocumento.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Fuente de documentos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fuerza.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Fuerzas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('grado.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Grados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ideologia.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Ideologias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('necesidadConocer.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Necesidad de Conocer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('organizacion.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Organizaciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('paises.index') }}" class="nav-link">
                                <i class="fas fa-globe-americas"></i>
                                <p>Paises</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('palabraClave.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Palabras Clave</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('parentesco.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Parentescos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('profesiones.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Profesiones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('serieDocumental.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Serie Documental</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('situacion.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Situacion</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subTema.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Sub Temas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tema.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Temas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tipoAnotacion.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Tipos de Anotacion</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tipoDocumento.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Tipos de documentos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ubicacion.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Ubicaciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('unidad.index') }}" class="nav-link">
                                <i class="fas fa-user-tie"></i>
                                <p>Unidades</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</nav>
