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
        <li class="breadcrumb-item active">Nuevo membresía</li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-user-plus"></i> Registro de nueva membresía</div>
        <div class="card-body">
            <form id="loginForm" action="?controller=Planes&action=crear" method="POST"  class="form-horizontal" enctype="multipart/form-data" >
                    <div class="form-row">
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputPlan">*Nombre de membresía</label>
                                <input class="form-control" id="exampleInputPlan" type="text" name="plan" aria-describedby="plan" placeholder="Nombre de membresía">
                             </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputValor">*Valor del membresía</label>
                                <input class="form-control" id="exampleInputValor" type="text" name="valor_plan" aria-describedby="valor_plan" placeholder="Valor del membresía">
                             </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputValor">*Cantidad de hijos</label>
                                <input class="form-control" id="exampleInputValor" type="text" name="cant_hijos" aria-describedby="cant_hijos" placeholder="Numero de hijos">
                            </div>
                        </div>
                        
                    </div>
                      <div class="form-row">
                        <div class="col-md-3">
                             <div class="form-group">
                                <label for="exampleInputComision">*% comisión nivel 1</label>
                                <input class="form-control" id="exampleInputComision" type="text" name="porcentaje" aria-describedby="porcentaje" placeholder="% nivel 1">
                            </div>
                        </div>
                        <div class="col-md-3">
                             <div class="form-group">
                                <label for="exampleInputComision">*% comisión nivel 2</label>
                                <input class="form-control" id="exampleInputComision" type="text" name="porcentaje2" aria-describedby="porcentaje2" placeholder="% nivel 2">
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputValorBono">Porcentaje bono</label>
                                <input class="form-control" id="exampleInputValorBono" type="text" name="valor_bono" aria-describedby="valor_bono" placeholder="% bono">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputValorBono">Porcentaje fondo</label>
                                <input class="form-control" id="exampleInputValorBono" type="text" name="fondo" aria-describedby="fondo" placeholder="% fondo inversión">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <!---<div class="col-md-3">
                             <div class="form-group">
                                <label for="exampleInputVencimiento">*Duración en meses del plan</label>
                                <input class="form-control" id="exampleInputVencimiento" type="text" name="dias" aria-describedby="dias" placeholder="Escriva la cantidad de días que dura la membresía">
                            </div>
                        </div>-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEstado">*Estado</label>
                                <select class="form-control" name="estado" id="exampleInputEstado">
                                    <option>Activo</option>
                                     <option>Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <!---<div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputCant">Cantidad de usuarios para bono</label>
                                <input class="form-control" id="exampleInputCant" type="text" name="cant_users" aria-describedby="cant_users" placeholder="Escri el número de usuarios para ganar el bono">
                            </div>
                        </div>-->
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Avatar Membresía</label>
                                <input class="form-control" id="exampleInputEmail1" type="file" name="avatar" 
                                aria-describedby="file" 
                                placeholder="Documento de identidad">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Avatar Usuario</label>
                                <input class="form-control" id="exampleInputEmail1" type="file" name="avatar_user" 
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
