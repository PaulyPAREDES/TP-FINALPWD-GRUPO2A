<?php
include_once("../../../configuracion.php");
$datos = data_submitted();//Recibe idcompraitem 

$objCompraItem = new AbmCompraItem();
$agregar = $objCompraItem->baja($datos);
if($agregar){
    echo "Item Borrado del Carrito";
}else{
    echo "Algo Fallo";
}

?>