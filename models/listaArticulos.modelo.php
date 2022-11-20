<?php

require_once "conexion.php";

class ModeloListaArticulos{

	
	/*=============================================
	MOSTRAR LISTA CLIENTE
	=============================================*/

	static public function mdlMostrarListaClientes($tabla, $item, $valor){


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
	REGISTRO DE LISTA CLIENTE
	=============================================*/

	static public function mdlIngresarLista($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreCliente, correoCliente, listaProductos) VALUES (:nombreCliente, :correoCliente, :listaProductos)");

		$stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":correoCliente", $datos["emailCliente"], PDO::PARAM_STR);
        $stmt->bindParam(":listaProductos", $datos["listaCliente"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

}