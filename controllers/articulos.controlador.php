<?php

class ControladorArticulos{

	

	/*=============================================
	MOSTRAR ARTICULOS
	=============================================*/

	static public function ctrMostrarArticulos($item, $valor){

		$tabla = "articulos";

		$respuesta = ModeloArticulos::MdlMostrarArticulos($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	REGISTRO DE ARTICULO
	=============================================*/

	static public function ctrCrearArticulo(){

		if(isset($_POST["nombreArticuloA"])){

				$isEmpty = empty($_FILES);
				$error   = $_FILES['fotoArticuloA']['error'] ?? 4;

				// si no es empty el array de $_FILES y
				// si error es 0 (no contiene errores la imagen)
				if(!$isEmpty && $error === 0)
				{
					$image = $_FILES['fotoArticuloA']['tmp_name'];
					$imgContenido = file_get_contents($image);
					$data = base64_encode($imgContenido);
					$tipo = pathinfo($_FILES["fotoArticuloA"]["tmp_name"], PATHINFO_EXTENSION);

					$base64 = "data:/".$_FILES["fotoArticuloA"]["type"].";base64,".$data;

					
				}else{
					$base64 = null;
				}

				$tabla = "articulos";

				$datos = array("nombreArticulo" => $_POST["nombreArticuloA"],
					           "precioArticulo" => $_POST["precioArticuloA"],
					           "precioDescuento" => $_POST["precioDescuentoA"],
					           "fotoArticulo"=>$base64);
			    

				$respuesta = ModeloArticulos::mdlIngresarArticulo($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>
					Swal.fire({
						icon: "success",
						allowOutsideClick: false,
						title: "¡El Articulo ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
					  }).then(function (result) {
						if (result.value) {
						  window.location = "articulos";
						}
					  });
				
					</script>';


				}	




		}


	}


	/*=============================================
	EDITAR ARTICULO
	=============================================*/

	static public function ctrEditarArticulo(){

		if(isset($_POST["nombreArticuloE"])){

			if ($_POST["fotoE"] == "NO") {
				$isEmpty = empty($_FILES);
				$error   = $_FILES['fotoArticuloE']['error'] ?? 4;

				// si no es empty el array de $_FILES y
				// si error es 0 (no contiene errores la imagen)
				if(!$isEmpty && $error === 0)
				{
					$image = $_FILES['fotoArticuloE']['tmp_name'];
					$imgContenido = file_get_contents($image);
					$data = base64_encode($imgContenido);
					$tipo = pathinfo($_FILES["fotoArticuloE"]["tmp_name"], PATHINFO_EXTENSION);

					$base64 = "data:/".$_FILES["fotoArticuloE"]["type"].";base64,".$data;

					
				}else{
					$base64 = null;
				}
				
			}else {
				$base64 = $_POST["fotoE"];
				
			}
				

				$tabla = "articulos";

				$datos = array("nombreArticulo" => $_POST["nombreArticuloE"],
							   "precioArticulo" => $_POST["precioArticuloE"],
							   "precioDescuento" => $_POST["precioDescuentoE"],
							   "idArticulo" => $_POST["idEditArticulo"],
							   "fotoArticulo"=>$base64);
			    

				$respuesta = ModeloArticulos::mdlEditarArticulo($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>
					Swal.fire({
						icon: "success",
						allowOutsideClick: false,
						title: "¡El Articulo ha sido Actualizado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
					  }).then(function (result) {
						if (result.value) {
						  window.location = "articulos";
						}
					  });
				
					</script>';


				}	


			


		}


	}

	

}