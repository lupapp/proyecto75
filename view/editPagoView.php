<!DOCTYPE html>
<html lang="en">

<head>
  
 <?php   include "headerMs.php";  ?>
 
</head>
    <div class="container">
      <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="?controller=Main"" class="text-success">Registro <?php echo $pago[0]->id ?></a>
        </li>
        <li class="breadcrumb-item active">Edición Registro</li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mx-auto mt-5">
            <div class="card-header">
                <ul class="list-group">
                    <li class="list-group-item active">Fecha de registro: <?php echo $pago[0]->fecha_pago ?></li>
                    <li class="list-group-item">Método de pago:
                    <?php switch ($pago[0]->metodo_pago){
                        case 1: "Deposito";
                        case 2: "Paypal";
                        case 3: "Bitcoins";
                    }?>
                    </li>
                    <li class="list-group-item">Valor membresía <?php echo $pago[0]->valor ?></li>
                    <li class="list-group-item">Estado del registro:
                    <?php switch($pago[0]->estado){
                        case 0: "Pendiente";
                            break;
                        case 1: "Aprobado";
                            break;
                    }?>
                    </li>
                    
                  </ul>
            </div>
            <div class="card-body">
                 <form id="loginForm" action="?controller=Usuarios&action=updatePago" method="POST"  class="form-horizontal" enctype="multipart/form-data" >
                    <div class="form-row">
                        <div class="col-md-8">
                             <div class="form-group">
                                <label for="exampleInputPlan">Actualice el número de documento o transacción aqui</label>
                                <input type="hidden" name="id" value="<?php echo $pago[0]->id ?>">
                                <input class="form-control"type="text" name="documen" placeholder="Ingrese No. de documento o transacción">
                             </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right cursor-pointer" >Guardar</button>
                </form>
            </div>
      </div>
     <?php include "footerInit.php"; ?>
  </div>
</body>

</html>
