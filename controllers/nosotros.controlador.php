<?php

class ControladorNosotros{


	/*=============================================
	MOSTRAR NOSOTROS
	=============================================*/

	static public function ctrMostrarNosotros($item, $valor){

		$tabla = "nosotros";

		$respuesta = ModeloNosotros::MdlMostrarNosotros($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR NOSOTROS
	=============================================*/

	static public function ctrEditarNosotros(){

		    if(isset($_POST["editTxtNosotros"])){

				$tabla = "nosotros";
				
				$datos = array("idNosotros" => $_POST["idEditNosotros"],
                               "nosotros" => $_POST["editTxtNosotros"]);
			    

				$respuesta = ModeloNosotros::mdlEditarNosotros($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>
					Swal.fire({
						icon: "success",
						allowOutsideClick: false,
						title: "¡Sobre Nosotros ha sido Actualizado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
					  }).then(function (result) {
						if (result.value) {
						  window.location = "nosotros";
						}
					  });
				
					</script>';


				}	


			}


		}


	}