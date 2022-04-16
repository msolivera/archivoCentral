
<nav class="sidebar-menu">
    
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      
      
      <li class="nav-item" >
        <a href="home" class="nav-link {{request()->is('home') ? 'active' : ''}}" >
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Inicio
          </p>
        </a>
     
      </li>
      <li class="nav-item ">
        <a href="fichasPersonales" class="nav-link {{request()->is('fichasPersonales*') ? 'active' : ''}}">
          <i class="nav-icon fa fa-id-card"></i>
          <p>
            Archivo Central
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: {{request()->is('fichasPersonales*') ? 'block' : 'none'}};">
          <li class="nav-item">
            <a href="{{route('fichasPersonales.index')}}" class="nav-link {{request()->is('fichasPersonales*') ? 'active' : ''}}">
              <i class="fa fa-users nav-icon"></i>
              <p>Fichas Personales <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview" style="display: {{request()->is('fichasPersonales*') ? 'block' : 'none'}};">
              <li class="nav-item">
                <a href="{{route('fichasPersonales.index')}}" class="nav-link" {{request()->is('fichasPersonales*') ? 'style=color:#3498db' : ''}}>
                  <i class="fa fa-user nav-icon"></i>
                  <p>Ver Fichas Personales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('fichasPersonales.crearFicha')}}" class="nav-link" {{request()->is('crearFichasPersonales*') ? 'style=color:#3498db' : ''}}>
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Crear Fichas Personales</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a href="{{route('fichasPersonales.index')}}" class="nav-link active">
              <i class="fa fa-ship nav-icon"></i>
              <p>Fichas Impersonales <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('fichasPersonales.index')}}" class="nav-link" >
                  <i class="fa fa-eye nav-icon"></i>
                  <p>Ver Fichas Impersonales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Crear Fichas Impersonales</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
       
      </li>
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
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-cogs"></i>
          <p>
            Administracion
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display:none;">
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
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="fa fa-cog nav-icon"></i>
              <p>Metadatos <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview" style="display:none;">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>Ver Metadatos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Crear Metadatos</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </nav>