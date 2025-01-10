<?php
include_once("../../configuracion.php");
$tituloPagina = "TechnoMate | Administrador";
include_once '../estructura/headSeguro.php';
include_once '../estructura/navSeguro.php';

?>
<div class="contenido-pagina">
   <div>
      <h4 id="respuesta"></h4>
   </div>
   <div class="container d-flex justify-content-center p-3 ">
      <div class="card text-center w-50 mb-3 ">
         <div class="card-body">
            <form name="formLogin" id="formLogin" method="POST" class="needs-validation" action="Accion/crearNuevoRol.php">

               <div class="card-header text-bg-dark mb-3">
                  <h5> Nuevo Rol</h5>
               </div>

               <div class="card-body">
                  <input type="text" class="form-control form-control-sm" id="idrol" name="idrol" value="0" readonly>
                  <br>
                  <label for="emailUsuario" class="col-form-label">Descripcion del Rol</label>
                  <input type="text" class="form-control form-control-sm" id="rodescripcion" name="rodescripcion" required>
                  <br>
                  <div class="card-footer text-body-secondary">
                     <input type="submit" class="btn btn-dark" value="Crear Rol"></input>
                  </div>
               </div>

            </form>
         </div>
      </div>

   </div>
   <div class="d-flex justify-content-center">
      <a href="gestionMenu.php"><input type="submit" value="Volver" class="btn btn-secondary">
   </div>
</div>

<?php
include_once '../estructura/footer.php';
?>