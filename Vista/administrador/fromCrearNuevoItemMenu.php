<?php
include_once("../../configuracion.php");
$tituloPagina = "TechnoMate | Administrador";
include_once '../estructura/headSeguro.php';
include_once '../estructura/navSeguro.php';

?>
<div class="contenido-pagina">
   <div class=" text-center w-50 p-3">
      <h5 id="respuesta"></h5>
   </div>
   <div class="container d-flex justify-content-center p-3 ">
      <div class="card text-center w-50 mb-3 ">
         <div class="card-header text-bg-dark mb-3">
            <h5>Ingrese el nuevo Item Menu</h5>
         </div>
         <div class="card-body">
            <form name="actualizarMenu" id="actualizarMenu" method="POST" action="Accion/crearNuevoItemMenu.php">
               <div class="contenedor-dato">
                  <label for="menombre" class="col-form-label">Nombre</label>
                  <input type="text" name="menombre" id="menombre" class="form-control form-control-sm" required></input>
                  <br>

                  <label for="medescripcion" class="col-form-label">Descripcion</label>
                  <input type="text" name="medescripcion" id="medescripcion" class="form-control form-control-sm" required></input>

                  <br>
                  <label for="idpadre" class="col-form-label">Menu Padre(ingrese uno existente,luego modifica)</label>
                  <input type="text" name="idpadre" id="idpadre" class="form-control form-control-sm" required></input>
                  <br>
                  <label for="medeshabilitado" class="col-form-label">Desabhilitado(fecha actual o null)</label>
                  <input type="text" name="medeshabilitado" id="medeshabilitado" class="form-control form-control-sm" required></input>

                  <div class="card-footer text-body-secondary">
                     <button type="submit" id="realizarCambios" class="btn text-white  btn-dark">Guardar Cambios</button>
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