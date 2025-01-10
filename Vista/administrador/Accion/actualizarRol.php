<?php
include_once '../../../configuracion.php';
$datos = data_submitted();

$objRol = new AbmRol();

if ($objRol->modificar($datos)) {
  header('Location: ../listarRol.php');
} else {
  header('Location: ../gestionMenu.php');
}
