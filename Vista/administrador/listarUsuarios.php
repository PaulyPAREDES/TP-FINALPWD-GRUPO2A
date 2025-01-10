<?php
include_once("../../configuracion.php");

$tituloPagina = "TechnoMate | Administrador";
include_once '../estructura/headSeguro.php';
include_once '../estructura/navSeguro.php';

$datos = data_submitted();

$objUsuario = new AbmUsuario();
$colUsuarios = $objUsuario->buscar("");

$objUsuarioRol = new AbmUsuarioRol();
$colUsuarioRol = $objUsuarioRol->buscar("");

?>
<div class="contenido-pagina ">

    <div class="container p-3">

        <?php
        if (!empty($colUsuarioRol)) {
            if (array_key_exists('exito', $datos)) {
                echo "<h3>Modificación realizada con éxito a: " . $datos['exito'] . "!</h3>";
            }

            echo "<h4 class='text-center text-white bg-dark p-2' >Listado de usuarios</h4>";
            echo "<table class='table table-striped table-hover'>";
            echo "<th>#</th>
    <th>Nombre de Usuario</th>
    <th>Modificar</th>";

            foreach ($colUsuarios as $usuario) {
                echo "<tr>
        <td>" . $usuario->getIdUsuario() . "</td>
        <td>" . $usuario->getUsNombre() . "</td>
        <td><a class='btn text-white btn-dark text-decoration-none' href='formModificarUsuarios.php?idusuario= " . $usuario->getIdusuario() . "'>Datos</a>
        <a class='btn text-white btn-dark text-decoration-none' href='formModificarRoles.php?idusuario= " . $usuario->getIdusuario() . "'>Roles</a>
        </td>
        </tr>";
            }
            echo "</table>";
        } else {
            echo "<h4>No hay usuarios cargados en la Base de Datos";
        }

        ?>

        <a href="./homeAdministrador.php"><input type="submit" value="Volver" class="btn btn-secondary">
            </input></a>
    </div>
</div>

<?php
include_once '../estructura/footer.php';
?>