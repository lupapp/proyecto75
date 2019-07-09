
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
        <li class="breadcrumb-item active">Nueva membresía bajo usuario <?php echo "<span class='text-success font-weight-bold   '>".$user->user."</span>" ?> </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-user-plus"></i> Registro de nuevo usuario</div>
        <div class="card-body">
            <?php if(Session::get('level')=='admin'){ ?>
                <form id="loginForm" action="?controller=Usuarios&action=crearUserAdmin" method="POST"  class="form-horizontal" >
            <?php }else{ ?>
                <form id="loginForm" action="?controller=Usuarios&action=crearUser" method="POST"  class="form-horizontal" >
            <?php } ?>
                 <div class="form-row">
                    <div class="col-md-12">
                        <div class="alert alert-success font-weight-bold text-center" role="alert">
                           Usuario padre:<?php echo "<h3 class='text-success font-weight-bold'>".$user->user."</h3>" ?>ID Membresía <?php echo $_GET['id'] ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                         <div class="form-group">
                            <label for="exampleInputUser">*Usuario</label>
                            <input type="hidden" name="id_cartilla" value="<?php echo $_GET['id']?>">
                            <input type="hidden" name="posicion" value="<?php echo $_GET['p']?>">
                            <input class="form-control verificarUser" id="exampleInputUser" type="text" name="usuario" aria-describedby="usuario" placeholder="Nombre de usuario">
                         </div>
                         <div class="mensaje"></div>
                    </div>
                     <div class="col-md-2">
                         <div class="form-group">
                             <label for="exampleInputName">Fecha de inscripción</label>
                             <div class="input-group date fj-date">
                                 <input type="text" name="insc" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                             </div>
                         </div>
                     </div>
                    <div class="col-md-2">
                            <div class="form-group">
                            <label for="exampleInputEmail1">*Membresía</label>
                            <select class="custom-select pt-0 pb-0 pr-4 pl-4 w-100" name="id_plan">
                                <?php 
                                 
                                for ($j=0; $j<count($plan);$j++){ ?>
                                    <option value="<?php echo $plan[$j]->id ?>"><img src="view/img/<?php echo $plan[$j]->avatar_plan ?>" > <?php echo $plan[$j]->nombre_plan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="">*No. Transacción </label>
                            <input class="form-control"  type="text" name="documento" placeholder="Ingrese el número de transacción">
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
                <div class="formularioUser">
                    <div class="form-row">
                        <div class="col-md-3">
                             <div class="form-group">
                                <label for="exampleInputName">*Nombre completo</label>
                                <input class="form-control" id="exampleInputName" type="text" name="nombre" aria-describedby="nombre" placeholder="Nombre completo">
                             </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Email address</label>
                                <input class="form-control" id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Correo electrónico">
                            </div>
                        </div>
                         
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputName">*Tipo de documento</label>
                                <select class="form-control" name="tipoDocumento" id="exampleFormControlSelect1">
                                    <option>CI</option>
                                    <option>CE</option>
                                    <option>Pasaporte</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Documento de indentidad</label>
                                <input class="form-control" id="exampleInputEmail1" type="text" name="cc" aria-describedby="emailHelp" placeholder="Documento de identidad">
                                <input class="form-control" type="hidden" name="rol"  value="standard">
                                <input type="hidden" name="nacimiento" value=''>
                                <input type="hidden" name="telefono" value=''>
                                <input type="hidden" name="celular" value=''>
                                <input type="hidden" name="direccion" value=''>
                                <input type="hidden" name="ciudad">
                                <input type="hidden" name="provincia">
                                <input type="hidden" name="pais">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--<div class="form-row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="exampleInputUser">Usuario Referido</label>
                            <input class="form-control buscarRef" id="exampleInputUser" type="text"  placeholder="Usuario referido">
                            
                         </div>
                    </div>
                    
                    <div class="col-md-6 iduserRef"><input type="hidden" name="referido"></div>
                </div>-->
                    <input type="hidden" name="referido">
                <button type="submit" class="btn btn-primary float-right cursor-pointer" >Registrar</button>
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
