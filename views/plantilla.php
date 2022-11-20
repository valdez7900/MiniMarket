<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mini-Market El Poderoso</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="views/assets/img/mini.ico">
  
  <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="views/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.css">
  <link rel="stylesheet" href="views/plugins/datatables-buttons/css/buttons.bootstrap4.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="views/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="views/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="views/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.css">

  <!--=====================================
  PLUGINS DE JS
  ======================================-->

  <!-- jQuery -->
  <script src="views/plugins/jquery/jquery.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Select2 -->
  <script src="views/plugins/select2/js/select2.full.min.js"></script>

  <!-- Bootstrap4 Duallistbox -->
  <script src="views/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="views/plugins/datatables/jquery.dataTables.js"></script>
  <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="views/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
  <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.js"></script>
  <script src="views/plugins/datatables-buttons/js/dataTables.buttons.js"></script>
  <script src="views/plugins/datatables-buttons/js/buttons.bootstrap4.js"></script>
  <script src="views/plugins/jszip/jszip.js"></script>
  <script src="views/plugins/pdfmake/pdfmake.js"></script>
  <script src="views/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="views/plugins/datatables-buttons/js/buttons.html5.js"></script>
  <script src="views/plugins/datatables-buttons/js/buttons.print.js"></script>
  <script src="views/plugins/datatables-buttons/js/buttons.colVis.js"></script>

  <!-- SweetAlert2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.min.js"></script>

  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>
  

</head>
<?php if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") : ?>
  <body class="hold-transition sidebar-mini layout-fixed">
<?php else : ?>
  <body class="hold-transition sidebar-mini layout-fixed login-page">
<?php endif; ?>
 
  <?php

if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

 echo '<div class="wrapper">';

 echo '<div class="preloader flex-column justify-content-center align-items-center">
   <img class="animation__shake" src="views/assets/img/mini.ico" alt="mini" height="60" width="60">
 </div>';

  /*=============================================
  HEADER
  =============================================*/

  include "modules/header.php";

  /*=============================================
  MENU
  =============================================*/

  include "modules/menu.php";

  /*=============================================
  CONTENIDO
  =============================================*/

  if(isset($_GET["ruta"])){

    if($_GET["ruta"] == "inicio" ||
       $_GET["ruta"] == "administradores" ||
       $_GET["ruta"] == "articulos"|| 
			 $_GET["ruta"] == "nosotros"||
			 $_GET["ruta"] == "listaArticulos" ||
       $_GET["ruta"] == "login" ||
       $_GET["ruta"] == "exit"){

      include "modules/".$_GET["ruta"].".php";
      
    }else{

      include "modules/404.php";

    }

  }else{

    include "modules/inicio.php";
    
  }

  /*=============================================
  FOOTER
  =============================================*/

  include "modules/footer.php";

  echo '</div>';

}else{

  include "modules/login.php";

}

?>


<!-- OWN JS -->
<script src="views/assets/js/administradores.js"></script>
<script src="views/assets/js/articulos.js"></script>
<script src="views/assets/js/listaProductos.js"></script>
<script src="views/assets/js/nosotros.js"></script>

</body>
</html>
