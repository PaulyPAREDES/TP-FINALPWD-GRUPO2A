<div class="row">
  <div class="col-md-12 col-lg-12">
    <div class="items">
      <?php
      include_once "../../../configuracion.php";
      $datos = data_submitted();
      $objCntrlCI = new AbmCompraItem();
      $suma = 0;
      $items = $objCntrlCI->buscar($datos);
      if (count($items) > 0) {
        foreach ($items as $item) {

      ?>
          <div class="product">
            <div class="row my-4">
              <div class="col-md-2 d-flex">
                <img src="<?php echo $item->getObjProducto()->getImagenProducto(); ?>" class="img-fluid mx-auto d-flex image">
              </div>
              <div class="col-md-10">
                <div class="info">
                  <div class="row">
                    <div class="col-md-5 product-name">
                      <div class="product-name">
                        <div class="product-info">
                          <div><strong>Marca: </strong>
                            <span class="value"><?php echo $item->getObjProducto()->getPronombre(); ?></span>
                          </div>
                          <div><strong>Cantidad:</strong>
                            <span class="value"><?php echo $item->getCicantidad(); ?></span>
                          </div>
                          <div>
                            <strong>Precio:</strong>
                            <span> <?php echo $item->getObjProducto()->getProDetalle(); ?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php
          $suma = $suma + $item->getObjProducto()->getProDetalle() * $item->getCiCantidad();
        }
      }
      ?>
      <div class="summary">
        <h4 class="text-start fs-4" class="">Resumen de compra</h4>
        <!--<label>ID Compra:</label>-->
        <!-- <p class="text-start fs-6">
                ID Compra:&nbsp;<?php echo $datos["idcompra"]; ?></br>
                ID Estado compra:&nbsp;<?php echo $datos["idcompraestado"]; ?></br>
                Id Estado tipo: &nbsp;<?php echo $datos["idcompraestadotipo"]; ?>  </br> </p> -->
        <div class="summary-item">
          <p class="text-start fs-4"><strong>Total:</strong> <span class="text-start text-success fs-4">$<?php echo $suma; ?></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" id="BotonAceptar" class="btn btn-success cerraryRecargar" onclick="cambiarEstado(<?php echo $datos['idcompra']; ?>,<?php echo $datos['idcompraestado']; ?>,<?php echo $datos['idcompraestadotipo']; ?>)">Aceptar</button>
          <button type="button" id="BotonEnviar" class="btn btn-success cerraryRecargar" onclick="cambiarEstado(<?php echo $datos['idcompra']; ?>,<?php echo $datos['idcompraestado']; ?>,<?php echo $datos['idcompraestadotipo']; ?>)">Enviar</button>
          <button type="button" id="BotonCancelar" class="btn btn-danger cerraryRecargar" onclick="cambiarEstadoCancelado(<?php echo $datos['idcompra']; ?>,<?php echo $datos['idcompraestado']; ?>,<?php echo $datos['idcompraestadotipo']; ?>)">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>