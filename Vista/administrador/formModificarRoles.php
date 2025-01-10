<?php
include_once("../../configuracion.php");
$tituloPagina = "TechnoMate | Administrador";
include_once '../estructura/headSeguro.php';
include_once '../estructura/navSeguro.php';

$datos = data_submitted();

$objUsuario = new AbmUsuario();
$usuario = $objUsuario->buscar($datos);

$objUsuarioRol = new AbmUsuarioRol();
$usuarioRol = $objUsuarioRol->buscar($datos);

$n = count($usuarioRol);

?>

<div class="container" style="padding: 50px;">
    <form name="actualizarUsuario" id="actualizarUsuario" method="POST" action="Accion/modificarRol.php"
        class="needs-validation" novalidate>
        <h3 class="text-dark">Usuario seleccionado</h3>
        <br>

        <div class="contenedor-dato">
            <label for="idusuario" class="form-label">ID de usuario</label>
            <input type="text" name="idusuario" id="idusuario" class="form-control" value="<?php echo $usuario[0]->getIdUsuario() ?>" readonly></input>
        </div>
        <br>

        <div class="contenedor-dato">
            <label for="usnombre" class="form-label">Nombre de usuario</label>
            <input type="text" name="usnombre" id="usnombre" class="form-control" value="<?php echo $usuario[0]->getUsNombre() ?>" readonly></input>
        </div>
        <br>

        <div class="contenedor-dato">
            <h5>Roles actuales: <?php echo $n ?></h5>
            <p><?php
                if ($n > 0) {
                    foreach ($usuarioRol as $rol) {
                        echo $rol->getObjRol()->getRolDescripcion() . " | ";
                    }
                } else {
                    echo "Ningún rol asignado.";
                }
                ?>
            </p>
        </div>
        <br>

        <h4>Dar roles</h4>
        <div class="contenedor-dato">
            <label for="usnombre" class="form-label">Administrador</label>
            <input type="checkbox" name="Admin" value="Admin">
            <br>
            <label for="usnombre" class="form-label">Depósito</label>
            <input type="checkbox" name="Deposito" value="Deposito">
            <br>
            <label for="usnombre" class="form-label">Cliente</label>
            <input type="checkbox" name="Cliente" value="Cliente">
            <br>
        </div>

        <div class="d-grid gap-2  col-6 mx-auto">
            <input type="submit" value="Enviar" class="btn text-white  btn-dark"></input>
        </div>
    </form>
    <div class="d-flex justify-content-end">
        <a href="./listarUsuarios.php"><input type="submit" value="Cancelar" class="btn  my-4 text- white btn-danger">
            </input></a>
    </div>
</div>

<?php
include_once '../estructura/footer.php';
?>