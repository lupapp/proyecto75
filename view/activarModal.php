<div class="modal fade" id="activarModal<?php echo $idmodal ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro de activar la membresía?
</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Antes de activar debe estar seguro de que el usuario pago la renovación de la membresía.</div>
        <div class="modal-footer">
          
            <form action="?controller=Cartillas&action=cambioFecha&id=<?php echo $idCartilla ?>&valor=<?php echo $valor ?>" method="POST">
                <input type="hidden"  name="id" value="<?php echo $idCartilla ?>" >
                <input type="hidden"  name="idPago" value="<?php if(isset($pago_id)){ echo $pago_id;}else{} ?>" >
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                        <label for="exampleInputName">Fecha de vencimiento <small class="text-danger">(Si quiere que la activación sea reiniciada cambie esta fecha y el sistema sumara un mes para la activación)</small></label>
                        <div class="input-group date fj-date">
                            <input type="text" name="fecha" class="form-control" value="<?php echo $fecha_vencimiento?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <a class="btn btn-secondary" type="button" data-dismiss="modal">No activar</a>
                  </div>
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-<?php echo $color?>" value="">Activar <small>Fecha de vemcimiento: <?php echo $fecha_vencimiento?> </small>   </button>
                  </div>
                </div>
                
            </form>
            
        </div>
      </div>
    </div>
  </div>

