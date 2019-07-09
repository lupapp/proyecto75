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
        <li class="breadcrumb-item active">Usuarios </li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-users"></i> Lista de usuarios
          <a class="btn btn-success float-right" href="?controller=Usuarios&action=create">Nuevo Usuario</a></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTableUser" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>ID Usuario</th>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Ciudad</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>ID Usuario</th>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Ciudad</th>
                  <th>Opciones</th>
                </tr>
              </tfoot>
              <tbody>
                <?php 
                foreach ($allusers as $user){ ?>
                <tr>
                    <td><?php echo $user['users']->id?></td>
                    <td><?php echo $user['users']->user?></td>
                    <td><?php echo $user['users']->name?></td>
                    <td><?php echo $user['users']->email?></td>
                    <td><?php echo $user['users']->telefono?></td>
                    <td><?php echo $user['users']->ciudad;?></td>
                    <td>
                        <?php if(isset($user['idsCar'])){}else{ ?>
                        <a class="btn btn-danger btn-options" data-toggle="modal" data-target="#<?php echo $user['users']->id ?>" title="Eliminar usuario" ><i class="fa fa-trash"></i></a>
                        <?php   } ?>    
                        <a class="btn btn-warning btn-options" data-toggle="tooltip" title="Editar usuario" href="?controller=Usuarios&action=show&id=<?php echo $user['users']->id ?>"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-primary btn-options" data-toggle="tooltip" title="Mebresías usuario" href="?controller=Cartillas&action=index&id=<?php echo $user['users']->id ?>"><i class="fa fa-bookmark"></i></a>
                        <a class="btn btn-success btn-options" data-toggle="tooltip" title="Crear membresía" href="?controller=Cartillas&action=create&id=<?php echo $user['users']->id?>"><i class="fa fa-plus"></i></a>
                        <a class="btn btn-info" data-toggle="tooltip" title="Ver comisiones" href="?controller=Cartillas&action=showComision&id=<?php echo $user['users']->id?>"><i class="fa fa-usd"></i></a>
                        <a class="btn btn-ttc btn-options" data-toggle="tooltip" title="Ver red" href="?controller=Cartillas&action=showRed&id=<?php echo $user['users']->id?>"><i class="fa fa-cubes"></i></a>
                       
                        
                        <div class="modal fade" id="<?php echo $user['users']->id ?>" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
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