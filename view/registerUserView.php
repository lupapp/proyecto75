<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "headerMs.php";?>

  <div class="container">
    <form id="loginForm" action="?controller=Usuarios&action=crear" method="POST"  class="form-horizontal" >
    <div class="card mx-auto mt-5">
        <div class="card-header">
            <i class="fa fa-user-plus"></i> Registro de usuario
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
        </div>
            
        <div class="card-body w-75 mx-auto">

                <div class=" pl-5 pr-5">
                     <h4>Registro de usuario</h4>
                     <div class="row">
                        <div class="col-md-6 pl-2 pr-4">
                            <div class="form-group">
                                <label for="exampleInputUser">*Escriba un usuario</label>
                                <input class="form-control verificarDisponible usuario" id="exampleInputUser" type="text" name="usuario" aria-describedby="usuario" placeholder="Nombre de usuario">
                                <div class="mensaje"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputName">*Contraseña</label>
                                <input class="form-control nombre" id="exampleInputName" type="text" name="password" aria-describedby="nombre" placeholder="Nombre completo">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputName">*Tipo de documento</label>
                                <select class="form-control tipoDocumento" name="tipoDocumento" id="exampleFormControlSelect1">
                                    <option>CI</option>
                                    <option>CE</option>
                                    <option>Pasaporte</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Email address</label>
                                <input class="form-control email" id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Correo electrónico">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Dirección</label>
                                <input class="form-control telefono" id="exampleInputEmail1" type="text" name="direccion" aria-describedby="emailHelp" placeholder="Escriba su número de teléfono">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Ciudad</label>
                                <input class="form-control telefono" id="exampleInputEmail1" type="text" name="ciudad" aria-describedby="emailHelp" placeholder="Escriba su número de teléfono">
                            </div>
                        </div>
                        <div class="col-md-6 pl-3 pr-2">
                            <div class="form-group">
                                <label for="exampleInputName">*Nombre completo</label>
                                <input class="form-control nombre" id="exampleInputName" type="text" name="nombre" aria-describedby="nombre" placeholder="Nombre completo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">*Escriba nuevamente la contraseña</label>
                                <input class="form-control nombre" id="exampleInputName" type="text" name="confirmPassword" aria-describedby="nombre" placeholder="Nombre completo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Documento de indentidad</label>
                                <input class="form-control cc" id="exampleInputEmail1" type="text" name="cc" aria-describedby="emailHelp" placeholder="Documento de identidad">
                                <input class="form-control" type="hidden" name="rol"  value="standard">
                                <input type="hidden" name="nacimiento" value=''>
                                <input type="hidden" name="celular" value=''>
                                <input type="hidden" name="posicion" value="1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Teléfono</label>
                                <input class="form-control telefono" id="exampleInputEmail1" type="text" name="telefono" aria-describedby="emailHelp" placeholder="Escriba su número de teléfono">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Provincia</label>
                                <input class="form-control telefono" id="exampleInputEmail1" type="text" name="provincia" aria-describedby="emailHelp" placeholder="Escriba su número de teléfono">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">*País</label>
                                <input class="form-control telefono" id="exampleInputEmail1" type="text" name="pais" aria-describedby="emailHelp" placeholder="Escriba su número de teléfono">
                            </div>
                        </div>
                        <div class="col-md-3 col-1">
                        </div>
                        <div class="col-md-6 col-10">
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
