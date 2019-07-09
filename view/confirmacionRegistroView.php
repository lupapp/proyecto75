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
          <a href="?controller=Main">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Usuario registrado</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
       
           
        <div class="card-body">
            <div class="row justify-content-md-center ">
                
                <div class=" col-sm-8 mb-5">
                    <div class="card bg-faded o-hidden h-100">
                      <div class="card-body text-center">
                        
                        <div class="author-info">
                            <h5 class="text-success text-center">Se creo el usuario <?php  echo $user->user; ?></h5>
                                <div class="separador"></div>

                                <div class="author-avatar text-center">
                                    <h3 class="text-primary">Membresía <?php echo $plan[0]->nombre_plan ?></h3>
                                    <img alt="" src="view/img/<?php echo $plan[0]->avatar_user?>" class="avatar avatar-80 photo" height="120" width="120">	</div><!-- .author-avatar -->
                                <div class="author-description text-center">
                                        <h2 class="author-title text-primary"><span class="author-heading"></span> <?php echo $user->name." | C.I. ".$user->cc ?></h2>
                                        <ul class="list-group mt-5 mb-5">
                                            <li class="author-bio list-group-item">Valor pagado: <?php echo $plan[0]->valor_plan ?></li>
                                            <li class="author-bio list-group-item">Método de pago: <?php 
                                            switch ($pago->metodo_pago){
                                                case 1: echo 'Deposito bancario';
                                                    break;
                                                case 2: echo 'Tarjeta de credito con PayPal';
                                                    break;
                                                case 3: echo 'Pago con Bitcoins';
                                                    break;
                                            } ?></li> 
                                            <li class="author-bio list-group-item">Número de documento: <?php echo $pago->documento; ?></li> 
                                        </ul>
                                </div><!-- .author-description -->
                        </div>
                          <?php if($pago->metodo_pago==1){ ?>
                                <a class="btn btn-primary" href="<?php echo $helper->url("Main") ?>">Cerrar</a>
                          <?php }else{ ?>
                                <div class="row">
                                    <div class="col-md-3 col-1"></div>
                                    <div class="col-md-3 col-5">
                                        <form action="bitcoins/pago.php" method="POST" class="">
                                            <input type="hidden" name="valor" value="<?php echo $pago->valor ?>">
                                            <input type="hidden" name="metodo" value="<?php echo $pago->metodo_pago ?>">
                                            <input type="hidden" name="id_pago" value="<?php echo $pago->id ?>">
                                            <input class="btn btn-success" type="submit" value="Procesar pago">
                                        </form>
                                    </div>
                                    <div class="col-md-3 col-5">
                                         <a class="btn btn-primary " href="http://www.mastercash1.com">Cerrar</a>
                                    </div>
                                    <div class="col-md-3 col-1"></div>
                                </div>
                          <?php } ?>
                      </div>
                    </div>
                </div>
            
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
