<!DOCTYPE html>
<html lang="en">

<head>
  
 <?php   include "headerMs.php";  ?>
 
</head>
    <div class="container">
      <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="?controller=Main" class="text-success">Registro No. <?php echo $comision->id ?></a>
        </li>
        <li class="breadcrumb-item active">Edición Comisión</li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mx-auto mt-5">
            <div class="card-header">
                <ul class="list-group">
                    <li class="list-group-item active">Fecha de registro: <?php echo $comision->fecha ?></li>
                    <li class="list-group-item">Estado actual:
                    <?php switch ($comision->estado){
                        case 1: echo "Disponible";
                        break;
                        case 0: echo "Cobrada";
                        break;
                    }?>
                    </li>
                    <li class="list-group-item">Valor Actual: <?php echo $comision->valor ?>
                    
                  </ul>
            </div>
            <div class="card-body">
                 <form id="loginForm" action="?controller=Comisiones&action=update" method="POST"  class="form-horizontal" enctype="multipart/form-data" >
                    <div class="form-row">
                        
                        <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputPlan">Valor comisión</label>
                                <input type="hidden" name="id" value="<?php echo $comision->id ?>">
                                <input class="form-control"type="text" name="valor" value="<?php echo $comision->valor ?>" >
                             </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="exampleInputPlan">Estado comisión</label>
                                <select class="form-control" name="estado" >
                                  <option value="<?php echo $comision->estado ?>">Seleccione una opción para cambiar el estado</option>
                                  <option value="1">Disponible</option>
                                  <option value="0">Cobrada</option>
                                </select>
                             </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <button type="submit" class="btn btn-success cursor-pointer w-100" >Guardar</button>
                        </div>
                    </div>
                    
                </form>
            </div>
      </div>
     <?php include "footerInit.php"; ?>
  </div>
</body>

</html>
