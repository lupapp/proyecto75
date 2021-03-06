<?php include "headerMs.php";
  $constante= new Constantes();?>
    <link rel="stylesheet" type="text/css" href="view/tienda/css/main.css">
  <div class="container">
        <div class="card mx-auto mt-5">
            <div class="card-header">
                <h3><i class="fa fa-shopping-cart"></i> Detalles del producto</h3>
                <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
            </div>
            <?php $carrito=Session::get('carrito');?>
            <div class="container bgwhite p-t-35 p-b-80">
                <div class="flex-w flex-sb">
                    <div class="w-size13 p-t-30 respon5">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="slick3">
                                <div class="item-slick3" data-thumb="view/img/<?php echo $producto[0]->avatar_plan ?>">
                                    <div class="wrap-pic-w">
                                        <img src="view/img/<?php echo $producto[0]->avatar_plan ?>" alt="IMG-PRODUCT">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="w-size14 p-t-30 respon5">
                            <div class="row">
                                <div class="col-md-12 pl-5">
                                    <h4 class="product-detail-name s-text3 p-b-13">
                                        <?php echo $producto[0]->nombre_plan ?>
                                    </h4>

                                    <div class="block2-price  m-text20">
                                        $<span class="valorProducto"><?php echo number_format($producto[0]->valor_plan,2,'.', '') ?></span>
                                    </div>
                                </div>
                                <div class="col-md-7 pl-5">
                                    <div class="w-size16 flex-m flex-w">
                                        <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                            <a class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </a>
                                            <input class="size8 m-text18 t-center num-product cantidad"  name="cantidad" value="1">
                                            <a class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </a>
                                        
                                            <input type="hidden" class="valorP" name="valor" value="<?php echo $producto[0]->valor_plan ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-row  pl-5 pr-5">

                                    <div class="row">
                                        
                                    </div>
                                </div>
                                <hr>
                                <div class="container pl-2 pr-2 pt-3">
                                    <div class="row">
                                        <?php 
                                        $c=false;
                                        $v=false;
                                        if(Session::get('autenticado')){  
                                            $cantmen=count(Session::get('membresias'));
                                            $cartilla=Session::get('membresias');
                                            $canti = count($cartilla) - 1;
                                            if ($canti > 1) {
                                                $car = 'Membresías';
                                            } else {
                                                $car = 'Membresía';
                                            } 
                                            if(count($cartilla)>1){ 
                                                $c=true ?>
                                                <div class="card mb-4 w-100 mx-auto" >
                                                <input type="hidden" class="id_user" name="id_user" value="<?php echo Session::get('id') ?>">
                                                <div class="card-header">
                                                *Usted tiene <?php echo $canti . ' ' . $car ?> seleccione una
                                                </div>
                                                <?php 
                                                $vigencia=0;
                                                for ($i = 1; $i < count($cartilla); $i++) {
                                                    if($cartilla[$i]['vigencia']==1){
                                                        $vigencia++;
                                                    }
                                                    ?>
                                                            
                                                    <hr>
                                                    <div class="row pl-2 pr-2">
                                                        <div class="col-md-3 col-12">
                                                        
                                                            <input class="membresia" type="radio" name="id_cartilla" data-id_padre="<?php echo $cartilla[$i]['cartilla']->id_padre ?>" value="<?php echo $cartilla[$i]['cartilla']->id  ?>" <?php if($cartilla[$i]['vigencia']==1){}else{echo 'disabled';} ?>>
                                                            <?php echo $cartilla[$i]['cartilla']->id ?> 
                                                        </div>
                                                        <div class="col-md-9 col-12">
                                                            <?php echo $cartilla[$i]['cartilla']->fecha_creacion ?>
                                                        </div>
                                                        <?php if($cartilla[$i]['vigencia']==1){ ?>
                                                        <div class="col-md-6 col-12 text-success">
                                                            Vigente
                                                            <?php echo $cartilla[$i]['cartilla']->fecha_vencimiento ?>
                                                        </div>
                                                        <?php }else{ ?>
                                                        <div class="col-md-6 col-12 text-danger">
                                                            No vigente
                                                            <?php echo $cartilla[$i]['cartilla']->fecha_vencimiento ?>
                                                            <a href="?controller=Cartillas&action=showRenovar&id=<?php echo $cartilla[$i]['cartilla']->id  ?>" class="text-primary">Renovar</a>
                                                        </div>
                                                        
                                                        <?php  } ?>
                                                        <div class="col-md-6 col-12">
                                                            <h4 for="exampleInputEmail1" class="text-primary"><?php echo $cartilla[$i]['plan']->nombre_plan ?></h4>
                                                        </div>
                                                    </div>
                                                <?php  } ?>
                                                
                                                </div>
                                                <script src="view/vendor/jquery/jquery.min.js"></script>
                                                <?php 
                                                    if($vigencia>0){
                                                        $descuento=($producto[0]->descuento/100)*$producto[0]->valor_plan;
                                                        $valor=$producto[0]->valor_plan-$descuento;
                                                        echo '<script>
                                                        $(document).ready(function(){
                                                            $(".valorProducto").text('.number_format($valor,2,'.', '').');
                                                            $(".valorP").val('.number_format($valor,2,'.', '').');
                                                        });
                                                        </script>'; ?>
                                                        <button type="submit" class="col-md-10 mx-auto w-75 col-10">
                                                            <button type="submit" data-img="<?php echo $producto[0]->avatar_plan ?>" data-nombre="<?php echo $producto[0]->nombre_plan ?>" data-valor="<?php echo $producto[0]->valor_plan ?>" data-id="<?php echo $producto[0]->id ?>" data-tipouser="1" class="btn btn-success w-100 cursor-pointer submit addCart" >Añadir al carrito</button>
                                                        </div>
                                                    <?php }else{
                                                        echo '
                                                        <div class="card  mx-auto w-75 mt-1 mb-3 ">
                                                                <a class="btn btn-danger white-space"  >Debe tener membresías activas para descuento renueve</a>
                                                        </div>
                                                        <script>
                                                        $(document).ready(function(){
                                                            $(".submit").attr("disabled", true);
                                                        });
                                                        </script>';
                                                    }?>
                                                <?php 
                                                }else{ ?>
                                                    <input type="hidden" name="usuarioRegular" value="1">
                                                    <input type="hidden" class="id_user" name="id_user" value="<?php echo Session::get('id') ?>">
                                                    <input type="radio" style="display:none"  checked name="id_cartilla" value="0" data-id_padre="0">
                                                    <div  class="col-md-10 mx-auto w-75 col-10">
                                                        <button type="submit" data-img="<?php echo $producto[0]->avatar_plan ?>" data-nombre="<?php echo $producto[0]->nombre_plan ?>" data-valor="<?php echo $producto[0]->valor_plan ?>" data-id="<?php echo $producto[0]->id ?>" data-tipouser="0" class="btn btn-success w-100 cursor-pointer submit addCart" >Añadir al carrito</button>
                                                    </div>
                                                <?php }

                                            } else{ ?>
                                            <div class="card  mx-auto w-75 mt-1 mb-3">
                                                    <a href="?controller=Login" class="btn btn-primary btn-block"  >Inicie sesión para comprar</a>
                                            </div>
                                        <?php }?>
                                
                                        
                                    </div>
                                </div>
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <?php include "footerInit.php";?>

    <?php if(isset($datosform)){

        echo '<script>
            
            $(document).ready(function(){
            if("' . $datosform["metodo"] . '"=="1"){
                $(".metodo[value=\'1\']").attr("checked", true);
            }else{
                $(".metodo[value=\'3\']").attr("checked", true);
            }
            $(".documento").val("' . $datosform['documento'] . '");
            $(".usuario").val("' . $datosform['user'] . '");
            $(".email").val("' . $datosform['email'] . '");
            $(".nombre").val("' . $datosform['nombre'] . '");
            $(".telefono").val("' . $datosform['telefono'] . '");
            $(".cc").val("' . $datosform['cc'] . '");
            switch("' . $datosform['tipoDocumento'] . '"){
                case "CI":
                    $(".tipoDocumento option").eq(0).attr("selected", true);
                    break;
                 case "CC":
                    $(".tipoDocumento option").eq(1).attr("selected", true);
                    break;
                 case "Pasaporte":
                    $(".tipoDocumento option").eq(2).attr("selected", true);
                    break;
            }
            alert("Debe seleccionar una membresía y un plan, llene el usuario padre para ver las membresías");
            });
            
        </script>';
    } ?>
</body>

</html>
