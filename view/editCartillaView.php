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
        <li class="breadcrumb-item active">Editar membresía <?php echo $cartilla->id ?> </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
           <i class="fa fa-users"></i> Editar Fecha membresía
        </div>
        <div class="card-body">
        
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>ID membresía</tr>
                <tr>
                    <!--<th>Usuario que refiere</th>-->
                    <th>Cambie fecha de vencimiento</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <form action="?controller=Cartillas&action=updateCartilla" method="POST">
                    <td>
                        <div class="input-group">
                            <div class="form-control"><?php echo $_GET['id']?></div>
                            <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                        </div>
                    </td>
                    <td>
                        <div class="input-group date fj-date">
                            <input type="text" name="fv" class="form-control" value="<?php echo $cartilla->fecha_vencimiento ?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </td>
                    <td>        
                        <button class="btn btn-success btn-options" data-toggle="tooltip" title="Seleccionar membresía como padre" >Guardar <i class="fa fa-arrow-right"></i></button>
                    </td>
                    </form>
                </tr>
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
    <?php include 'logoutModal.php'; ?>
    <!-- Bootstrap core JavaScript-->
     <?php include "footer.php"; ?>
  </div>
</body>

</html>
