<!DOCTYPE html>
<html lang="en">

<head>
    <body>
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
          <a href="?controller=Main">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Red por plan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <div class="p-3 mb-2 bg-info text-white text-uppercase font-weight-bold">
                <i class="fa fa-user"></i> <?php echo $user[0]->user." / ".$user[0]->name; ?>
            </div>
        <div class="card-body">
            <div class="row justify-content-md-center  red">
                <?php
                $color='';
                if(!isset($cartillas[1])){
                    echo "<div  class='text-center text-primary w-100'>El usuario no posee membresías actualmente</div>";
                }else{
                    for($i=1; $i<count($cartillas); $i++){ 
                        ?>
                <?php if(count($cartillas)==1){ ?>
                    <div class=" col-sm-10 mb-5 cursor-pointer contred">
                <?php }else{ ?>
                    <div class=" col-sm-6 mb-5 cursor-pointer contred">
                    <i class="fa fa-arrows-alt fullscreen"></i>
                    <i class="fa fa-compress fullscreen"></i>
                <?php } ?>
                    
                    <div class="card bg-faded o-hidden h-100">
                      <div class="card-body">
                        <div class="card-body-icon text-right mt-1">
                            <img class="w-100" src="view/img/<?php echo $cartillas[$i]['plan']->avatar_user ?>" >  
                        </div>
                          <ul class="list-unstyled">
                              <?php if(empty($cartillas[$i]['patrocinador'])){  ?>
                                  <h3>Sin patrocinador</h3>
                              <?php }else{
                                  ?>
                                  <?php if(strcmp($user[0]->user, Session::get('user'))!==0){?>
                                      <a  class="btn btn-primary float-left mr-2" href="?controller=Cartillas&action=showRed&id=<?php echo $cartillas[$i]['patrocinador']->id?>">Regresar</a>
                                  <?php }  ?>
                                  <h3>Patrocinador: <?php echo $cartillas[$i]['patrocinador']->user." | ".$cartillas[$i]['patrocinador']->name ?></h3>

                              <?php }?>


                        <li class="text-uppercase font-weight-bold"><h2><?php echo $cartillas[$i]['plan']->nombre_plan ?>   ID: <?php echo $cartillas[$i]['cartilla']->id ?></h2>
                                  <?php 
                                        if($cartillas[$i]['cartilla']->id_user==Session::get('id')){
                                            if($cartillas[$i]['vigencia']==1){
                                                $color='primary';?>
                                                <a class="btn btn-<?php echo $color?> p-1 ml-1 font-weight-bold" tabindex="0"  role="button" data-toggle="popover" data-trigger="hover" title="Solicitud de pago" data-content="Dando click aqui puede ver el historial de comisiones y solicitar el pago de las comisiones disponibles" href="?controller=Comisiones&action&id=<?php echo $cartillas[$i]['cartilla']->id?>" ><i class="fa fa-money"></i></a>
                                <?php 
                                            }else{
                                                $color='danger';?>
                                                <a class="btn btn-<?php echo $color?> p-1 ml-1 font-weight-bold" tabindex="0"  role="button" data-toggle="popover" data-trigger="hover" title="Solicitud de pago bloqueada" data-content="Dando click aqui puede ver el historial de comisiones, pero no puede solicitar pago.  Esto es debido a que su membresía esta vencida, pongase en contacto con el administrador o realice el pago para activar su membresía" href="?controller=Comisiones&action&id=<?php echo $cartillas[$i]['cartilla']->id?>" ><i class="fa fa-money"></i></a>
                                            <?php }
                                    }
                               ?>
                              </li>

                              <li >Valor membresía: $ <?php echo $cartillas[$i]['plan']->valor_plan ?>  </li>
                              
                              <?php
                              $color='';
                              $vigencia=$cartillas[$i]['vigencia'];
                              if($cartillas[$i]['cartilla']->id_user==Session::get('id')){
                                if($vigencia==1){
                                    $color='success'; ?>
                                    <li><span class="text-success">Fecha de vencimiento: <?php echo $cartillas[$i]['cartilla']->fecha_vencimiento ?></span>  </li>

                                <?php }else{
                                    $color='danger'; ?>
                                    <li><span class="text-danger">Fecha de vencimiento: <?php echo $cartillas[$i]['cartilla']->fecha_vencimiento ?></span>
                                        <a href="?controller=Cartillas&action=showRenovar&id=<?php echo $cartillas[$i]['cartilla']->id  ?> class="btn btn-danger">Renovar</a>  </li>
                                <?php } ?>
                                <div class="p-2 mb-2 bg-<?php echo $color?> text-white">
                                    Comisiones Disponibles
                                    <h4>
                                        $ <?php 
                                        if($cartillas[$i]['total']->suma==''){
                                            echo 0; 
                                        }else{
                                            echo $cartillas[$i]['total']->suma;
                                        }?>
                                        
                                        
                                    </h4>
                                </div>
                            <?php }else{ ?>
                                <hr>
                              <?php } ?>
                              </li>
                             
                              <li>

                                  <div class="row">
                                      <?php
                                      $red=$cartillas[$i]['red'];
                                      $cant_hijos_padre=$cartillas[$i]['plan']->cant_hijos;
                                      $width=100/$cant_hijos_padre;
                                      for($j=0;$j<$cartillas[$i]['plan']->cant_hijos;$j++){
                                          if(isset($red[$j])){
                                              ?>
                                              <div class='text-center  border-0' style="width:<?php echo $width ?>%" >
                                                  <a  href="?controller=Cartillas&action=showRed&id=<?php echo $red[$j]['id_user'] ?>">
                                                      <img data-toggle="tooltip" title="<?php echo $red[$j]['user']." | ". $red[$j]['name'] ?>" class="w-50" src='view/img/<?php echo $red[$j]['avatar_user'] ?>' >
                                                  </a>
                                                  <script>
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '?controller=Cartillas&action=verificarFromDelete',
                                                          data: {
                                                              'id':<?php echo $red[$j]['idC'] ?>

                                                          },
                                                          dataType: 'html',
                                                          error: function(){
                                                              alert('error petición ajax buscar fondos');
                                                          },
                                                          success:function(data){
                                                              if(data==1){
                                                                  $('.remove<?php echo $red[$j]['idC'] ?>').html('<i class="fa fa-remove text-danger position-absolute" data-toggle="tooltip" title="Eliminar membresía"></i>')
                                                              }else{
                                                                  $('.remove<?php echo $red[$j]['idC'] ?>').removeAttr('href');
                                                              }
                                                          }
                                                      });
                                                  </script>

                                                  <?php
                                                  ?>
                                                  <a class="remove<?php echo $red[$j]['idC'] ?>" href=""></a>
                                                  <button type="button" class="btn btn-link fa fa-eye w-75 mt-1 mb-3 mx-auto" data-toggle="modal" data-target="#<?php echo $red[$j]['idC'] ?>"></button>

                                                  <!-- Modal -->
                                                  <div id="<?php echo $red[$j]['idC'] ?>" class="modal fade" role="dialog">
                                                      <div class="modal-dialog">

                                                          <!-- Modal content-->
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                  <h4 class="modal-title"><?php echo $red[$j]['user']." | ". $red[$j]['name'] ?></h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <p class="lead"><span class="text-success">DATOS DEL USUARIO</span></p>
                                                                  <ul class="list-unstyled" style="line-height: 2">
                                                                      <li><label class="control-label font-weight-bold"> Documento: </label> <?php echo $red[$i]['cc']?> <span class="fa fa-check text-success"></span></li>
                                                                      <li><label class="control-label font-weight-bold"> Correo: </label> <?php echo $red[$j]['email']?> <span class="fa fa-check text-success"></span></li>
                                                                      <li><label class="control-label font-weight-bold"> Celular: </label> <?php echo $red[$j]['celular']?> <span class="fa fa-check text-success"></span></li>
                                                                      <li><label class="control-label font-weight-bold"> Dirección: </label> <?php echo $red[$j]['direccion']?> <span class="fa fa-check text-success"></span></li>
                                                                      <li><label class="control-label font-weight-bold"> Ciudad: </label> <?php echo $red[$j]['ciudad']?> <span class="fa fa-check text-success"></span></li>
                                                                  </ul>
                                                                  <p class="lead"><span class="text-info">DATOS DEL PLAN</span></p>
                                                                  <ul class="list-unstyled" style="line-height: 2">
                                                                      <li><label class="control-label font-weight-bold"> Membresía: </label> <?php echo $red[$j]['nombre_plan']?> <label class="control-label font-weight-bold"> ID: </label> <?php echo $red[$j]['idC']?> <span class="fa fa-check text-success"></span></li>
                                                                      <li><label class="control-label font-weight-bold"> Valor: </label> <?php echo $red[$j]['valor_plan']?> <span class="fa fa-check text-success"></span></li>
                                                                      <li><label class="control-label font-weight-bold"> Fecha creación: </label> <?php echo $red[$j]['fecha_creacion']?> <span class="fa fa-check text-success"></span></li>
                                                                  </ul>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              </div>
                                                          </div>

                                                      </div>
                                                  </div>

                                              </div>

                                          <?php }else{
                                              ?>
                                              <div style="width:<?php echo $width ?>%" class='text-center'>
                                                <?php if($cartillas[$i]['cartilla']->id_user==Session::get('id')){ ?>
                                                  <a class="" data-toggle="tooltip" title="Nuevo usuario" href="?controller=Usuarios&action=createUser&id=<?php echo $cartillas[$i]['cartilla']->id?>&p=<?php echo $j+1?>" >
                                                      <img class="w-50" src='view/img/user.png'>
                                                  </a>

                                                <?php }else{ ?>
                                                    <img class="w-50" src='view/img/user.png'>
                                                <?php  } ?>
                                              </div>
                                          <?php }
                                      } ?>

                                  </div>
                              </li>
                          </ul>
                          <div  class="card-footer clearfix small z-1">
                              <h5 class=" text-primary"><i class="fa fa-link text-primary"></i> Copie este enlace para crear un hijo en su membresía</h5>
                              <span id="enlace<?php echo $cartillas[$i]['cartilla']->id ?>"><?php echo $constantes->getPath() ?>?controller=Main&action=createUserLink&id=<?php echo $cartillas[$i]['cartilla']->id ?> </span> <a class="copy" data-id="<?php echo $cartillas[$i]['cartilla']->id ?>" href="#">Copiar</a>
                          </div>
                      </div>
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
