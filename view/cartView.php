<?php include "headerMs.php";?>
    <link rel="stylesheet" type="text/css" href="view/tienda/css/main.css">
  <div class="container ">
        <div class="card mx-auto mt-5 cart-content">
            <div class="card-header">
                <h3 class="float-left"><i class="fa fa-shopping-cart"></i> Carro de compras</h3>
                <div class="btn btn-link vaciarCart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> vaciar carro</div>
                <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
            </div>
            <div class="cartItem">
                <?php if(Session::get('carrito')){ ?>
                <div class="top-cart">
                    <div class="item-list">
                        <div class="item-info info">
                            <p>Prodcuto</p>
                        </div>
                        <div class="item-info qty">
                            <p>Cantidad</p>
                        </div>
                        <div class="item-info precio-unitario">
                            <p>Precio Unitario</p>
                        </div>
                        <div class="item-info precio-total">
                            <p>Total</p>
                        </div>
                    </div>
                </div>
                <form id="loginForm" action="?controller=Cartillas&action=pedido" method="post">
                <div class="wrap-body">
                    <?php 
                    
                    $carrito = Session::get('carrito');
                    foreach($carrito as $c){?>
                    <div class="item-wrap">
                        <div class="item-all">
                            <div class="item-info info">
                                <ul class="inline-block">
                                    <li class="img-thumbnail"><img src="view/img/<?php echo $c['img'] ?>" alt="" class="imgCart"></li>
                                    
                                </ul>
                                <div class="nombreItem inline-block"><?php echo $c['nombre'] ?></div>
                            </div>
                            <div class="item-info qty">
                                
                                <input class="form-control input-qty" type="tel" value="<?php echo $c['cant'] ?>" data-id="<?php echo $c['id'] ?>" data-id_cartilla="<?php echo $c['id_cartilla'] ?>" >
                                <div class="btns-masmenos">
                                    <div class="btn btn-default btn-up" data-id_mas="<?php echo $c['id'] ?>" data-id_cartilla="<?php echo $c['id_cartilla'] ?>"><i class="fa fa-plus"></i></div>
                                    <div class="btn btn-default btn-down" data-id_menos="<?php echo $c['id'] ?>" data-id_cartilla="<?php echo $c['id_cartilla'] ?>"><i class="fa fa-minus"></i></div>
                                </div>
                                <div class="deleteItem">
                                    <div class="btn btn-link btn-delete" data-id_delete="<?php echo $c['id'] ?>" data-id_cartilla="<?php echo $c['id_cartilla'] ?>">Eliminar</div>
                                </div>
                            </div>
                            <div class="item-info precio-unitario">
                                <p class="bold-text sizeText15">$ <span><?php echo $c['price'] ?> </span>c/u</p>
                            </div>
                            <div class="item-info precio-total">
                                <p class="bold-text sizeText15">$ <span><?php echo $c['total'] ?></span></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="row blockResComp">
                    <div class="col-8 col-md-3">
                        
                        <div class="form-group ">
                            <label class="w-100">*Método de pago</label>
                            <label class="radio-inline w-100 metodo-pago">
                                <img class="w-5 ml-2 " src="view/img/iconos_pagos.png"> <input  class="metodo" aria-describedby="metodo" type="radio" name="metodo" value="1">  Deposíto
                            </label>
                            <!--<label class="radio-inline w-30">
                                <img class="w-25 " src="view/img/paypal.png"> <input aria-describedby="metodo" type="radio" name="metodo" value="2">  PayPal
                            </label>-->
                            <label class="radio-inline w-100 metodo-pago">
                                <img class="w-5 ml-2" src="view/img/bitcoin.png"> <input class="metodo" aria-describedby="metodo" type="radio" name="metodo" value="3">  Bitcoins
                            </label>
                        </div>
                        <div class="form-group w-100 docu">
                            <label class="">No. Transacción o documento</label>
                            <input class="form-control documento"  type="text" name="documento" placeholder="Ingrese el número de transacción o documento">
                            <input type="hidden" name="cantidad" value="<?php echo $cantidad ?>">
                            <input type="hidden" class="total" name="total" value="<?php echo $totalCart ?>">
                            <input type="hidden" name="tipoUser" value="<?php echo $tipoUser ?>">
                            <input type="hidden" name="id_user" value="<?php echo Session::get('id') ?>">
                        </div>
                    </div>
                    <div class="col-1 col-md-5">
                        <div class="col-md-12 col-10">
                            <div class="checkbox">
                                <label style="font-size: 1em">
                                    <input type="checkbox" name="terminos" value="1" checked>
                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                    <span class="font-weight-bold">Acepto Terminos</span>
                                    <p>El registro de la membresía esta sujeta a revisión y aprobación, despues de registrada la membresía debe de ingresar el número de transacción o documento de deposito, para hacer efectivo el registro.</p>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-4">
                        <table class="totalCompra">
                            <tr>
                                <td>Total a Pagar:</td>
                                <td class="bold-text totalCarrito">$ <?php echo $totalCart ?></td>
                            </tr>
                        </table>
                        <div class="btnFinalCompra">
                            <button type="submit" class="btn btn-success w-100">Comprar</button>
                            <a href="index.php?controller=Main&action=showProductos" class="btn btn-light w-100">Ver mas productos</a>
                        </div>
                        
                
                    </div>
                </div>
                <?php }else{ ?>
                    <section class="empty-cart">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        <p class="title bold-text">
                            Carro de compras vacío.</p>
        
                        <p>
                                   <a class="btn btn-link" href="index.php?controller=Main&action=showProductos" >Ver productos </a></p>
                            <div class="pt-15 more-ac">
                            <a href="index.php" rel="nofollow" class="btn btn-light withBtnComprar">Volver al Home</a>
                        </div>
                    </section>
                <?php } ?>
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
