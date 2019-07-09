<!DOCTYPE html>
<html lang="en">


<head>
  <?php 
  if(Session::get('level')=='admin'){  
    include "header.php";
  }else{
    include "headerSt.php"; 
  } ?>
    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="?controller=Main" class="text-success">Back Office</a>
              </li>
              <li class="breadcrumb-item active">Ascender membresía </li>
            </ol>
          <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <div class="p-3 mb-2 bg-info text-white text-uppercase font-weight-bold">
                        <i class="fa fa-user"></i> <?php echo $user[0]->user." / ".$user[0]->name; ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6"
                                <ul class="list-group">
                                    <li class="list-group-item active">Fecha de creación: <?php echo $cartillas[0]->fecha_creacion ?></li>
                                    <li class="list-group-item">Membresía número: <?php echo $cartillas[0]->id ?> 
                                    </li>
                                    <li class="list-group-item">Valor actual membresía $ <?php echo $_GET['valor'] ?></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <form action="?controller=Cartillas&action=ascenderMembresia" method="POST">
                                 <div class="form-group">
                                     <input type="hidden" name="id_cartilla" value="<?php echo $cartillas[0]->id ?>">
                                    <select class="custom-select w-75 pt-0 pb-0 pr-4 pl-4" name="id_plan">
                                    <?php 
                                    for ($j=0; $j<count($plan);$j++){ ?>
                                        <option value="<?php echo $plan[$j]->id ?>"><?php echo $plan[$j]->nombre_plan ?></option>
                                    <?php } ?>
                                    </select>
                                 </div>
                                  <button class="btn btn-success">Ascender a siguiente membresía</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include "logoutModal.php"; ?>
    <!-- Bootstrap core JavaScript-->
     <?php include "footer.php"; ?>
</body>

</html>