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
          <a href="?controller=Main" class="text-success">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Categorías</li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-users"></i> Lista de Categorías
          <a class="btn btn-success float-right" href="?controller=Categorias&action=create">Nueva </a></div>
          
        <div class="card-body">
          <div class="table-responsive">
              <?php
              if (count($categorias)>0){ ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Popsición</th>
                  <th>Opciones</th>
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th>Nombre</th>
                  <th>Popsición</th>
                  <th>Opciones</th>
                </tr>
              </tfoot>
              <tbody>
                <?php 
                
                foreach($categorias as $categoria){ ?>
                <tr>
                    <td class="w-10"><img class="img-thumbnail" src="view/img/<?php echo $categoria->img ?>" alt="<?php echo $categoria->img ?>"></td>
                    <td><?php echo $categoria->nombre?></td>
                    <td><?php echo $categoria->posicion?></td>
                    
                    <td>
                        <a class="btn btn-warning btn-options" data-toggle="tooltip" title="Editar categoría" href="?controller=Categorias&action=show&id=<?php echo $categoria->id?>"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger btn-options" data-toggle="modal" data-target="#<?php echo $categoria->id ?>" title="Eliminar categoria" ><i class="fa fa-trash"></i></a>
                        <div class="modal fade" id="<?php echo $categoria->id ?>" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger" id="exampleModalLabel">Eliminar categoría</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Esta seguro de eliminar el esta categoría?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a class="btn btn-danger btn-options" data-toggle="tooltip" title="Eliminar categoría" href="?controller=Categorias&action=borrar&id=<?php echo $categoria->id ?>"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                      
                <?php }
              }else{
                        echo "<center>No existen membresías</center>";
              } ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
       
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
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