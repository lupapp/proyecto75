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
          <a href="#">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Edición Plan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-user-plus"></i> Editando plan <a class="btn btn-warning float-right" href="?controller=Usuarios&action=resetPass&email=<?php echo $user->email ?>&id=<?php echo $user->id ?>">Resetear Contraseña</a></div>
        <div class="card-body">
             <form id="loginForm" action="?controller=Planes&action=update" method="POST"  class="form-horizontal" enctype="multipart/form-data" >
                    <div class="form-row">
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputPlan">*Nombre de plan</label>
                                <input value="<?php echo $plan->id ?>" type="hidden" name="id" >
                                <input value="<?php echo $plan->nombre_plan ?>" class="form-control" id="exampleInputPlan" type="text" name="plan" aria-describedby="plan" placeholder="Nombre de plan">
                             </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputValor">*Valor del plan</label>
                                <input value="<?php echo $plan->valor_plan ?>" class="form-control" id="exampleInputValor" type="text" name="valor_plan" aria-describedby="valor_plan" placeholder="Valor del plan">
                             </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputComision">*Porcentaje de comisión</label>
                                <input value="<?php echo $plan->porcentaje_comision ?>" class="form-control" id="exampleInputComision" type="text" name="porcentaje" aria-describedby="porcentaje" placeholder="Porcentaje de comisión">
                            </div>
                        </div>
                         
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                             <div class="form-group">
                                <label for="exampleInputVencimiento">*Duración en días del plan</label>
                                <input value="<?php echo $plan->dias_vencimiento ?>" class="form-control" id="exampleInputVencimiento" type="text" name="dias" aria-describedby="dias" placeholder="Escriva la cantidad de días que dura el plan">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEstado">*Estado</label>
                                <select class="form-control" name="estado" id="exampleInputEstado">
                                    <option><?php echo $plan->estado ?></option>
                                    <option>Activo</option>
                                     <option>Inactivo</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputValorBono">Valor bono</label>
                                <input value="<?php echo $plan->valor_bono ?>" class="form-control" id="exampleInputValorBono" type="text" name="valor_bono" aria-describedby="valor_bono" placeholder="Valor del bono para este plan">
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputCant">Cantidad de usuarios para bono</label>
                            <input value="<?php echo $plan->cant_users ?>" class="form-control" id="exampleInputCant" type="text" name="cant_users" aria-describedby="cant_users" placeholder="Escri el número de usuarios para ganar el bono">
                        </div>
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <img src="view/img/<?php echo $plan->avatar_plan ?>" class="img-thumbnail" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Avatar</label>
                                <input value="<?php echo $plan->avatar_plan ?>" class="form-control" id="exampleInputEmail1" type="file" name="avatar" 
                                aria-describedby="file" 
                                placeholder="<?php echo $plan->avatar_plan ?>">
                            </div>
                        </div>
                        
                    </div>
                  <div class="form-row">
                    
                    
                  </div>
                <button type="submit" class="btn btn-primary float-right cursor-pointer" >Guardar</button>
                <a href="javascript:history.back(1)" class="btn btn-success float-right cursor-pointer mr-2" >Regresar</a>
            </form>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    </div>
    <!-- Logout Modal-->
    <?php include 'logoutModal.php'; ?>
    <!-- Bootstrap core JavaScript-->
     <?php include "footer.php"; ?>
  </div>
</body>

</html>
