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
        <li class="breadcrumb-item active">Nuevo Cartilla</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-user-plus"></i> Crear cartilla</div>
        <div class="card-body">
            <form id="loginForm" action="?controller=Planes&action=crear" method="POST"  class="form-horizontal" enctype="multipart/form-data" >
                    <div class="form-row">
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputPlan">*Seleccionar plan</label>
                                <input class="form-control" id="exampleInputPlan" type="text" name="plan" aria-describedby="plan" placeholder="Nombre de plan">
                             </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputValor">*Usuario</label>
                                 <select class="form-control selectpicker"  data-live-search="true" data-show-content="false" data-hide-disabled="false">
                                        <?php 
                                        foreach ($users as $u){ ?>
                                            <option value="<?php echo $u['id'] ?>"><?php echo $u['user']?></option>
                                        <?php } ?>
                                  </select>
                             </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputComision">*Porcentaje de comisión</label>
                                <input class="form-control" id="exampleInputComision" type="text" name="porcentaje" aria-describedby="porcentaje" placeholder="Porcentaje de comisión">
                            </div>
                        </div>
                         
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                             <div class="form-group">
                                <label for="exampleInputVencimiento">*Duración en días del plan</label>
                                <input class="form-control" id="exampleInputVencimiento" type="text" name="dias" aria-describedby="dias" placeholder="Escriva la cantidad de días que dura el plan">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEstado">*Estado</label>
                                <select class="form-control selectpicker2" data-live-search="true" name="estado" id="exampleInputEstado">
                                    <?php foreach ($planes as $p){?>
                                            <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre_plan'] ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputValorBono">Valor bono</label>
                                <input class="form-control" id="exampleInputValorBono" type="text" name="valor_bono" aria-describedby="valor_bono" placeholder="Valor del bono para este plan">
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputCant">Cantidad de usuarios para bono</label>
                            <input class="form-control" id="exampleInputCant" type="text" name="cant_users" aria-describedby="cant_users" placeholder="Escri el número de usuarios para ganar el bono">
                        </div>
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Avatar</label>
                                <input class="form-control" id="exampleInputEmail1" type="file" name="avatar" 
                                aria-describedby="file" 
                                placeholder="Documento de identidad">
                            </div>
                        </div>
                    </div>
                  <div class="form-row">
                    
                    
                  </div>
                <button type="submit" class="btn btn-primary float-right cursor-pointer" >Crear</button>
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
