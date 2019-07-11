<?php include "headerMs.php";?>
    <link rel="stylesheet" type="text/css" href="view/tienda/css/main.css">
  <div class="container ">
        <div class="card mx-auto mt-5 cart-content">
            <div class="card-header">
                <h3 class="float-left"><i class="fa fa-shopping-cart"></i> Carrito de producto</h3>
                <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
            </div>
            <div class="cartItem">
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
                <div class="item-wrap">
                    <div class="item-all">
                        <div class="item-info info">
                            <ul>
                                <li><img src="view/img/glutacash.jpg" alt="" class="imgCart"></li>
                                <div>GlutaCash</div>
                            </ul>

                        </div>
                        <div class="item-info qty">
                            <input type="tel" value="1">
                            <div>
                                <span>+</span>
                                <span>-</span>
                            </div>
                        </div>
                        <div class="item-info precio-unitario">
                            <p>$ <span>30</span></p>
                        </div>
                        <div class="item-info precio-total">
                            <p>$ <span>30</span></p>
                        </div>
                    </div>
                </div>
                <div class="row blockResComp">
                    <div class="col-8 col-md-8">
                        <div class="form-group ">
                            <label class="w-100">*Método de pago</label>
                            <label class="radio-inline w-100 metodo-pago">
                                <img class="w-10 ml-2 " src="view/img/iconos_pagos.png"> <input  class="metodo" aria-describedby="metodo" type="radio" name="metodo" value="1">  Deposíto
                            </label>
                            <!--<label class="radio-inline w-30">
                                <img class="w-25 " src="view/img/paypal.png"> <input aria-describedby="metodo" type="radio" name="metodo" value="2">  PayPal
                            </label>-->
                            <label class="radio-inline w-100 metodo-pago">
                                <img class="w-10 ml-2" src="view/img/bitcoin.png"> <input class="metodo" aria-describedby="metodo" type="radio" name="metodo" value="3">  Bitcoins
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="">No. Transacción o documento</label>
                            <input class="form-control documento"  type="text" name="documento" placeholder="Ingrese el número de transacción o documento">
                        </div>
                    </div>
                    <div class="col-4 col-md-4">
                        <table>
                            <tr>
                                <td>Total a Pagar:</td>
                                <td>$ 30</td>
                            </tr>
                        </table>
                        <div>
                            <a href="" class="btn btn-success">Comprar</a>
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
