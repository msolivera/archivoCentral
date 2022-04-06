<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Archivo Central</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../adminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../adminLTE/css/adminlte.min.css">
<!--INICIO CSS PARA LAS TABLAS -->
  <link rel="stylesheet" href="../adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!--FIN CSS PARA LAS TABLAS -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @include('parciales.navbar') 
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a  class="brand-link">
      <img src="../adminLTE/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Menu Principal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
     <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      @include('parciales.sidebar')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  
  </aside>
  <div class="content-wrapper">
  <section class="content-header">
    @yield('header')
  </section>
  @yield('content')

</div>
 <!-- Main Footer -->
 @include('parciales.footer')
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- INICIO DataTables  & Plugins -->
<script src="../adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../adminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../adminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../adminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../adminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- FIN DataTables  & Plugins -->
<!-- bs-custom-file-input -->
<script src="../adminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminLTE/js/adminlte.min.js"></script>


<!-- Page specific script DE LA TABLA DE FICHAS -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", /*"excel",*/ "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<!-- Page specific script DE LA TABLA DE FICHAS -->
</body>
</html>
