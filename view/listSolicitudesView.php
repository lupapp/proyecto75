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
        <li class="breadcrumb-item active">Solicitudes de pago </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
          <div class="card-header">Historial Solicitudes <?php echo Session::get('nombre')." / ".Session::get('user'); ?>
          </div>
        <div class="card-body">
            <?php 
            if(count($solicitudes)==1){
                echo "<div  class='text-center text-primary w-100'>Este usuario no tiene historial de solicitudes</div>";
            }else{?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID solicitud</th>
                  <th>ID membresía</th>
                  <th>Valor solicitado</th>
                  <th>Fecha solicitud</th>
                  <th>Fecha de pago</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID solicitud</th>
                  <th>ID membresía</th>
                  <th>Valor solicitado</th>
                  <th>Fecha solicitud</th>
                  <th>Fecha de pago</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                <?php 
                for ($i=1;$i<count($solicitudes); $i++){ ?>
                <tr>
                    <td><?php echo $solicitudes[$i]->id?></td>
                    <td><?php echo $solicitudes[$i]->id_cartilla?></td>
                    <td>$ <?php echo $solicitudes[$i]->valor?></td>
                    <td><?php echo $solicitudes[$i]->fecha_solicitud?></td>
                    <td><?php echo $solicitudes[$i]->fecha_pago?></td>
                    <td>
                        <?php switch($solicitudes[$i]->estado){
                           case 0: echo 'Pendiente';
                               break;
                           case 1: echo 'Pagada';
                               break;
                           case 2: echo 'Rechazada';
                               break;
                        }
                    ?></td>
                    <td>
                        <?php 
                        if(Session::get('level')=='admin'){ ?>
                            
                            <a class="btn btn-danger btn-options" data-toggle="modal" data-target="#eliminarModal" title="Eliminar comisión" ><i class="fa fa-trash"></i></a>
                           
                            <a class="btn btn-warning btn-options" data-toggle="tooltip" title="Editar comisión" href="?controller=Usuarios&action=show&id=<?php echo $user['comision']->id ?>"><i class="fa fa-pencil"></i></a>
                            <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
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
                                       <a class="btn btn-danger btn-options" data-toggle="tooltip" title="Eliminar usuario" href="?controller=Usuarios&action=borrar&id=<?php echo $user['users']->id ?>"><i class="fa fa-trash"></i></a>
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