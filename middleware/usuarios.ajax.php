<?php

require_once "../controllers/usuarios.controlador.php";
require_once "../models/usuarios.modelo.php";

class AjaxUsuario{
	/*=============================================
	EDITAR ADMINISTRADOR
	=============================================*/	

	public $idAdmin;

	public function ajaxEditarAdmin(){

		$item = "idUsuario";
		$valor = $this->idAdmin;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}

	
	/*=============================================
	ELIMINAR ADMINISTRADOR
	=============================================*/	

	public $idDeleteAdmin;

	public function ajaxEliminarAdmin(){

		$tabla = "usuarios";
		$item = "idUsuario";
		$valor = $this->idDeleteAdmin;

		$respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla, $item, $valor);

		echo $respuesta;

	}

	


}

/*=============================================
EDITAR ADMINISTRADOR
=============================================*/
if(isset($_POST["idAdmin"])){

	$validar = new AjaxUsuario();
	$validar -> idAdmin = $_POST["idAdmin"];
	$validar -> ajaxEditarAdmin();

}



/*=============================================
ELIMINAR ADMINISTRADOR
=============================================*/
if(isset($_POST["idDeleteAdmin"])){

	$validar = new AjaxUsuario();
	$validar -> idDeleteAdmin = $_POST["idDeleteAdmin"];
	$validar -> ajaxEliminarAdmin();

}