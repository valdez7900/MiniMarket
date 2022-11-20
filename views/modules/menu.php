<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <h1 class="brand-link">
      
      <span class="brand-text font-weight-light">Mini Market</span>
    </h1>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
          <img src='views/assets/img/default.png' class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block"><?php  echo $_SESSION["name"]; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="inicio" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DashBoard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Catalogo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="administradores" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administradores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="articulos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Articulos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="nosotros" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nosotros</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listaArticulos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Articulos (Enviar)</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
<!-- /.sidebar -->
</aside>