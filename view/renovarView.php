
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
          <a href="?controller=Main">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Renovar <?php echo "<span class='text-success font-weight-bold   '>".$user->user."</span>" ?> </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-user-plus"></i> Renovación de membresía</div>
        <div class="card-body">
                <form id="loginForm" action="?controller=Cartillas&action=renovacion" method="POST">
                 <div class="form-row">
                     <div class="col-md-3">
                         <div class="form-group">
                             <label class="text-danger"><h3>Renovación mensual</h3><h2> $ <?php echo $plan->valor_plan ?> </h2></label>

                         </div>
                     </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="">*No. Transacción </label>
                                <input class="form-control"  type="text" name="documento" placeholder="Ingrese el número de transacción">
                                <input  type="hidden" name="id_cartilla" value="<?php echo $cartilla->id?>">
                                <input  type="hidden" name="id_cartilla_padre" value="<?php echo $cartilla->id_padre?>">
                                <input  type="hidden" name="id_user" value="<?php echo $cartilla->id_user?>">
                                <input  type="hidden" name="id_plan" value="<?php echo $cartilla->id_plan?>">
                                <input  type="hidden" name="valor" value="<?php echo $plan->valor_plan?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                 <label class="w-100">*Método de pago</label>
                                <label class="radio-inline w-25">
                                    <img class="w-25 " src="view/img/iconos_pagos.png"> <input  aria-describedby="metodo" type="radio" name="metodo" value="1">  Deposíto
                                  </label>
                                <!--<label class="radio-inline w-30">
                                    <img class="w-25 " src="view/img/paypal.png"> <input aria-describedby="metodo" type="radio" name="metodo" value="2">  PayPal
                                </label>-->
                                <label class="radio-inline w-25">
                                    <img class="w-25" src="view/img/bitcoin.png"> <input aria-describedby="metodo" type="radio" name="metodo" value="3">  Bitcoins
                                </label>

                             </div>
                        </div>
                    
                    <div class="iduser col-md-12"></div>
                </div>
                <button type="submit" class="btn btn-primary float-right cursor-pointer" >Renovar</button>
                <a href="javascript:history.back(1)" class="btn btn-success float-right cursor-pointer mr-2" >Regresar</a>
            </form>
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
    <?php include 'logoutModal.php'; ?>
    <!-- Bootstrap core JavaScript-->
     <?php include "footer.php"; ?>
</body>

</html>
