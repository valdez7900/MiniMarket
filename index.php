<?php

/*=============================================
SHOW ERRORS
=============================================*/

ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log",  "C:/xampp/htdocs/miniMarket/php_error_log");

/*=============================================
CONTROLLERS
=============================================*/
require_once "controllers/plantilla.controlador.php";
require_once "controllers/usuarios.controlador.php";
require_once "controllers/nosotros.controlador.php";
require_once "controllers/articulos.controlador.php";
require_once "controllers/listaArticulos.controlador.php";

/*=============================================
MODELS
=============================================*/
require_once "models/usuarios.modelo.php";
require_once "models/nosotros.modelo.php";
require_once "models/articulos.modelo.php";
require_once "models/listaArticulos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();