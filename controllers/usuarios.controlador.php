<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["nameLogin"])){

			$tabla = "usuarios";

			$item = "nombreUsuario";
			$valor = $_POST["nameLogin"];

			$password = $_POST["passLogin"];

			$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

			if(is_array($respuesta) && $respuesta["nombreUsuario"] == $valor && $respuesta["contraUsuario"] == $password){

				

					$_SESSION["iniciarSesion"] = "ok";
					$_SESSION["name"] = $respuesta["nombreUsuario"];

					echo '<script>
							window.location = "inicio";
					</script>';

			}else{

				echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

			}

		}


	}

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	REGISTRO DE USUARIO ADMINISTRADOR
	=============================================*/

	static public function ctrCrearAdmin(){

		if(isset($_POST["userAdmin"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["userAdmin"])){


				$tabla = "usuarios";

				$password = $_POST["passAdmin"];
				
				$datos = array("nombre" => $_POST["userAdmin"],
					           "contraUsuario" => $password);
			    

				$respuesta = ModeloUsuarios::mdlIngresarAdmin($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>
					Swal.fire({
						icon: "success",
						allowOutsideClick: false,
						title: "¡El Administrador ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
					  }).then(function (result) {
						if (result.value) {
						  window.location = "administradores";
						}
					  });
				
					</script>';


				}	


			}else{

				echo '<script>
					Swal.fire({
						icon: "error",
						allowOutsideClick: false,
						title: "¡El Administrador no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
					  }).then(function (result) {
						if (result.value) {
						  window.location = "administradores";
						}
					  });
				
					</script>';

			}


		}


	}


	/*=============================================
	EDITAR USUARIO ADMINISTRADOR
	=============================================*/

	static public function ctrEditarAdmin(){

		if(isset($_POST["editUserAdmin"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editUserAdmin"])){

				$tabla = "usuarios";

				if (isset($_POST["editPassAdmin"])) {
					$password = $_POST["editPassAdmin"];
				}else {
					$password = $_POST["passwordActual"];
				}

				
				
				$datos = array(
							   "idEditAdmin" => $_POST["idEditAdmin"],
					           "nombreUsuario" => $_POST["editUserAdmin"],
					           "contraUsuario" => $password);
			    

				$respuesta = ModeloUsuarios::mdlEditarAdmin($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>
					Swal.fire({
						icon: "success",
						allowOutsideClick: false,
						title: "¡El Administrador ha sido Actualizado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
					  }).then(function (result) {
						if (result.value) {
						  window.location = "administradores";
						}
					  });
				
					</script>';


				}	


			}else{

				echo '<script>
					Swal.fire({
						icon: "error",
						allowOutsideClick: false,
						title: "¡El Administrador no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
					  }).then(function (result) {
						if (result.value) {
						  window.location = "administradores";
						}
					  });
				
					</script>';

			}


		}


	}

	

}