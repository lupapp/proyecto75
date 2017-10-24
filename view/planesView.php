<!DOCTYPE html>
<html lang="en">

<head>
  <?php if(Session::get('level')=='admin'){  
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
        <li class="breadcrumb-item active">Planes </li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-users"></i> Lista de Planes
          <a class="btn btn-success float-right" href="?controller=Planes&action=create">Nuevo Plan</a></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Avatar</th>
                  <th>Nombre plan</th>
                  <th>Valor</th>
                  <th>% comisión</th>
                  <th>Valor bono</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Avatar</th>
                  <th>Nombre plan</th>
                  <th>Valor</th>
                  <th>% comisión</th>
                  <th>Valor bono</th>
                  <th>Opciones</th>
                </tr>
              </tfoot>
              <tbody>
                <?php 
                foreach ($allplanes as $planes){ ?>
                <tr>
                    <td><img class="img-thumbnail" src="view/img/<?php echo $planes->avatar_plan?>"></td>
                    <td><?php echo $planes->nombre_plan?></td>
                    <td><?php echo $planes->valor_plan?></td>
                    <td><?php echo $planes->porcentaje_comision?></td>
                    <td><?php echo $planes->valor_bono?></td>
                    <td>
                        <a class="btn btn-danger btn-options" data-toggle="tooltip" title="Eliminar plan" href="?controller=Planes&action=borrar&id=<?php echo $planes->id?>"><i class="fa fa-trash"></i></a>
                        <a class="btn btn-warning btn-options" data-toggle="tooltip" title="Editar plan" href="?controller=Planes&action=show&id=<?php echo $planes->id?>"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                      
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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