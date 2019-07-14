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
        <li class="breadcrumb-item active">Nueva Categoría</li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-tags"></i> Registro de nueva categoría</div>
        <div class="card-body">
            <form id="loginForm" action="?controller=Categorias&action=crear" method="POST"  class="form-horizontal" >
                <div class="form-row">
                    <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleInputName">*Nombre de categoría</label>
                            <input class="form-control" id="exampleInputNombre" type="text" name="nombre" aria-describedby="nombre" placeholder="Nombre categoría">
                            </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleInputName">*Posición</label>
                            <input class="form-control" id="exampleInputPosicion" type="text" name="posicion" aria-describedby="posicion" placeholder="Posición de la categoría">
                            </div>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary float-right cursor-pointer" >Registrar</button>
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
