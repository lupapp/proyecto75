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
<body>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="?controller=Main"" class="text-success">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Edición Membresía</li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
        <div class="card-body">
             <form id="loginForm" action="?controller=Planes&action=update" method="POST"  class="form-horizontal" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-4">
                         <div class="form-group">
                            <label for="exampleInputPlan">*Nombre</label>
                            <input type="hidden" value="<?php echo $plan->id ?>" name="id">
                            <input class="form-control" id="exampleInputPlan" type="text" name="plan" aria-describedby="plan" value="<?php echo $plan->nombre_plan ?>" >
                         </div>
                    </div>

                    <div class="col-md-4">
                         <div class="form-group">
                            <label for="exampleInputValor">*Valor</label>
                            <input value="<?php echo $plan->valor_plan ?>" class="form-control" id="exampleInputValor" type="text" name="valor_plan" aria-describedby="valor_plan" placeholder="Valor">
                         </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group">
                            <label for="exampleInputValor">*Descuento producto</label>
                            <input value="<?php echo $plan->descuento ?>" class="form-control" id="exampleInputValor" type="text" name="descuento" aria-describedby="valor_plan" placeholder="Descuento">
                         </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputValor">*Cantidad de hijos</label>
                            <input value="<?php echo $plan->cant_hijos ?>" class="form-control" id="exampleInputValor" type="text" name="cant_hijos" aria-describedby="cant_hijos" placeholder="Cantidad de hijos">
                        </div>
                    </div>
                    
                </div>
                <div class="form-row">
                    <?php if($_GET['tipo']==1){ ?>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputComision">*% comisión nivel 1</label>
                                <input value="<?php echo $plan->porcentaje1 ?>" class="form-control" id="exampleInputComision" type="text" name="porcentaje[]" aria-describedby="porcentaje" placeholder="Porcentaje de comisión">
                            </div>
                        </div>
                    <?php }else{ ?>
                            <input class="form-control" id="exampleInputValor" type="hidden" name="cant_hijos" aria-describedby="cant_hijos" value='0'>
                    <?php } ?>
                    <div class="col-md-2">
                         <div class="form-group">
                            <label for="exampleInputComision">*% comisión nivel 2</label>
                            <input value="<?php echo $plan->porcentaje2 ?>" class="form-control" id="exampleInputComision" type="text" name="porcentaje[]" aria-describedby="porcentaje" placeholder="Porcentaje de comisión">
                        </div>
                    </div>
                    <div class="col-md-2">
                         <div class="form-group">
                            <label for="exampleInputComision">*% comisión nivel 3</label>
                            <input value="<?php echo $plan->porcentaje3 ?>" class="form-control" id="exampleInputComision" type="text" name="porcentaje[]" aria-describedby="porcentaje" placeholder="Porcentaje de comisión">
                        </div>
                    </div>
                    <div class="col-md-2">
                         <div class="form-group">
                            <label for="exampleInputComision">*% comisión nivel 4</label>
                            <input value="<?php echo $plan->porcentaje4 ?>" class="form-control" id="exampleInputComision" type="text" name="porcentaje[]" aria-describedby="porcentaje" placeholder="Porcentaje de comisión">
                        </div>
                    </div>
                    <div class="col-md-2">
                         <div class="form-group">
                            <label for="exampleInputComision">*% comisión nivel 5</label>
                            <input value="<?php echo $plan->porcentaje5 ?>" class="form-control" id="exampleInputComision" type="text" name="porcentaje[]" aria-describedby="porcentaje" placeholder="Porcentaje de comisión">
                        </div>
                    </div>
                    
                            <input value="<?php echo $plan->valor_bono ?>" class="form-control" id="exampleInputValorBono" type="hidden" name="valor_bono" aria-describedby="valor_bono" placeholder="% bono membresía">
                     
                   
                            <input value="<?php echo $plan->porcentaje_fondo ?>" class="form-control" id="exampleInputValorBono" type="hidden" name="fondo" aria-describedby="fondo" placeholder="% fondo inversión">
                       
                </div>
                <div class="form-row">
                    <?php if($_GET['tipo']==1){ ?>
                        <input class="form-control" type="hidden" name="estado" value="Activo">
                    <?php }else{ 
                        $estado='';
                        switch($plan->estado){
                            case 'Activo': $estado='Existencia';
                            break;
                            case '0': $estado='Agotado';
                            break;

                        }?>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <label for="exampleInputEstado">*Estado</label>
                                <select class="form-control" name="estado" id="exampleInputEstado">
                                    <option><?php echo $estado ?></option>
                                    <option value="Activo">Existencia</option>
                                    <option value="0">Agotado</option>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEstado">*Tipo</label>
                            <select class="form-control tipo" name="tipo" id="exampleInputEstado">
                                <?php
                                    if($plan->tipo==0){
                                        echo '<option value="'.$plan->tipo.'">Producto</option>';
                                    }else{
                                        echo '<option value="'.$plan->tipo.'">Membresía</option>';
                                    }?>
                            </select>
                        </div>
                    </div>
                    <?php if($_GET['tipo']==1){ ?>
                        <input type="hidden" name="categoria" value="0">
                    <?php }else{ ?>
                        <script>llenarCategorias();</script>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="exampleInputEstado">*Categoria</label>
                                <select class="form-control categorias"   name="categoria" id="exampleInputEstado">
                                    <option value="<?php echo $categoria[0]->id?>"><?php echo $categoria[0]->nombre?></option>
                                </select>    
                            </div>
                        </div>
                    <?php } ?>
                    
                    <?php if($_GET['tipo']==1){ ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputVencimiento">Duración en días del periodo</label>
                                <input value="<?php echo $plan->dias_vencimiento ?>" class="form-control" id="exampleInputVencimiento" type="text" name="dias" aria-describedby="dias" placeholder="Escriva la cantidad de días que dura el plan">
                            </div>
                        </div>
                    <?php }else{ ?>
                        <input class="form-control" id="exampleInputVencimiento" type="hidden" name="dias" aria-describedby="dias" value="0">
                    <?php } ?>
                    <!--<div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputCant">*Cantidad de usuarios para bono</label>
                            <input value="<?php echo $plan->cant_users ?>" class="form-control" id="exampleInputCant" type="text" name="cant_users" aria-describedby="cant_users" placeholder="Escri el número de usuarios para ganar el bono">
                        </div>
                    </div>-->
                </div>
                <div class="form-row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <img src="view/img/<?php echo $plan->avatar_plan ?>" class="img-thumbnail" >
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                          
                            <label><strong>Nombre de la imagen de la membresía:</strong> <?php echo $plan->avatar_plan ?></label>
                            <input type="hidden" name="nameimg" value="<?php echo $plan->avatar_plan ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="exampleInputEmail1" type="file" name="avatar" aria-describedby="file">
                        </div>
                    </div>
                </div>
                 <div class="form-row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <img src="view/img/<?php echo $plan->avatar_user ?>" class="img-thumbnail" >
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                          
                            <label><strong>Nombre de la imagen para el usuario:</strong> <?php echo $plan->avatar_user ?></label>
                            <input type="hidden" name="nameimg_user" value="<?php echo $plan->avatar_user ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="exampleInputEmail1" type="file" name="avatar_user" aria-describedby="file">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right cursor-pointer" >Guardar</button>
                
            </form>
        </div>
        
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
