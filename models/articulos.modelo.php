<?php

require_once "conexion.php";

class ModeloArticulos{

	
	/*=============================================
	MOSTRAR ARTICULO
	=============================================*/

	static public function mdlMostrarArticulos($tabla, $item, $valor){


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
	REGISTRO DE ARTICULO
	=============================================*/

	static public function mdlIngresarArticulo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreArticulo, precioArticulo, precioDescuento, fotoArticulo) VALUES (:nombreArticulo, :precioArticulo, :precioDescuento, :fotoArticulo)");

		$stmt->bindParam(":nombreArticulo", $datos["nombreArticulo"], PDO::PARAM_STR);
		$stmt->bindParam(":precioArticulo", $datos["precioArticulo"], PDO::PARAM_STR);
        $stmt->bindParam(":precioDescuento", $datos["precioDescuento"], PDO::PARAM_STR);
		$stmt->bindParam(":fotoArticulo", $datos["fotoArticulo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


	/*=============================================
	EDITAR ARTICULO
	=============================================*/

	static public function mdlEditarArticulo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreArticulo = :nombreArticulo, precioArticulo = :precioArticulo, precioDescuento = :precioDescuento, fotoArticulo = :fotoArticulo WHERE idArticulo = :idArticulo");

		$stmt->bindParam(":idArticulo", $datos["idArticulo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreArticulo", $datos["nombreArticulo"], PDO::PARAM_STR);
		$stmt->bindParam(":precioArticulo", $datos["precioArticulo"], PDO::PARAM_STR);
        $stmt->bindParam(":precioDescuento", $datos["precioDescuento"], PDO::PARAM_STR);
		$stmt->bindParam(":fotoArticulo", $datos["fotoArticulo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	ELIMINAR ARTICULO
	=============================================*/

	static public function mdlEliminarArticulo($tabla, $item, $valor){

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