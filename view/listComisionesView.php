<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
  if(Session::get('level')=='admin'){  
    include "header.php";
  }else{
    include "headerSt.php"; 
  } ?>
</head>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="?controller=Main">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Comisiones </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
          <div class="card-header">Historial Comisiones <?php echo $user[0]->user." / ".$user[0]->name; ?>
          <div class="btn btn-success float-right">Cobrar</div>
          </div>
        <div class="card-body">
            <?php 
            if(!isset($comisiones[1])){
                echo "<div  class='text-center text-primary w-100'>Este usuario no tiene historial de comisiones</div>";
            }else{?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mebresía</th>
                  <th>Fecha</th>
                  <th>Fecha de cobro</th>
                  <th>Valor</th>
                  <th>Usuario generador</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Mebresía</th>
                  <th>Fecha</th>
                  <th>Fecha de cobro</th>
                  <th>Valor</th>
                  <th>Usuario generador</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                <?php 
                for($i=1; $i<count($comisiones); $i++){ ?>
                <tr>
                    <td><?php echo $comisiones[$i]['userDatos']->nombre_plan." ".$comisiones[$i]['userDatos']->valor_plan?></td>
                    <td><?php echo $comisiones[$i]['comision']->fecha?></td>
                    <td><?php echo $comisiones[$i]['comision']->fecha_cobro?></td>
                    <td><?php echo $comisiones[$i]['comision']->valor?></td>
                    <td><?php echo $comisiones[$i]['userDatos']->user." | ".$comisiones[$i]['userDatos']->name?></td>
                    <td>
                        <?php switch($comisiones[$i]['comision']->estado){
                           case 0: echo 'Cobrada';
                               break;
                           case 1: echo 'Disponible';
                               break;
                           case 2: echo 'Retenida';
                               break;
                        }
                    ?></td>
                    <td>
                        <?php 
                        if(Session::get('level')=='admin'){ ?>
                            
                            <a class="btn btn-danger btn-options" data-toggle="modal" data-target="#eliminarModal<?php echo $comisiones[$i]['comision']->id ?>" title="Eliminar comisión" ><i class="fa fa-trash"></i></a>
                           
                            <a class="btn btn-warning btn-options" data-toggle="tooltip" title="Editar comisión" href="?controller=Comisiones&action=editar&id=<?php echo $comisiones[$i]['comision']->id ?>"><i class="fa fa-pencil"></i></a>
                            <div class="modal fade" id="eliminarModal<?php echo $comisiones[$i]['comision']->id ?>" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-danger" id="exampleModalLabel">Eliminar Usuario</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Esta seguro de eliminar el usuario?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <a class="btn btn-danger btn-options" data-toggle="tooltip" title="Eliminar usuario" href="?controller=Comisiones&action=borrar&id=<?php echo $comisiones[$i]['comision']->id ?>"><i class="fa fa-trash"></i></a>
                                    </div>
                                  </div>
                                </div>
                             </div>
                        <?php } ?>
                    </td>
                </tr>
                      
                <?php } ?>
              </tbody>
            </table>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include "logoutModal.php"; ?>
    <!-- Bootstrap core JavaScript-->
     <?php include "footer.php"; ?>
  </div>
</body>

</html>