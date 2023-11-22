<?php
include_once("../../configuracion.php");
$tituloPagina = "TechnoMate | Administrador";
include_once '../estructura/headSeguro.php';
include_once '../estructura/navSeguro.php';

$objMenu = new AbmMenu();
$objMenuRol = new AbmMenuRol();//vinculo entre el menu y el rol
$objRol = new AbmRol();//para obtener el nombre del rol? Necesario?
$listMenu = $objMenu->buscar(null);

?>
<script src="../estructura/js/menus.js"></script>
<div class="contenido-pagina">
  <div class="container p-3">
    <button><i class="bi bi-database-fill-add"></i></button>
    <a class="btn  btn-secondary  text-decoration-none" href="formCrearNuevoRol.php">Crear un Nuevo Rol</a>
    <a class="btn btn-secondary text-decoration-none" href="formAccesoRol.php">Ver Roles</a> 
    <a class="btn  btn-secondary text-decoration-none" href="fromCrearNuevoItemMenu.php">Crear un Nuevo Item Menu</a>
 </div>
    <?php 
    if (count($listMenu)>0){
        echo '<table class="table table-striped  table-hover">
        <thead >
            <tr class="table-dark">  
              <th><strong>IdMenu</strong></th>
              <th><strong>menombre</strong></th>
              <th><strong>medescripcion</strong></th>
              <th><strong>idPadre Nacimiento</strong></th>
              <th><strong>meDesabhilitado</strong></th>
              <th><strong>Acciones</strong></th>
        
            </tr>
        </thead>
        <tbody>';
        foreach($listMenu as $objM){
            $idMenuPadre = 'null';
            $deshabilitado = 'null';
            $idmenu = $objM->getIdMenu();
            if ($objM->getMenuPadre() != NULL){
                $idMenuPadre = $objM->getMenuPadre()->getIdMenu();
            }
            if ($objM->getMeDeshabilitado() != NULL){
                $deshabilitado = $objM->getMeDeshabilitado();
            }
            echo '<tr>';
            echo '<td>'.$idmenu.'</td>';
            echo '<td>'.$objM->getMeNombre().'</td>';
            echo '<td>'.$objM->getMeDescripcion().'</td>';
            echo '<td>'.$idMenuPadre.'</td>';
            echo '<td>'.$deshabilitado.'</td>';
            echo '<td>'.'<a class="btn text-white btn-dark text-decoration-none" href="formEditarMenu.php?idmenu='.$idmenu.'">Editar</a>'.
            '<button class="btn btn-danger text-decoration-none" id="borrar" onclick="abrirModal('. $idmenu .')">Borrar</button>'
            .'</td>';
            echo '</tr>'; 
        }
        echo'</tbody>
        </table>';      
    }else{
        echo '<h4>No se han cargado menus.</h4>';  
        }
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="modalMenu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">
            Seguro que desea realizar un borrado?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>No se borrara permanentemente de la base de datos sino que se le realizara un borrado logico</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" id="aceptar">Entendido</button>
      </div>
    </div>
  </div>
</div>
<?php
include_once '../estructura/footer.php';
?>