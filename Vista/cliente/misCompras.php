<?php
include_once("../../configuracion.php");
$texto = 'mis compras';
$tituloPagina = "TechnoMate | " . $texto;
include_once("../estructura/headSeguro.php");
include_once("../estructura/navSeguro.php");

$objCompra = new AbmCompra();
$objProducto = new AbmProducto();
$objUsuario = new AbmUsuario();
$objAbmCompraEstado = new AbmCompraEstado();
$objAbmCompraItem = new AbmCompraItem();

//valida la session
$idusuario = $_SESSION['idusuario'];
$param1["idusuario"] = $idusuario;
$usuario = $objUsuario->buscar($param1);

?>

<div class="container">
  <h3 class="text-center p-4">Historial de compras del Cliente <?php echo $usuario[0]->getUsNombre() ?></h3>
  <?php

  // Buscar todas las compra de un usuario.

  $param["idusuario"] = $idusuario;
  $arrayComprasDeUnUsuario = $objCompra->buscar($param);

  foreach ($arrayComprasDeUnUsuario as $compra) {
    echo "
  
  <div class='container align-items-center' style='margin-top: 20px;'>
  
  <table class='table table-hover table-bordered'>
    <thead class=''>
      <thead class='table-dark'>
        <th colspan='4'scope='col'>idCompra:{$compra->getIdCompra()}</td>
      </thead>
    </thead>

      <tr class='table-dark'>
        <td>Id Producto</td>
        <td>Descripción</td>
        <td>Precio</td>
        <td>Cantidad</td>
      </tr>
    ";

    $param2['idcompra'] = $compra->getIdCompra();
    $arrayComprasItems = $objAbmCompraItem->buscar($param2);

    foreach ($arrayComprasItems as $compraItem) {
      $idProducto = $compraItem->getObjProducto()->getIdProducto();
      $getProNombre = $compraItem->getObjProducto()->getProNombre();
      $precio = $compraItem->getObjProducto()->getProDetalle();
      $cantidad = $compraItem->getCiCantidad();

      echo "
      <tr>
        <td>{$compraItem->getObjProducto()->getIdProducto()}</td>
        <td>{$compraItem->getObjProducto()->getProNombre()}</td>
        <td>{$compraItem->getObjProducto()->getProDetalle()}</td>
        <td>{$compraItem->getCiCantidad()}</td>
      </tr>";
    }

    $param['idcompra'] = $compra->getIdCompra();
    $objAbmCompraEstado = new AbmCompraEstado();
    $arrayCompraEstados =  $objAbmCompraEstado->buscar($param);

    echo "
 <table class='table table-hover table-bordered'>
  <thead>
    <th>estado</th>
    <th>fechaIni</th>
    <th>fechaFinal</th>
  </thead>
  <tbody>
  ";
    /*Buscar los estados de las compras*/
    foreach ($arrayCompraEstados as $compraEstados) {

      echo "
    <tr>
      <td>{$compraEstados->getObjCompraEstadoTipo()->getDescripcion()}</td>
      <td>{$compraEstados->getCeFechaIni()}</td>
      <td>{$compraEstados->getCeFechaFin()}</td>      
    </tr>
  ";
    }

    echo "
</tbody>
</table>
";
  }
  echo "
     </tbody>
   </table>
   </div>
</div>
   ";

  include_once("../estructura/footer.php");
  ?>