<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "headerMs.php";?>

  <div class="container">
    <form id="loginForm" action="?controller=Usuarios&action=crearUser" method="POST"  class="form-horizontal" >
    <div class="card mx-auto mt-5">
        <div class="card-header">
            <i class="fa fa-user-plus"></i> Obtener membresía
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
        </div>
            
        <div class="card-body">

                <div class=" pl-5 pr-5">
                     <h4>Datos de patrocinador</h4>
                     <div class="row">

                        <div class="col-md-3 pl-2 pr-4">
                            <div class="form-group">
                                <div class="form-group">
                                   <label for="exampleInputUser">*Escriba el usuario padre</label>
                                   <input class="form-control buscarPadre" id="exampleInputUser" name="padre" type="text" placeholder="Usuario padre">
                                   <input id="exampleInputUser" name="frontend" value="1" type="hidden" >
                                </div>
                                <div class="iduserPadre">
                                    <input id="exampleInputUser" name="id_cartilla" type="hidden" >
                                </div>
                            </div>
                        </div>
                         <div class="col-md-9 membresías">

                         </div>
                         <div class="col-md-12 planes">

                         </div>
                         <hr>
                         <input id="exampleInputUser" name="referido" type="hidden" >
                        <!--<div class="col-md-3 pl-2 pr-3">
                            <div class="form-group">
                                <div class="form-group">
                                   <label for="exampleInputUser">Escriba quien refiere</label>
                                   <input class="form-control buscarRef" id="exampleInputUser" type="text"  placeholder="Usuario referido">

                                </div>
                                <div class="iduserRef">
                                    <input id="exampleInputUser" name="referido" type="hidden" >
                                </div>
                            </div>
                        </div>-->
                        <div class="col-md-5 pl-2 pr-4">

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
                        </div>
                        <div class="col-md-5 pl-2 pr-4">
                            <div class="form-group">
                                <label class="">No. Transacción o documento</label>
                                <input class="form-control documento"  type="text" name="documento" placeholder="Ingrese el número de transacción o documento">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-5 pl-2 pr-4">
                            <div class="form-group">
                                <label for="exampleInputUser">*Escriba un usuario</label>
                                <input class="form-control verificarUser usuario" id="exampleInputUser" type="text" name="usuario" aria-describedby="usuario" placeholder="Nombre de usuario">
                                <div class="mensaje"></div>
                            </div>
                        </div>
                    </div>
                    <div class=" formularioUser row">
                        <div class="col-md-4 pl-3 pr-2">
                            <div class="form-group">
                                <label for="exampleInputName">*Nombre completo</label>
                                <input class="form-control nombre" id="exampleInputName" type="text" name="nombre" aria-describedby="nombre" placeholder="Nombre completo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">*Tipo de documento</label>
                                <select class="form-control tipoDocumento" name="tipoDocumento" id="exampleFormControlSelect1">
                                    <option>CI</option>
                                    <option>CE</option>
                                    <option>Pasaporte</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 pl-3 pr-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Email address</label>
                                <input class="form-control email" id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Correo electrónico">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Documento de indentidad</label>
                                <input class="form-control cc" id="exampleInputEmail1" type="text" name="cc" aria-describedby="emailHelp" placeholder="Documento de identidad">
                                <input class="form-control" type="hidden" name="rol"  value="standard">
                                <input type="hidden" name="nacimiento" value=''>
                                <input type="hidden" name="celular" value=''>
                                <input type="hidden" name="direccion" value=''>
                                <input type="hidden" name="ciudad">
                                <input type="hidden" name="provincia">
                                <input type="hidden" name="pais">
                                <input type="hidden" name="posicion" value="1">
                            </div>
                        </div>
                        <div class="col-md-4 pl-3 pr-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Teléfono</label>
                                <input class="form-control telefono" id="exampleInputEmail1" type="text" name="telefono" aria-describedby="emailHelp" placeholder="Escriba su número de teléfono">
                            </div>
                            
                            
                        </div>
                    </div>

                </div>
                <div class="row pb-5">
                    <div class="col-md-4 col-1"></div>
                    <div class="col-md-6 col-10">
                        <div class="checkbox">
                           <label style="font-size: 1em">
                               <input type="checkbox" name="terminos" value="1" checked>
                               <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                               <span class="font-weight-bold">Acepto Terminos</span>
                               <p>El registro de la membresía esta sujeta a revisión y aprobación, despues de registrada la membresía debe de ingresar el número de transacción o documento de deposito, para hacer efectivo el registro.</p>
                           </label>
                       </div>
                    </div>
                    <div class="col-md-4 col-1"></div>
                    <div class="col-md-4 col-10">
                       <button type="submit" class="btn btn-success w-100  cursor-pointer" >Registrar</button>
                    </div>
                 </div>    
                        
            </div>
                    
        </div>
                
                
               
        </form>
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
