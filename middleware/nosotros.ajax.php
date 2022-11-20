<?php

require_once "../controllers/nosotros.controlador.php";
require_once "../models/nosotros.modelo.php";

class AjaxNosotros{
	/*=============================================
	EDITAR NOSOTROS
	=============================================*/	

	public $idENosotros;

	public function ajaxEditarNosotros(){

		$item = "idNosotros";
		$valor = $this->idENosotros;

		$respuesta = ControladorNosotros::ctrMostrarNosotros($item, $valor);

		echo json_encode($respuesta);

	}	


}

/*=============================================
EDITAR ADMINISTRADOR
=============================================*/
if(isset($_POST["idENosotros"])){

	$validar = new AjaxNosotros();
	$validar -> idENosotros = $_POST["idENosotros"];
	$validar -> ajaxEditarNosotros();

}
