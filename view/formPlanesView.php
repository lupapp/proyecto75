<!DOCTYPE html>
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
        <li class="breadcrumb-item active">Nuevo producto o membresía</li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-user-plus"></i> Registro de nuevo producto o membresía</div>
        <div class="card-body">
            <form id="loginForm" action="?controller=Planes&action=crear" method="POST"  class="form-horizontal" enctype="multipart/form-data" >
                    <div class="form-row">
                        <div class="col-md-3">
                             <div class="form-group">
                                <label for="exampleInputPlan">*Nombre</label>
                                <input class="form-control" id="exampleInputPlan" type="text" name="plan" aria-describedby="plan" placeholder="Nombre de membresía">
                             </div>
                        </div>
                        <div class="col-md-3">
                             <div class="form-group">
                                <label for="exampleInputValor">*Valor</label>
                                <input class="form-control" id="exampleInputValor" type="text" name="valor_plan" aria-describedby="valor_plan" placeholder="Valor del membresía">
                             </div>
                        </div>
                        <div class="col-md-3">
                             <div class="form-group">
                                <label for="exampleInputValor">Descuento producto</label>
                                <input class="form-control" id="exampleInputValor" type="text" name="descuento" aria-describedby="valor_plan" placeholder="Descuento en porcentaje">
                             </div>
                        </div>
                        <?php if($_GET['tipo']==1){ ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputValor">*Cantidad de hijos</label>
                                    <input class="form-control" id="exampleInputValor" type="text" name="cant_hijos" aria-describedby="cant_hijos" placeholder="Numero de hijos">
                                </div>
                            </div>
                        <?php }else{ ?>
                            <input class="form-control" id="exampleInputValor" type="hidden" name="cant_hijos" aria-describedby="cant_hijos" value='0'>
                        <?php } ?>
                        
                        
                    </div>
                      <div class="form-row">
                        <?php for($i=1;$i<6; $i++){?>
                        <div class="col-md-2">
                             <div class="form-group">
                                <label for="exampleInputComision">*% comisión nivel <?php echo $i ?></label>
                                <input class="form-control" id="exampleInputComision" type="text" name="porcentaje[]" aria-describedby="porcentaje" placeholder="% nivel <?php echo $i ?>">
                            </div>
                        </div>
                        <?php }?>
                        
                                <input class="form-control" id="exampleInputValorBono" type="hidden" name="valor_bono" aria-describedby="valor_bono" placeholder="% bono" value="0">
                          
                       
                                <input class="form-control" id="exampleInputValorBono" type="hidden" name="fondo" aria-describedby="fondo" placeholder="% fondo inversión" value="0">
                          
                    </div>
                    <div class="form-row">
                        <?php if($_GET['tipo']==1){ ?>
                        <div class="col-md-3">
                             <div class="form-group">
                                <label for="exampleInputVencimiento">Duración en días del periodo</label>
                                <input class="form-control" id="exampleInputVencimiento" type="text" name="dias" aria-describedby="dias" placeholder="Escriva la cantidad de días que dura la membresía">
                            </div>
                        </div>
                        <?php }else{ ?>
                            <input class="form-control" id="exampleInputVencimiento" type="hidden" name="dias" aria-describedby="dias" value="0">
                        <?php } ?>
                        <?php if($_GET['tipo']==1){ ?>
                            <input class="form-control" type="hidden" name="estado" value="Activo">
                        <?php }else{ ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEstado">*Estado</label>
                                    <select class="form-control" name="estado" id="exampleInputEstado">
                                        <option value="Activo">Existencia</option>
                                        <option value="0">Agotado</option>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEstado">*Tipo</label>
                                <select class="form-control tipo"   name="tipo" id="exampleInputEstado">
                                    <?php if($_GET['tipo']==1){ ?>
                                        <option value="1">Membresía</option>
                                    <?php }else{ ?> 
                                        <option value="0">Producto</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php if($_GET['tipo']==1){ ?>
                                    
                                <?php }else{ ?> 
                                    <label for="exampleInputEstado">*Categoria</label>
                                    <select class="form-control categorias"   name="categoria" id="exampleInputEstado">
                                        <script>llenarCategorias();</script>
                                    </select>    
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Imágen del producto o membresía</label>
                                <input class="form-control" id="exampleInputEmail1" type="file" name="avatar" 
                                aria-describedby="file" 
                                placeholder="Documento de identidad">
                            </div>
                        </div>
                        <?php if($_GET['tipo']==1){ ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">*Avatar Usuario</label>
                                    <input class="form-control" id="exampleInputEmail1" type="file" name="avatar_user" 
                                    aria-describedby="file" 
                                    placeholder="Documento de identidad">
                                </div>
                            </div>
                        <?php }else{ ?> 
                           
                        <?php } ?>
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
