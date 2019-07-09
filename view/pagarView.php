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
          <a href="?controller=Main" class="text-success">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Comisiones </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <form action="?controller=Comisiones&action=pagar" method="post">
      <div class="card mb-3">
          <div class="card-header">Solicitudes pendientes
              <div ><button type="submit" class="btn btn-success float-right">Pagar</button></div>
         </div>
        <div class="card-body">
            <?php 
            if(count($sol)==1){
                echo "<div  class='text-center text-primary w-100'>No hay historial de solicitudes</div>";
            }else{?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID membresía</th>
                  <th>Usuario</th>
                  <th>Padre</th>
                  <th>Valor</th>
                  <th>Fecha solicitud</th>
                  <th>Fecha pago</th>
                  <th>Estado</th>
                  <th><input type="checkbox" class="all"></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID membresía</th>
                  <th>Usuario</th>
                  <th>Padre</th>
                  <th>Valor</th>
                  <th>Fecha solicitud</th>
                  <th>Fecha pago</th>
                  <th>Estado</th>
                  <th><input type="checkbox" class="all"></th>
                </tr>
              </tfoot>
              <tbody class="tbodySol">
                <?php
                for($i=1; $i<count($sol); $i++){ ?>
                <tr>
                    <td><?php echo $sol[$i]['solicitud']->id_cartilla?></td>
                    <td><?php echo $sol[$i]['usuario']->name?></td>
                    <td><?php
                        if(empty($sol[$i]['padre'])){
                            echo 'No tiene padre';
                        }else{
                            echo $sol[$i]['padre']->name;
                        }?></td>
                    <td>$ <?php echo $sol[$i]['solicitud']->valor ?></td>
                    <td><?php echo $sol[$i]['solicitud']->fecha_solicitud?></td>
                    <td><?php echo $sol[$i]['solicitud']->fecha_pago?></td>
                    <td>
                        <?php switch($sol[$i]['solicitud']->estado){
                           case 0: echo 'Pendiente';
                               break;
                           case 1: echo 'Paga';
                        }
                    ?></td>
                    
                    <td>
                        <input type="checkbox" name="idSolicitud[]" value="<?php echo $sol[$i]['solicitud']->id ?>" class="selectCom">
                    </td>
                </tr>
                      
                <?php } ?>
              </tbody>
            </table>
          </div>
          <?php } ?>
        </div>
      </div>
      </form>
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