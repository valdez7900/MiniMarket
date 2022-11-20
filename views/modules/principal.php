<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="views/assets/img/mini.ico">
    <link rel="stylesheet" href="views/assets/css/estilo.css">
    <title>Mini-Market El Poderoso</title>
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


    <!-- CUERPO Y CONTENIDO -->
    <section id="main-content">
        <h1>Supermercado colombiano 100% tradicional,productos de buena calidad</h1>
        <p>
            "Super minimarket el poderoso ,productos para el hogar,comida,fruta fresca
            y mas de lo que puedas imaginar ,aqui lo tenemos todo en el minimarket El
            Poderoso"
        </p>
        <div class="presentation-video">
            <video src="views/assets/img/production ID_4318387.mp4" width="100%" height="100%" autoplay muted loop></video>
        </div>


    </section>

    <section class="about" id="about">
        <div>
            <h1>Sobre nosotros</h1>
            <br>
        </div>

        <div>
        <?php

        $item = null;
        $valor = null;

        $nosotros = ControladorNosotros::ctrMostrarNosotros($item, $valor);

        foreach ($nosotros as $key => $value){
            echo '<p>'.$value["nosotros"].'</p>';
        }
       ?>
            
        <img src="views/assets/img/minimarket-que-es-beneficios-y-caracteristicas.jpg" width="100%" height="100%"></img>


        </div>
    </section>


    <section class="listaProductos" id="listaProductos">
        <h1 class="ofertas">Nuestras ofertas</h1>

        <div id="productos">
        <?php

            $item = null;
            $valor = null;

            $articulos = ControladorArticulos::ctrMostrarArticulos($item, $valor);

            foreach ($articulos as $key => $value){

            echo '<div class="producto-item">
                  <h2>Articulo:'.$value["nombreArticulo"].'</h2>';

                  if($value["fotoArticulo"] != ""){

                    echo '<img src="'.$value["fotoArticulo"].'" width="200px">';

                  }else{

                    echo '<img src="views/assets/img/box.png" class="img-thumbnail" width="200px">';

                  }

                  echo '<h3>Precio:$'.$value["precioDescuento"].'</h3>
                        <p>Antes $'.$value["precioArticulo"].' / Ahora $'.$value["precioDescuento"].'</p>
                        </div>';

            }


        ?>

    </section>

    <!-- PIE DE PAGINA -->
    <footer id="main-footer">
        <p>Minimarket &copy;. Todos los derechos de la pagina</p>
    </footer>


    <script src="views/assets/js/index.js"></script>
</body>

</html>