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
        <li class="breadcrumb-item active">Red por plan </li>
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
                    echo "<div  class='text-center text-primary w-100'>El usuario no posee planes actualmente</div>";
                }else{
                    for($i=1; $i<count($cartillas); $i++){ 
                        ?>
                <div class=" col-sm-6 mb-5">
                    <div class="card bg-faded o-hidden h-100">
                        <a class='btn btn-success' href="?controller=Cartillas&action=showAscender&id=<?php echo $cartillas[$i]['cartilla']->id ?>&valor=<?php echo $cartillas[$i]['plan']->valor_plan ?>">Ascender membresía <i class="fa fa-arrow-up"></i></a>    
                      <div class="card-body">
                        <div class="card-body-icon text-right mt-1">
                            <img class="w-75" src="view/img/<?php echo $cartillas[$i]['plan']->avatar_user ?>" >  
                        </div>
                          <ul class="list-unstyled">
                              <li class="text-uppercase font-weight-bold"></h2><?php echo $cartillas[$i]['plan']->nombre_plan ?>  </h2>  ID: <?php echo $cartillas[$i]['cartilla']->id ?> 
                                  <div>
                                       <?php 
                                            if($cartillas[$i]['cartilla']->estado_cartilla==1){ ?>
                                            <form action="?controller=Cartillas&action=cambioEstado" method="POST">
                                                 <input type="hidden"  name="id" value="<?php echo $cartillas[$i]['cartilla']->id ?>" > 
                                                 <input type="hidden"  name="estado" value="0" >
                                                 <button type="submit" class="btn btn-success" >Activo <small>Cambiar estado</small></button>
                                            </form>
                                            <?php }else{ ?> 
                                           <form action="?controller=Cartillas&action=cambioEstado" method="POST">
                                                 <input type="hidden"  name="id" value="<?php echo $cartillas[$i]['cartilla']->id ?>" >
                                                 <input type="hidden"  name="estado" value="1" >
                                                 <button type="submit" class="btn btn-danger" value="">Inactivo <small>Cambiar estado</small></button>
                                            </form>
                                            <?php } ?>
                                  </div></li>
                              <li >Valor membresía: $ <?php echo $cartillas[$i]['plan']->valor_plan ?>  </li>
                              <li>Fecha de creación: <?php echo $cartillas[$i]['cartilla']->fecha_creacion ?>  </li>
                              <li>
                                    <div class="p-2 mb-2 bg-success text-white">
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
                              </li>
                              <li>
                                  
                                 <div class="row">
                                  <?php 
                                  $red=$cartillas[$i]['red'];
                                  $cant_hijos_padre=$cartillas[$i]['plan']->cant_hijos;
                                      for($j=0;$j<$cartillas[$i]['plan']->cant_hijos;$j++){
                                        if(isset($red[$j])){
                                            ?>
                                            <div class='text-center  border-0' style="width:<?php echo $width ?>%" >
                                                <a data-toggle="modal"  data-target="#<?php echo $red[$j]['idC'] ?>">
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
                                                                $('.remove<?php echo $red[$j]['idC'] ?>').html(data);
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

                                                <div class='row'>
                                                <?php 
                                                $hijo=$red[$j]['hijo'];
                                                for($l=0;$l<2;$l++){
                                                    if(isset($hijo[$l])){ ?>
                                                        <div class='text-center'>
                                                            <a data-toggle="modal"  data-target="#<?php echo $hijo[$l]['idC'] ?>" >
                                                                <img  data-toggle="tooltip" title="<?php echo $hijo[$l]['user']." | ". $hijo[$l]['name'] ?>" class="w-50" src='view/img/<?php echo $hijo[$l]['avatar_user'] ?>' >
                                                            </a>
                                                            <script>
                                                                $.ajax({       
                                                                    type: 'POST',
                                                                    url: '?controller=Cartillas&action=verificarFromDelete',
                                                                    data: {
                                                                            'id':<?php echo $hijo[$l]['idC'] ?>

                                                                    },
                                                                    dataType: 'html',
                                                                    error: function(){
                                                                      alert('error petición ajax buscar fondos');
                                                                    },
                                                                    success:function(data){
                                                                        if(data==1){
                                                                          $('.remove<?php echo $hijo[$l]['idC'] ?>').html('<i class="fa fa-remove text-danger position-absolute" data-toggle="tooltip" title="Eliminar membresía"></i>') 
                                                                       }else{
                                                                          $('.remove<?php echo $hijo[$l]['idC'] ?>').removeAttr('href');
                                                                       }
                                                                    }
                                                                }); 
                                                            </script>

                                                        <?php 

                                                                ?> 
                                                            <a class="remove<?php echo $hijo[$l]['idC'] ?>" href=""></a>
                                                            <button type="button" class="btn btn-link fa fa-eye w-75 mt-1 mb-3 mx-auto" data-toggle="modal" data-target="#<?php echo $hijo[$l]['idC'] ?> "></button>

                                                            <!-- Modal -->
                                                            <div id="<?php echo $hijo[$l]['idC'] ?>" class="modal fade" role="dialog">
                                                              <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title"><?php echo $hijo[$l]['user']." | ". $hijo[$l]['name'] ?></h4>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                     <p class="lead"><span class="text-success">DATOS DEL USUARIO</span></p>
                                                                    <ul class="list-unstyled" style="line-height: 2">
                                                                        <li><label class="control-label font-weight-bold"> Documento: </label> <?php echo $hijo[$l]['cc']?> <span class="fa fa-check text-success"></span></li>
                                                                        <li><label class="control-label font-weight-bold"> Correo: </label> <?php echo $hijo[$l]['email']?> <span class="fa fa-check text-success"></span></li>
                                                                        <li><label class="control-label font-weight-bold"> Celular: </label> <?php echo $hijo[$l]['celular']?> <span class="fa fa-check text-success"></span></li>
                                                                        <li><label class="control-label font-weight-bold"> Dirección: </label> <?php echo $hijo[$l]['direccion']?> <span class="fa fa-check text-success"></span></li>
                                                                        <li><label class="control-label font-weight-bold"> Ciudad: </label> <?php echo $hijo[$l]['ciudad']?> <span class="fa fa-check text-success"></span></li>
                                                                    </ul>
                                                                     <p class="lead"><span class="text-info">DATOS DEL PLAN</span></p>
                                                                    <ul class="list-unstyled" style="line-height: 2">
                                                                        <li><label class="control-label font-weight-bold"> Membresía: </label> <?php echo $hijo[$l]['nombre_plan']?> <label class="control-label font-weight-bold"> ID: </label> <?php echo $hijo[$l]['idC']?> <span class="fa fa-check text-success"></span></li>
                                                                        <li><label class="control-label font-weight-bold"> Valor: </label> <?php echo $hijo[$l]['valor_plan']?> <span class="fa fa-check text-success"></span></li>
                                                                        <li><label class="control-label font-weight-bold"> Fecha creación: </label> <?php echo $hijo[$l]['fecha_creacion']?> <span class="fa fa-check text-success"></span></li>
                                                                    </ul>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                  </div>
                                                                </div>

                                                              </div>
                                                            </div>
                                                        </div>
                                                    <?php }else{ ?>
                                                        <div class='col-sm-6 col-6 p-0 text-center'>
                                                            <a class="" data-toggle="tooltip" title="Nuevo usuario" href="?controller=Usuarios&action=createUser&id=<?php echo $red[$j]['idC']?>&p=<?php echo $l+1?>" >
                                                                <img class="w-50" src='view/img/user.png'>
                                                            </a>
                                                      </div>
                                                    <?php }
                                                }  ?>
                                                </div>
                                            </div>
                                        <?php }else{
                                            $width=100/$cant_hijos_padre;?>
                                      <div style="width:<?php echo $width ?>%" class='text-center'>
                                          <a class="" data-toggle="tooltip" title="Nuevo usuario" href="?controller=Usuarios&action=createUser&id=<?php echo $cartillas[$i]['cartilla']->id?>&p=<?php echo $j+1?>" >
                                              <img class="w-50" src='view/img/user.png'>
                                          </a>
                                           
                                           
                                      </div>
                                        <?php } 
                                  } ?>
                                
                                  </div>
                              </li>
                          </ul> 
                      </div>
                      <a class="card-footer clearfix small z-1" href="?controller=Cartillas&action=showHistorialComision&id=<?php echo $cartillas[$i]['cartilla']->id?>&id_user=<?php echo $cartillas[$i]['cartilla']->id_user?>">
                        <span class="float-left">Más detalles</span>
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

</body>

</html>
