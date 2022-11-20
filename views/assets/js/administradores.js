/*=============================================
TABLA DE ADMINISTRADORES
=============================================*/
if ($("#dtAdmins").length) {
  $(".tablas")
    .DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      buttons: ["excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#dtAdmins_wrapper .col-md-6:eq(0)");
}


/*=============================================
EDITAR ADMINISTRADOR
=============================================*/
if ($("#dtAdmins").length) {
  $(".tablas").on("click", ".btnEditAdmin", function () {
    $(this).trigger("reset");
    var idAdmin = $(this).attr("idAdmin");

    var datos = new FormData();
    datos.append("idAdmin", idAdmin);

    $.ajax({
      url: "middleware/usuarios.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        
        $("#editUserAdmin").val(respuesta["nombreUsuario"]);

        $("#passwordActual").val(respuesta["contraUsuario"]);

        $("#idEditAdmin").val(respuesta["idUsuario"]);

      },
    });
  });
}



/*=============================================
ELIMINAR ADMINISTRADOR
=============================================*/
if ($("#dtAdmins").length) {
  $(".tablas").on("click", ".btnDeleteAdmin", function () {
    var idAdmin = $(this).attr("idAdmin");
    Swal.fire({
      title: "¿Está seguro de Eliminar el Administrador?",
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, eliminar Administrador!",
    }).then(function (result) {
      if (result.value) {
        var datos = new FormData();
        datos.append("idDeleteAdmin", idAdmin);

        $.ajax({
          url: "middleware/usuarios.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "text",
          success: function (respuesta) {
            if (respuesta == "ok") {
              Swal.fire({
                icon: "success",
                allowOutsideClick: false,
                title: "¡El Administrador ha sido Eliminado correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
              }).then(function (result) {
                if (result.value) {
                  window.location = "administradores";
                }
              });
            }
          },
        });
      }
    });
  });
}
