/*=============================================
TABLA DE ADMINISTRADORES
=============================================*/
if ($("#dtArticulos").length) {
    $(".tablas")
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["excel", "pdf", "print"],
      })
      .buttons()
      .container()
      .appendTo("#dtArticulos_wrapper .col-md-6:eq(0)");
  }
  
  /*=============================================
  SUBIENDO LA FOTO DEL USUARIO
  =============================================*/
  $("#fotoArticuloA").change(function () {
    var imagen = this.files[0];
  
    /*=============================================
        VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
        =============================================*/
  
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
      $("#fotoArticuloA").val("");
  
      Swal.fire({
        title: "Error al subir la imagen",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        icon: "error",
        confirmButtonText: "¡Cerrar!",
      });
    } else if (imagen["size"] > 2000000) {
      $("#fotoArticuloA").val("");
  
      Swal.fire({
        title: "Error al subir la imagen",
        text: "¡La imagen no debe pesar más de 2MB!",
        icon: "error",
        confirmButtonText: "¡Cerrar!",
      });
    } else {
      var datosImagen = new FileReader();
      datosImagen.readAsDataURL(imagen);
  
      $(datosImagen).on("load", function (event) {
        var rutaImagen = event.target.result;
  
        $(".previsualizar").attr("src", rutaImagen);
        $("#quitarPic").css({ visibility: "visible" });
      });
    }
  });
  
  /*=============================================
  SUBIENDO LA FOTO DEL USUARIO EDITAR
  =============================================*/
  $("#fotoArticuloE").change(function () {
    var imagen = this.files[0];
  
    /*=============================================
        VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
        =============================================*/
  
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
      $("#fotoArticuloE").val("");
  
      Swal.fire({
        title: "Error al subir la imagen",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        icon: "error",
        confirmButtonText: "¡Cerrar!",
      });
    } else if (imagen["size"] > 2000000) {
      $("#fotoArticuloE").val("");
  
      Swal.fire({
        title: "Error al subir la imagen",
        text: "¡La imagen no debe pesar más de 2MB!",
        icon: "error",
        confirmButtonText: "¡Cerrar!",
      });
    } else {
      var datosImagen = new FileReader();
      datosImagen.readAsDataURL(imagen);
  
      $(datosImagen).on("load", function (event) {
        var rutaImagen = event.target.result;
  
        $(".previsualizarEdit").attr("src", rutaImagen);
        $("#editQPic").css({ visibility: "visible" });
      });
    }
  });

  /*=============================================
  EDITAR ARTICULO
  =============================================*/
  if ($("#dtArticulos").length) {
    $(".tablas").on("click", ".btnEditArticulo", function () {
      $(this).trigger("reset");
      var idArticulo = $(this).attr("idArticulo");
  
      var datos = new FormData();
      datos.append("idArticulo", idArticulo);
  
      $.ajax({
        url: "middleware/articulos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          $("#idEditArticulo").val(respuesta["idArticulo"]);
          $("#nombreArticuloE").val(respuesta["nombreArticulo"]);
          $("#precioArticuloE").val(respuesta["precioArticulo"]);
          $("#precioDescuentoE").val(respuesta["precioDescuento"]);

          if (respuesta["fotoArticulo"] != "") {
            if (respuesta["fotoArticulo"] != null) {
              $(".previsualizarEdit").attr("src", respuesta["fotoArticulo"]);
              $("#fotoE").val(respuesta["fotoArticulo"]);
              $("#editQPic").css({ visibility: "visible" });
            } else {
              $(".previsualizarEdit").attr("src", "views/assets/img/box.png");
              $("#fotoE").val("NO");
              $("#editQPic").css({ visibility: "hidden" });
            }
          } else {
            $(".previsualizarEdit").attr("src", "views/assets/img/box.png");
            $("#fotoE").val("NO");
            $("#editQPic").css({ visibility: "hidden" });
          }


        },
      });
    });
  }
  
  /*=============================================
  QUITAR FOTO
  =============================================*/
  $("#quitarPic").click(function () {
    $(".previsualizar").attr("src", "views/assets/img/box.png");
    $("#quitarPic").css({ visibility: "hidden" });
    $("#fotoArticuloA").val("");
  });
  
  $("#editQPic").click(function () {
    $(".previsualizarEdit").attr("src", "views/assets/img/box.png");
    $("#editQPic").css({ visibility: "hidden" });
    $("#fotoArticuloE").val("");
  });
  
  /*=============================================
  ELIMINAR ARTICULO
  =============================================*/
  if ($("#dtArticulos").length) {
    $(".tablas").on("click", ".btnDeleteArticulo", function () {
      var idArticulo = $(this).attr("idArticulo");
      Swal.fire({
        title: "¿Está seguro de Eliminar el Articulo?",
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, eliminar Articulo!",
      }).then(function (result) {
        if (result.value) {
          var datos = new FormData();
          datos.append("idArticuloE", idArticulo);
  
          $.ajax({
            url: "middleware/articulos.ajax.php",
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
                  title: "¡El Articulo ha sido Eliminado correctamente!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                }).then(function (result) {
                  if (result.value) {
                    window.location = "articulos";
                  }
                });
              }
            },
          });
        }
      });
    });
  }
  