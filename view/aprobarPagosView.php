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
        <li class="breadcrumb-item active">Comisiones </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
          <div class="card-header">Pagos por aprobar
              <div ><button type="submit" class="btn btn-success float-right">Aprobar pago</button></div>
         </div>
        <div class="card-body">
            <?php 
            if(count($pago)==1){
                echo "<div  class='text-center text-primary w-100'>No hay historial de pagos por aprobar</div>";
            }else{?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTablePag" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Padre</th>
                  <th>Valor</th>
                  <th>Método de pago</th>
                  <th>Fecha pago</th>
                  <th>Estado</th>
                    <th>Tipo</th>
                  <th>Documento</th>
                  <th><input type="checkbox" class="all"></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Padre</th>
                  <th>Valor</th>
                  <th>Método de pago</th>
                  <th>Fecha pago</th>
                  <th>Estado</th>
                    <th>Tipo</th>
                  <th>Documento</th>
                  <th><input type="checkbox" class="all"></th>
                </tr>
              </tfoot>
              <tbody class="tbodyPag">
                <?php 
                for($i=1; $i<count($pago); $i++){ ?>
                <tr>
                    <td><?php echo $pago[$i]['pagos']->id?></td>
                    <td><?php echo $pago[$i]['usuario']->name?></td>
                    <td><?php if(isset($pago[$i]['padre']->name)){echo $pago[$i]['padre']->name;}else{echo 'No tiene padre';}?></td>
                    <td>$ <?php echo $pago[$i]['pagos']->valor ?></td>
                    <td><?php switch($pago[$i]['pagos']->metodo_pago){
                           case 1: echo 'Deposito';
                               break;
                           case 2: echo 'PayPal';
                                break;
                           case 3: echo 'Bitcoins';
                                break;
                        }
                     ?></td>

                    <td><?php echo $pago[$i]['pagos']->fecha_pago?></td>
                    <td>
                        <?php switch($pago[$i]['pagos']->estado){
                           case 0: echo 'Pendiente';
                               break;
                           case 1: echo 'Aprobado';
                               break;
                        }
                    ?></td>
                    <?php switch($pago[$i]['pagos']->tipo){
                            case 0: echo '<td class="bg-success">Nuevo</td>';
                                break;
                            case 1: echo '<td class="bg-warning">Renovación</td>';
                             break;
                            case 2: echo '<td class="bg-primary">Compra</td>';
                                break;
                            case 3: echo '<td class="bg-primary">Compra simple</td>';
                            break;
                        }
                        ?></td>
                    <td><?php echo $pago[$i]['pagos']->documento?></td>
                    <td>
                        <?php $tipo= $pago[$i]['pagos']->tipo;
                        switch($tipo){
                          case 0:     if($pago[$i]['pagos']->estado==0){
                                        echo'<a class="btn btn-warning btn-options"  data-toggle="modal" data-target="#aprobarModal'.$pago[$i]['pagos']->id.'">Aprobar Membresía</a>';
                                        $idCartilla=$pago[$i]['pagos']->id_cartilla_paga;
                                        $valor=$pago[$i]['pagos']->valor;
                                        $pago_id=$pago[$i]['pagos']->id;
                                        $idmodal=$pago[$i]['pagos']->id;
                                        $color='danger';
                                        include 'aprobarModal.php';
                                      }
                          break;
                          case 1: if($pago[$i]['pagos']->estado==0){
                                  echo'<a class="btn btn-warning btn-options"  data-toggle="modal" data-target="#activarModal'.$pago[$i]['pagos']->id.'">Renovar</a>';
                                    $idCartilla=$pago[$i]['pagos']->id_cartilla_paga;
                                    $valor=$pago[$i]['pagos']->valor;
                                    $fecha_vencimiento=$pago[$i]['cartilla']->fecha_vencimiento;
                                    $pago_id=$pago[$i]['pagos']->id;
                                    $idmodal=$pago[$i]['pagos']->id;
                                    $color='danger';
                                    include 'activarModal.php';
                                  }
                          break; 
                          case 2: if($pago[$i]['pagos']->estado==0){echo '<a class="btn btn-primary btn-options" href="?controller=Cartillas&action=aprobarCompra&id_pago='.$pago[$i]['pagos']->id.'" >Aprobar compra</a>';}
                          break; 
                          
                        }  ?>                        
                        <a class="btn btn-danger btn-options" data-toggle="modal" data-target="#<?php echo $pago[$i]['pagos']->id ?>" title="Eliminar pago" ><i class="fa fa-trash"></i></a>
                        <div class="modal fade" id="<?php echo $pago[$i]['pagos']->id ?>" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger" id="exampleModalLabel">Eliminar Pago</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Esta seguro de eliminar el este pago?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a class="btn btn-danger btn-options" data-toggle="tooltip" title="Eliminar pago" href="?controller=Usuarios&action=deletePago&id=<?php echo $pago[$i]['pagos']->id ?>"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                      
                <?php } ?>
              </tbody>
            </table>
          </div>
          <?php } ?>
        </div>
      </div>
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