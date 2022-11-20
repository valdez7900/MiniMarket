/*=============================================
TABLA DE NOSOTROS
=============================================*/
if ($("#dtNosotros").length) {
    $(".tablas")
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["excel", "pdf", "print"],
      })
      .buttons()
      .container()
      .appendTo("#dtNosotros_wrapper .col-md-6:eq(0)");
  }
  
  
  /*=============================================
  EDITAR NOSOTROS
  =============================================*/
  if ($("#dtNosotros").length) {
    $(".tablas").on("click", ".btnEditNosotros", function () {
      $(this).trigger("reset");
      var idNosotros = $(this).attr("idNosotros");
  
      var datos = new FormData();
      datos.append("idENosotros", idNosotros);
  
      $.ajax({
        url: "middleware/nosotros.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          
          $("#editTxtNosotros").val(respuesta["nosotros"]);
  
          $("#idEditNosotros").val(respuesta["idNosotros"]);
  
        },
      });
    });
  }
  