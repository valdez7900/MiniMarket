<?php

require_once "conexion.php";

class ModeloNosotros{

	
	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function MdlMostrarNosotros($tabla, $item, $valor){


		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	EDITAR ADMINISTRADOR
	=============================================*/

	static public function mdlEditarNosotros($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nosotros = :nosotros WHERE idNosotros = :idNosotros");

		$stmt->bindParam(":idNosotros", $datos["idNosotros"], PDO::PARAM_STR);
        $stmt->bindParam(":nosotros", $datos["nosotros"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	

	
}