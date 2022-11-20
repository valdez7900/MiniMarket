<?php

require_once "../controllers/articulos.controlador.php";
require_once "../models/articulos.modelo.php";

class AjaxArticulo{
	/*=============================================
	EDITAR ADMINISTRADOR
	=============================================*/	

	public $idArticulo;

	public function ajaxEditarArticulo(){

		$item = "idArticulo";
		$valor = $this->idArticulo;

		$respuesta = ControladorArticulos::ctrMostrarArticulos($item, $valor);

		echo json_encode($respuesta);

	}

	
	/*=============================================
	ELIMINAR ADMINISTRADOR
	=============================================*/	

	public $idArticuloE;

	public function ajaxEliminarArticulo(){

		$tabla = "articulos";
		$item = "idArticulo";
		$valor = $this->idArticuloE;

		$respuesta = ModeloArticulos::mdlEliminarArticulo($tabla, $item, $valor);

		echo $respuesta;

	}

	


}

/*=============================================
EDITAR ADMINISTRADOR
=============================================*/
if(isset($_POST["idArticulo"])){

	$validar = new AjaxArticulo();
	$validar -> idArticulo = $_POST["idArticulo"];
	$validar -> ajaxEditarArticulo();

}



/*=============================================
ELIMINAR ADMINISTRADOR
=============================================*/
if(isset($_POST["idArticuloE"])){

	$validar = new AjaxArticulo();
	$validar -> idArticuloE = $_POST["idArticuloE"];
	$validar -> ajaxEliminarArticulo();

}