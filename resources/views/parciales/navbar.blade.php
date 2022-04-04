<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>      
  </ul>

  

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>   

    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <span class="d-none d-md-inline"> {{ Auth::user()->name }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <li class="user-header bg-primary">
          <p>
            {{ Auth::user()->name }}
          </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          
          <form method="POST" action="{{ route('logout') }}">
            <a href="#" class="btn btn-default btn-sm">Perfil</a>
            @csrf
            <button type="submit" class="btn btn-default btn-sm">
            Cerrar Sesión
            </button>
          </form>
        </li>
      </ul>
    </li>
  </ul>