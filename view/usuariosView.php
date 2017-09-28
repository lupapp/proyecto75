<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "header.php";?>
</head>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Usuarios </li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Lista de usuarios
          <a class="btn btn-success float-right" href="?controller=Usuarios&action=create">Nuevo Usuario</a></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Celular</th>
                  <th>ciudad</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Celular</th>
                  <th>ciudad</th>
                  <th>Opciones</th>
                </tr>
              </tfoot>
              <tbody>
                <?php 
                foreach ($allusers as $user){ ?>
                <tr>
                    <td><?php echo $user->name?></td>
                    <td><?php echo $user->email?></td>
                    <td><?php echo $user->telefono?></td>
                    <td><?php echo $user->celular?></td>
                    <td><?php echo $user->ciudad?></td>
                    <td>
                        <a class="btn btn-danger btn-options" data-toggle="tooltip" title="Eliminar usuario" href="?controller=Usuarios&action=borrar&id=<?php echo $user->id ?>"><i class="fa fa-trash"></i></a>
                        <a class="btn btn-warning btn-options" data-toggle="tooltip" title="Editar usuario" href="?controller=Usuarios&action=show&id=<?php echo $user->id ?>"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-primary btn-options" data-toggle="tooltip" title="Cartillas usuario"><i class="fa fa-bookmark"></i></a>
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