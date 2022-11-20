<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="views/assets/img/mini.ico">
    <link rel="stylesheet" href="views/assets/css/estilo.css">
    <title>Mini market El poderoso</title>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="views/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- SweetAlert2 -->
    <script src="views/plugins/sweetalert2/sweetalert2.min.js"></script>
</head>


<body>

    <!-- ENCABEZADO Y MENU -->

    <header class="main-header">
        <a class="main-logo" href="principal">
            <img src="views/assets/img/image.png"></img>
        </a>
        <nav id="nav" class="main-nav">
            <div class="nav-links">
                <a class="link-item" href="principal">Inicio</a>
                <a class="link-item" href="#about">Sobre nosotros</a>
                <a class="link-item" href="#listaProductos">Nuestras ofertas</a>
                <a class="link-item" href="frmDomicilio">Domicilio</a>
            </div>
        </nav>
        <button id="button-menu" class="button-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </header>

<br>
    <!-- FORMULARIO -->
    <section class="domicilio" id="domicilio">
        <h1>Solicite a su domicilio</h1>
        <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">
            
                <label for="nombreCliente">Nombre:</label>
                <input id="nombreCliente" name="nombreCliente" placeholder="Nombre completo" style="color:black;font-size:16px;">
                <label for="emailCliente">Email:</label>
                <input id="emailCliente" name="emailCliente" type="email" placeholder="ejemplo@email.com" style="color:black;font-size:16px;">
                <label for="listaCliente">Mensaje:</label>
                <textarea style="color:black;font-size:16px;" id="listaCliente" name="listaCliente" placeholder="Danos tu mensaje"></textarea>
                <input id="submit" name="submit" type="submit" value="Enviar">
                <?php

                $crearLista = new ControladorLista();
                $crearLista -> ctrCrearListaArticulos();

                ?>
        </form>

    </section>
    <!-- PIE DE PAGINA -->
    <footer id="main-footer">
        <p>Minimarket &copy;. Todos los derechos de la pagina</p>
    </footer>


    <script src="views/assets/js/index.js"></script>
</body>

</html>