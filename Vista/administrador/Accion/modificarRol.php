<?php
include_once '../../../configuracion.php';
$datos = data_submitted();
$objUsuario = new AbmUsuario();
$usuario = $objUsuario->buscar($datos);

$idUsuario = $usuario[0]->getIdUsuario();
$datos['usdeshabilitado'] = "'0000-00-00 00:00:00'";

$objUsuarioRol = new AbmUsuarioRol();
$paramUsuarioRol['idusuario'] = $idUsuario;

if (array_key_exists('Cliente', $datos)) {
    $paramUsuarioRol['idrol'] = 3;
    $objUsuarioRol->alta($paramUsuarioRol);
}
if (array_key_exists('Deposito', $datos)) {
    $paramUsuarioRol['idrol'] = 2;
    $objUsuarioRol->alta($paramUsuarioRol);
}
if (array_key_exists('Admin', $datos)) {
    $paramUsuarioRol['idrol'] = 1;
    $objUsuarioRol->alta($paramUsuarioRol);
}

echo "<script>alert('Rol Modificado');</script>";
header('Location: ../listarUsuarios.php');
