<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
  if(Session::get('level')=='admin'){  
    include "header.php";
  }else{
    include "headerSt.php"; 
  } ?>
<body>
    <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="?controller=Main" class="text-success">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Comisiones por plan </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <div class="p-3 mb-2 bg-info text-white text-uppercase font-weight-bold">
                <i class="fa fa-user"></i> <?php echo $user[0]->user." / ".$user[0]->name; ?>
            </div>
        <div class="card-body">
            <div class="row">
                <?php
                if(!isset($cartillas[1])){
                    echo "<div  class='text-center text-primary w-100'>El usuario no posee membresías actualmente</div>";
                }else{
                    for($i=1; $i<count($cartillas); $i++){ ?>
                <div class=" col-sm-6 mb-5">
                    <div class="card bg-faded o-hidden h-100">
                      <div class="card-body">
                        <div class="card-body-icon">
                            <img src="view/img/<?php echo $cartillas[$i]['plan']->avatar_plan ?>" >  
                        </div>
                          <ul class="list-unstyled">
                              <?php if(empty($cartillas[$i]['patrocinador'])){ ?>
                                  <h3>Sin patrocinador</h3>
                              <?php }else{?>
                                  <a  class="btn btn-primary float-left mr-2" href="?controller=Cartillas&action=showRed&id=<?php echo $cartillas[$i]['patrocinador']->id?>">Regresar</a>
                                  <h3>Patrocinador: <?php echo $cartillas[$i]['patrocinador']->user." | ".$cartillas[$i]['patrocinador']->name ?></h3>

                              <?php }?>
                              <li class="text-uppercase font-weight-bold"><h2><?php echo $cartillas[$i]['plan']->nombre_plan ?>   ID: <?php echo $cartillas[$i]['cartilla']->id ?> </h2> </li>
                              <li >Valor membresía: $ <?php echo $cartillas[$i]['plan']->valor_plan ?>  </li>
                              <?php
                              echo 'hola';
                              $color='';
                              $vigencia=$cartillas[$i]['vigencia'];
                              if($vigencia==1){
                                  $color='success'; ?>
                                  <li>Fecha de vencimiento: <?php echo $cartillas[$i]['cartilla']->fecha_vencimiento ?>  </li>

                              <?php }else{
                                  $color='danger'; ?>
                                  <li><span class="text-danger">Fecha de vencimiento: <?php echo $cartillas[$i]['cartilla']->fecha_vencimiento ?></span>  </li>
                              <?php } ?>

                              <li class="font-weight-bold">Comisiones Disponibles</li>
                              <li>
                                    <div class="p-2 mb-2 bg-<?php echo $color ?> text-white">
                                        <h4>
                                            $ <?php 
                                            if($cartillas[$i]['total']->suma==''){
                                                echo 0; 
                                            }else{
                                                echo $cartillas[$i]['total']->suma;
                                            }?>
                                        </h4>
                                    </div>
                              </li>
                          </ul> 
                      </div>
                      <a class="card-footer clearfix small z-1" href="?controller=Cartillas&action=showHistorialComision&id=<?php echo $cartillas[$i]['cartilla']->id?>&id_user=<?php echo $cartillas[$i]['cartilla']->id_user?>">
                        <span class="float-left">VER HISTORIAL DE COMISIONES</span>
                        <span class="float-right">
                          <i class="fa fa-angle-right"></i>
                        </span>
                      </a>
                    </div>
                </div>
            <?php } 
                } ?>
            </div>
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
