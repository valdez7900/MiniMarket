<?php

class ControladorPlantilla{

	static public function ctrPlantilla(){

		if(isset($_GET["ruta"])){

			if($_GET["ruta"] == "principal" ||
			$_GET["ruta"] == "frmDomicilio"){
  
			include "views/modules/".$_GET["ruta"].".php";
  
			}else{
  
					if($_GET["ruta"] == "adminMiniMarket" || 
					$_GET["ruta"] == "inicio" ||
					$_GET["ruta"] == "administradores"||
					$_GET["ruta"] == "articulos"|| 
					$_GET["ruta"] == "nosotros"||
					$_GET["ruta"] == "listaArticulos" ||
					$_GET["ruta"] == "login" ||
					$_GET["ruta"] == "exit"){
		
					include "views/plantilla.php";
		
					}else{
						include "views/modules/404.php";
					}
			}
		}else{
	
			include "views/modules/principal.php";
			
		}
	
	}	

}