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
        <li class="breadcrumb-item active">Cambio de contraseña</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-key"></i> Cambiar contraseña</div>
        <div class="card-body">
            <form id="loginForm" action="?controller=Usuarios&action=cambiopass" method="POST"  class="form-horizontal" >
                    <div class="form-row">
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputPassword">*Nueva Contraseña</label>
                                <input type="hidden" name="id" value="<?php echo Session::get('id') ?>">
                                <input class="form-control" id="exampleInputName" type="password" name="password" aria-describedby="password" placeholder="Ingre la nueva contraseña">
                             </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputConfirmPassword">*Repita Contraseña</label>
                                <input class="form-control" id="exampleInputEmail1" type="password" name="confirmPassword" aria-describedby="confirmPassword" placeholder="Confirme la contraseña">
                            </div>
                        </div>
                         
                    </div>
                  
                <button type="submit" class="btn btn-primary float-right cursor-pointer" >Cambiar</button>
                <a href="javascript:history.back(1)" class="btn btn-success float-right cursor-pointer mr-2" >Regresar</a>
            </form>
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
    <?php include 'logoutModal.php'; ?>
    <!-- Bootstrap core JavaScript-->
     <?php include "footer.php"; ?>
  </div>
</body>

</html>
