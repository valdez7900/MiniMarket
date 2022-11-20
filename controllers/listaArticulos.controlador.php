<?php

class ControladorLista{

	

	/*=============================================
	MOSTRAR LISTA DE ARTICULOS CLIENTE
	=============================================*/

	static public function ctrMostrarListasClientes($item, $valor){

		$tabla = "listaarticulos";

		$respuesta = ModeloListaArticulos::mdlMostrarListaClientes($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	REGISTRO DE LISTA DE ARTICULOS
	=============================================*/

	static public function ctrCrearListaArticulos(){

		if(isset($_POST["nombreCliente"])){

				$tabla = "listaarticulos";
				
				$datos = array("nombreCliente" => $_POST["nombreCliente"],
					          "emailCliente" => $_POST["emailCliente"],
					          "listaCliente" => $_POST["listaCliente"]);
			    

				$respuesta = ModeloListaArticulos::mdlIngresarLista($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>
					Swal.fire({
						icon: "success",
						allowOutsideClick: false,
						title: "¡La Lista ha sido guardado correctamente, sigue comprando con nosotros!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
					  }).then(function (result) {
						if (result.value) {
						  window.location = "principal";
						}
					  });
				
					</script>';


				}	


			


		}


	}

}