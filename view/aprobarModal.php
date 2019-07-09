<div class="modal fade" id="aprobarModal<?php echo $idmodal ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro de aprobar la membresía?
</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Antes de aprobar debe estar seguro de que el usuario pago la membresía.</div>
        <div class="modal-footer">
          
            <form action="?controller=Cartillas&action=aprobar" method="POST">
                <input type="hidden"  name="idPago[]" value="<?php echo $pago_id ?>" >
                <div class="row">
                  <div class="col-md-3">
                  <a class="btn btn-secondary" type="button" data-dismiss="modal">No aprobar</a>
                  </div>
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-<?php echo $color?>" value="">Aprobar Membresía </small>   </button>
                  </div>
                </div>
            </form>
            
        </div>
      </div>
    </div>
  </div>

