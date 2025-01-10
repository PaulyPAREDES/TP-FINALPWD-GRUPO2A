<?php
include_once '../../configuracion.php';

$datos = data_submitted();

$objUsuario = new AbmUsuario();

$passEncriptada = md5($datos['uspass']);
$datos['uspass'] = $passEncriptada;
$datos['usdeshabilitado'] = null;

$param['idusuario'] = $datos['idusuario'];

$usuario = $objUsuario->buscar($param);

if (!empty($usuario)) {
    if ($objUsuario->modificar($datos)) {
        $_SESSION['usnombre'] = $datos['usnombre'];
        header('Location: ../actInfoUsuarios/listarUsuarios.php?exito=' . $datos['usnombre']);
    }
} else {
    header('Location: ../actInfoUsuarios/formActualizar.php?idusuario=' . $datos['idusuario']);
}
