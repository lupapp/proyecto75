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
        <li class="breadcrumb-item active">Comisiones </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <form action="?controller=Comisiones&action=cobrar" method="post">
      <div class="card mb-3">
          
          <div class="card-header">Historial Comisiones <?php echo $user[0]->user." / ".$user[0]->name; ?>
              <hr>
              <div class="row">
              <div class="col-md-4">
                  <div class="alert alert-success font-weight-bold text-center" role="alert">
                      FONDOS DISPONIBLES <H2>$ <?php echo $totales['disponible'] ?></h2>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="alert alert-warning font-weight-bold text-center" role="alert">
                      FONDOS SOLICITADOS <H2>$ <?php echo $totales['cobradas'] ?></h2>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="alert alert-primary font-weight-bold text-center" role="alert">
                      TOTAL GANADO <H2>$ <?php echo $totales['total'] ?></H2>
                  </div>
              </div>
          </div>
              <?php if($vigencia==1){ ?>
              <div ><button type="submit" class="btn btn-success float-right">Cobrar</button></div>
              <?php }else{ ?>
              <div ><div data-toggle="popover" data-trigger="hover" title="Solicitud de pago bloqueada" data-content=" La membresía esta vencidad no puede solicitar pago de comisiones, pongase en contacto con el administrador o realice el pago para activar su membresía" class="btn btn-danger float-right" >Cobrar</div></div>
              <?php } ?>
         </div>
        <div class="card-body">
            <?php 
            if(!isset($comisiones[1])){
                echo "<div  class='text-center text-primary w-100'>El usuario no tiene historial de comisiones</div>";
            }else{?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Mebresía</th>
                  <th>Fecha</th>
                  <th>Fecha de cobro</th>
                  <th>Valor</th>
                  <th>Usuario generador</th>
                  <th>Estado</th>
                  <th>

                  </th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Mebresía</th>
                  <th>Fecha</th>
                  <th>Fecha de cobro</th>
                  <th>Valor</th>
                  <th>Usuario generador</th>
                  <th>Estado</th>
                  <th>

                  </th>
                        
                      
                </tr>
              </tfoot>
              <tbody>
                <?php 
                for($i=1; $i<count($comisiones); $i++){ ?>
                <tr>
                    <td><input type="hidden" name="id_cartilla" value="<?php echo $_GET['id'] ?>"><?php echo $comisiones[$i]['userDatos']->nombre_plan." ".$comisiones[$i]['userDatos']->valor_plan?></td>
                    <td><?php echo $comisiones[$i]['comision']->fecha?></td>
                    <td><?php echo $comisiones[$i]['comision']->fecha_cobro?></td>
                    <td>$ <?php echo $comisiones[$i]['comision']->valor?><input type="checkbox" name="valor[]" class="selectValor" style="display:none" value="<?php echo $comisiones[$i]['comision']->valor?>"></td>
                    <td><?php echo $comisiones[$i]['userDatos']->user." | ".$comisiones[$i]['userDatos']->name ?></td>
                    <td>
                        <?php switch($comisiones[$i]['comision']->estado){
                           case 0: echo 'Solicitada';
                               break;
                           case 1: echo 'Disponible';
                               break;
                           case 2: echo 'Retenida';
                               break;
                        }
                    ?></td>
                    <td>
                        <?php if($comisiones[$i]['comision']->estado==1){ ?>
                        <input type="checkbox" name="idComision[]" value="<?php echo $comisiones[$i]['comision']->id ?>" class="selectCom">
                        <?php }?>
                        
                    </td>
                </tr>
                      
                <?php } ?>
              </tbody>
            </table>
          </div>
          <?php } ?>
        </div>
      </div>
      </form>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include "logoutModal.php"; ?>
    <!-- Bootstrap core JavaScript-->
     <?php include "footer.php"; ?>
  </div>
</body>

</html>