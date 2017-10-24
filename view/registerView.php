<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "headerMs.php";?>
  <div class="container">
    <div class="card mx-auto mt-5">
       <div class="card-header">
            <i class="fa fa-user-plus"></i> Registro de nuevo usuario</div>
        <div class="card-body">
            <form id="loginForm" action="?controller=Main&action=register" method="POST"  class="form-horizontal" >
                    <div class="form-row">
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputUser">*Nombre de usuario</label>
                                <input class="form-control" id="exampleInputUser" type="text" name="usuario" aria-describedby="usuario" placeholder="Nombre de usuario">
                             </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputUser">*Contraseña</label>
                                <input class="form-control" id="exampleInputUser" type="password" name="password" aria-describedby="Ingrese una contraseña" placeholder="Ingrese una contraseña">
                             </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputUser">*Nuevamente la contraseña</label>
                                <input class="form-control" id="exampleInputUser" type="password" name="confirmPassword" aria-describedby="vuelva a escribir la contraseña" placeholder="Ingrese una contraseña">
                             </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="exampleInputName">*Nombre completo</label>
                                <input class="form-control" id="exampleInputName" type="text" name="nombre" aria-describedby="nombre" placeholder="Nombre completo">
                             </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="exampleInputEmail1">*Email address</label>
                                <input class="form-control" id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Correo electrónico">
                             </div>
                        </div>
                         
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputName">*Tipo de documento</label>
                                <select class="form-control" name="tipoDocumento" id="exampleFormControlSelect1">
                                    <option>CI</option>
                                    <option>CE</option>
                                    <option>Pasaporte</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">*Documento de indentidad</label>
                                <input class="form-control" id="exampleInputEmail1" type="text" name="cc" aria-describedby="emailHelp" placeholder="Documento de identidad">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputName">Fecha de nacimiento</label>
                                <div class="input-group date fj-date">
                                    <input type="text" name="nacimiento" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                  <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName">Teléfono</label>
                            <input class="form-control" id="exampleInputName" type="text" name="telefono" aria-describedby="nombre" placeholder="Número de teléfono">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Celular</label>
                            <input class="form-control" id="exampleInputEmail1" type="text" name="celular" aria-describedby="emailHelp" placeholder="Número de celular">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Dirección</label>
                            <input class="form-control" id="exampleInputEmail1" type="text" name="direccion" aria-describedby="emailHelp" placeholder="Dirección">
                        </div>
                    </div>
                  </div>
               
              
                  <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName">Ciudad</label>
                            <input class="form-control" id="exampleInputName" type="text" name="ciudad" aria-describedby="nombre" placeholder="Ciudad">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Provincia</label>
                            <input class="form-control" id="exampleInputEmail1" type="text" name="provincia" aria-describedby="emailHelp" placeholder="Provincia">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">País</label>
                            <input class="form-control" id="exampleInputEmail1" type="text" name="pais" aria-describedby="emailHelp" placeholder="País">
                        </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary float-right cursor-pointer" >Registrar</button>
                <a href="javascript:history.back(1)" class="btn btn-success float-right cursor-pointer mr-2" >Regresar</a>
            </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <?php include "footerInit.php";?>
</body>

</html>
