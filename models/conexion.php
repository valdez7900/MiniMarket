<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=127.0.0.1;dbname=minimarket",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}