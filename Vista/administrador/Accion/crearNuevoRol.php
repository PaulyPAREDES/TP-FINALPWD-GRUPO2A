<?php
include_once '../../../configuracion.php';

// Encapsulo los datos para crear usuario nuevo
$datos = data_submitted();

$objRol = new AbmRol();
$exito = $objRol->alta($datos);

if ($exito) {
    echo "Rol Creado";
    header('Location: ../listarRoles.php');
} else {
    echo "Rol NO Creado";
}
