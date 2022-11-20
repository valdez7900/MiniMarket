<?php

require_once "conexion.php";

class ModeloUsuarios{

	
	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){


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
	REGISTRO DE ADMINISTRADOR
	=============================================*/

	static public function mdlIngresarAdmin($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreUsuario, contraUsuario) VALUES (:nombreUsuario, :contraUsuario)");

		$stmt->bindParam(":nombreUsuario", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":contraUsuario", $datos["contraUsuario"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


	/*=============================================
	EDITAR ADMINISTRADOR
	=============================================*/

	static public function mdlEditarAdmin($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreUsuario = :nombreUsuario, contraUsuario = :contraUsuario WHERE idUsuario = :idEditAdmin");

		$stmt->bindParam(":nombreUsuario", $datos["nombreUsuario"], PDO::PARAM_STR);
		$stmt->bindParam(":contraUsuario", $datos["contraUsuario"], PDO::PARAM_STR);
		$stmt->bindParam(":idEditAdmin", $datos["idEditAdmin"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	ELIMINAR USUARIO
	=============================================*/

	static public function mdlEliminarUsuario($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

	
}