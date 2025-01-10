function abrirModal(idmenu) {
  console.log("anda esto");
  // Mostramos el modal de advertencia
  $("#modalMenu").modal("show");

  // Configuramos el evento para el botón "Aceptar" dentro del modal
  $("#aceptar").on("click", function () {
    console.log("Botón Aceptar del modal presionado");
    window.location.href = "Accion/deshabilitarMenu.php?idmenu=" + idmenu;
  });
}
