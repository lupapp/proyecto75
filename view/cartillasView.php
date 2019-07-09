  <?php if(Session::get('level')=='admin'){  
    include "header.php";
  }else{
    include "headerSt.php"; 
  } ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item ">
          <a href="?controller=Main" class="text-success">Back Office</a>
        </li>
        
        <li class="breadcrumb-item active"><?php echo $cartillas['user']->user ?> </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-bookmark"></i> Membresías de <?php echo $cartillas['user']->user ?>
          <a class="btn btn-success float-right" href="?controller=Cartillas&action=create&id=<?php echo $cartillas['user']->id?>">Nueva membresía</a></div>
          </div>
        <div class="card-body">
        
          <?php 
          if(isset($cartillas[0])){ ?>
         
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>ID membresía</th>
                  <th>Usuario</th>
                  <th>Usuario padre</th>
                  <th>plan</th>
                  <th>Fecha creación</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>ID membresía</th>
                  <th>Usuario</th>
                  <th>Usuario padre</th>
                  <th>plan</th>
                  <th>Fecha creación</th>
                  <th>Estado</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                    for($i=0; $i<count($cartillas)-1; $i++){
                        $color='';
                        $vigencia=$cartillas[$i]['vigencia'];
                        if($vigencia==1){
                            $color='';
                        }else{
                            $color='danger';
                        }?>
                   <tr class="bg-<?php echo $color?>">
                       <td><?php echo $cartillas[$i]['cartilla']->idC;  ?></td>
                       <td><?php echo $cartillas[$i]['cartilla']->user;  ?></td>
                       <td><?php 
                           if($cartillas[$i]['padre']=='No tiene padre'){
                               echo "<span class='text-primary'>No tiene usuario padre</span>";
                           }else{ 
                               echo "<span class='text-success'>".$cartillas[$i]['padre']->user."</span>";
                           } ?></td>
                       <td><?php echo $cartillas[$i]['cartilla']->nombre_plan?></td>
                       <td><?php echo $cartillas[$i]['cartilla']->fecha_creacion?></td>

                       <td>
                           
                           <?php
                           if($vigencia==1){
                               $color='success';?>
                               <button type="submit" class="btn btn-<?php echo $color?>" >Activo <small>Fecha de vemcimiento: <?php echo $cartillas[$i]['cartilla']->fecha_vencimiento?> </small></button>
                           <?php }else{
                               $color='danger'?>
                               <a class="btn btn-<?php echo $color?>" data-toggle="modal" data-target="#activarModal<?php echo $cartillas[$i]['cartilla']->id?>">
                                    Activar <small>Fecha de vemcimiento: <?php echo $cartillas[$i]['cartilla']->fecha_vencimiento?> </small>
                                   </a>

                           <?php }
                           $idCartilla=$cartillas[$i]['cartilla']->idC;
                           $valor=$cartillas[$i]['plan']->valor_plan;
                           $fecha_vencimiento=$cartillas[$i]['cartilla']->fecha_vencimiento;
                           $idmodal=$cartillas[$i]['cartilla']->id;
                           include 'activarModal.php';?>
                           <a class="btn btn-warning btn-options" data-toggle="tooltip" title="Editar fecha vencimiento" href="?controller=Cartillas&action=showCartilla&id=<?php echo $idCartilla ?>"><i class="fa fa-pencil"></i></a>
                       </td>
                   </tr>

                    <?php }
                ?>
              </tbody>
            </table>
          </div>
          <?php }else{
                      echo "<div  class='text-center text-primary w-100'>El usuario no posee planes actualmente</div>";
                } ?>
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
    <?php include "logoutModal.php"; ?>
    <!-- Bootstrap core JavaScript-->
     <?php include "footer.php"; ?>
  </div>
</body>

</html>