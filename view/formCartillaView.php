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
        <li class="breadcrumb-item active">Nueva membresía del usuario <?php echo "<span class='text-success font-weight-bold   '>".$user[0]-> user."</span>" ?> </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          
           <form action="?controller=Cartillas&action=crear" method="POST">
               <input type="hidden" name="id_user" value="<?php echo $user[0]->id ?>">
               <input type="hidden" name="id_plan" value="<?php echo $plan->id ?>">
               <input type="hidden" name="id_cartilla_padre" value="0">
               <div class="row">
                   <div class="col-md-4">
                       <div class="form-row">
                            <div class="col-md-8">
                                 <div class="form-group">
                                    <label for="exampleInputUser" class="text-primary font-weight-bold">Usuario Referido</label>
                                    <input class="form-control buscarRef2" id="exampleInputUser" type="text"  placeholder="Escriba el usuario que refiere esta membresía si ese es el caso">
                                    <div class="col-md-4 iduserRef"></div>
                                 </div>
                            </div>

                            
                       </div>
                   </div>
                   <div class="col-md-2">
                       <div class="form-group">
                           <label for="exampleInputUser" class="text-primary font-weight-bold">Membresía</label>
                            <select class="custom-select pt-0 pb-0 pr-4 pl-4 w-75" name="id_plan">
                                 <?php 
                                 for ($j=0; $j<count($allplanes);$j++){ ?>
                                     <option value="<?php echo $allplanes[$j]->id ?>"><?php echo $allplanes[$j]->nombre_plan ?></option>
                                 <?php } ?>
                             </select>
                       </div>
                   </div>
                   <div class="col-md-2">
                       <div class="form-group">
                           <label for="exampleInputName">Fecha de inscripción</label>
                           <div class="input-group date fj-date">
                               <input type="text" name="insc" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                        <button class="btn btn-success float-right" >Crear la membresía sin padre <i class="fa fa-arrow-right"></i></button>
                   </div>
               </div>
           </form>
           <i class="fa fa-users"></i> Busque una membresia como padre
        </div>
        <div class="card-body">
          <?php 
          if(!isset($cartillas[1])){
                echo "<div  class='text-center text-primary w-100'>No existen otros planes</div>";
          }else{ ?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Membresía padre</th>
                    <!--<th>Usuario que refiere</th>-->
                    <th>Seleccione la fecha de inscripción</th>
                  <th colspan="2">Selecione Membresía</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Membresía padre</th>
                    <!--<th>Usuario que refiere</th>-->
                    <th>Seleccione la fecha de inscripción</th>
                    <th colspan="2">Selecione Membresía</th>
                </tr>
              </tfoot>
              <tbody>
                <?php 
                 for($i=1; $i<count($cartillas); $i++){ ?>
                  <tr>
                    <td>Usuario: <?php echo $cartillas[$i]['cartilla']->user;  ?> | Plan:<?php
                        echo $cartillas[$i]['cartilla']->nombre_plan?></td>

                    <form action="?controller=Cartillas&action=crear" method="POST">
                    <!--<td>
                        <input class="form-control w-75 buscarRef2 float-left" id="exampleInputUser" name="referido" type="text"  placeholder="Usuario que refiere">
                        
                    </td>-->
                    <td>
                        <div class="input-group date fj-date">
                            <input type="text" name="insc" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </td>
                    <td><select class="custom-select pt-0 pb-0 pr-4 pl-4" name="id_plan">
                            <?php 
                            $select=$cartillas[$i]['selectMembre'];
                            
                            for ($j=0; $j<count($select);$j++){ ?>
                                <option value="<?php echo $select[$j]->id ?>"><?php echo $select[$j]->nombre_plan ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>        
                        <input type="hidden" name="id_user" value="<?php echo $user[0]->id ?>">
                        <input type="hidden" name="id_cartilla_padre" value="<?php echo $cartillas[$i]['cartilla']->id ?>">
                        <button class="btn btn-success btn-options" data-toggle="tooltip" title="Seleccionar membresía como padre" >Seleccionar <i class="fa fa-arrow-right"></i></button>
                    </td>
                    </form>
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
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include 'logoutModal.php'; ?>
    <!-- Bootstrap core JavaScript-->
     <?php include "footer.php"; ?>
  </div>
</body>

</html>
