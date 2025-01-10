$(document).ready(function () {
  listarCompras();
});
function listarCompras() {
  $("#compras").load("accion/listar_compras.php");
}

function cargarCompra(idcompra, idcompraestado, idusuario, idcompraestadotipo) {
  $("#contenido").load(
    "accion/cargar_compra_admin.php?idcompra=" +
      idcompra +
      "&idcompraestado=" +
      idcompraestado +
      "&idusuario=" +
      idusuario +
      "&idcompraestadotipo=" +
      idcompraestadotipo,
    function () {
      if (idcompraestadotipo == 1) {
        $("#BotonAceptar").show();
        $("#BotonCancelar").show();
        $("#BotonEnviar").hide();
        $("#quitarItem").show();
      }
      if (idcompraestadotipo == 2) {
        $("#BotonAceptar").hide();
        $("#BotonCancelar").show();
        $("#BotonEnviar").show();
        $("#quitarItem").show();
      }
      if (idcompraestadotipo == 3) {
        $("#BotonAceptar").hide();
        $("#BotonCancelar").hide();
        $("#BotonEnviar").hide();
        $("#quitarItem").hide();
      }
      if (idcompraestadotipo == 4) {
        $("#BotonAceptar").hide();
        $("#BotonCancelar").hide();
        $("#BotonEnviar").hide();
        $("#quitarItem").hide();
      }
    }
  );
}

function quitarItem(idItem) {
  //Ocultar modal
  let registro = { idItem: idItem };
  var genericModalEl = document.getElementById("exampleModal");
  var modal = bootstrap.Modal.getInstance(genericModalEl);
  $.ajax({
    type: "POST",
    url: "accion/quitar_item.php",
    data: registro,
    complete: function (xhr, textStatus) {
      //se llama cuando se recibe la respuesta (no importa si es error o éxito)
      console.log("La respuesta regreso");
    },
    success: function (msg) {
      console.log(msg);
      // Espera a que el documento esté listo
      $(document).ready(function () {
        // Maneja el clic en el botón dentro del modal
        $(".cerraryRecargar").on("click", function () {
          // Cierra el modal
          $("#exampleModal").modal("hide");
          // Recarga la página
          location.reload(true);
        });
      });
    },
    error: function (xhr, textStatus, errorThrown) {
      //called when there is an error
      console.error(
        "Error en la solicitud Ajax: " + textStatus + " - " + errorThrown
      );
      console.log(xhr.responseText); //muestra en la consola del navegador todos los errores
    },
  });
}

function cambiarEstado(idcompra, idcompraestado, idcompraestadotipo) {
  //Ocultar modal
  let registro = {
    idcompraestado: idcompraestado,
    idcompraestadotipo: idcompraestadotipo,
    idcompra: idcompra,
  };
  var genericModalEl = document.getElementById("exampleModal");
  var modal = bootstrap.Modal.getInstance(genericModalEl);
  $.ajax({
    type: "POST",
    url: "accion/agregar_estado.php",
    data: registro,
    complete: function (xhr, textStatus) {
      //se llama cuando se recibe la respuesta (no importa si es error o éxito)
      console.log("La respuesta regreso");
    },
    success: function (msg) {
      console.log(msg);

      // Espera a que el documento esté listo
      $(document).ready(function () {
        // Maneja el clic en el botón dentro del modal
        $(".cerraryRecargar").on("click", function () {
          // Cierra el modal
          $("#exampleModal").modal("hide");
          // Recarga la página
          location.reload(true);
        });
      });
    },
    error: function (xhr, textStatus, errorThrown) {
      console.error(
        "Error en la solicitud Ajax: " + textStatus + " - " + errorThrown
      );
      console.log(xhr.responseText); //muestra en la consola del navegador todos los errores
    },
  });
}

function cambiarEstadoEnviado(idcompra, idcompraestado, idcompraestadotipo) {
  //Ocultar modal
  let registro = {
    idcompraestado: idcompraestado,
    idcompraestadotipo: idcompraestadotipo,
    idcompra: idcompra,
  };
  var genericModalEl = document.getElementById("exampleModal");
  var modal = bootstrap.Modal.getInstance(genericModalEl);
  $.ajax({
    type: "POST",
    url: "accion/enviar_compra.php",
    data: registro,
    complete: function (xhr, textStatus) {
      //se llama cuando se recibe la respuesta (no importa si es error o éxito)
      console.log("La respuesta regreso");
    },
    success: function (msg) {
      console.log(msg);

      // Espera a que el documento esté listo
      $(document).ready(function () {
        // Maneja el clic en el botón dentro del modal
        $(".cerraryRecargar").on("click", function () {
          // Cierra el modal
          $("#exampleModal").modal("hide");
          // Recarga la página
          location.reload(true);
        });
      });
    },
    error: function (xhr, textStatus, errorThrown) {
      console.error(
        "Error en la solicitud Ajax: " + textStatus + " - " + errorThrown
      );
      console.log(xhr.responseText); //muestra en la consola del navegador todos los errores
    },
  });
}

function cambiarEstadoCancelado(idcompra, idcompraestado, idcompraestadotipo) {
  //Ocultar modal
  let registro = {
    idcompraestado: idcompraestado,
    idcompraestadotipo: idcompraestadotipo,
    idcompra: idcompra,
  };
  var genericModalEl = document.getElementById("exampleModal");
  var modal = bootstrap.Modal.getInstance(genericModalEl);
  $.ajax({
    type: "POST",
    url: "accion/cancelar_compra.php",
    data: registro,
    complete: function (xhr, textStatus) {
      //se llama cuando se recibe la respuesta (no importa si es error o éxito)
      console.log("La respuesta regreso");
    },
    success: function (msg) {
      console.log(msg);

      // Espera a que el documento esté listo
      $(document).ready(function () {
        // Maneja el clic en el botón dentro del modal
        $(".cerraryRecargar").on("click", function () {
          // Cierra el modal
          $("#exampleModal").modal("hide");
          // Recarga la página
          location.reload(true);
        });
      });
    },
    error: function (xhr, textStatus, errorThrown) {
      //called when there is an error
      console.error(
        "Error en la solicitud Ajax: " + textStatus + " - " + errorThrown
      );
      console.log(xhr.responseText); //muestra en la consola del navegador todos los errores
    },
  });
}

function enviarDatos(idCompra, ultimoIdCompraEstado) {
  var idCompraEstadoTipo = $("#estado-" + idCompra).val();
  $.ajax({
    type: "POST",
    url: "./accion/actualizarEstado.php",
    data: {
      idCompraEstado: ultimoIdCompraEstado,
      idCompraEstadoTipo: idCompraEstadoTipo,
      idCompra: idCompra,
    },
    success: function (response) {
      accionSuccess();
    },
    error: function (error) {
      console.log("Error:", error);
    },
  });
}
