<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "headerMs.php";?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
       <div class="card-header">Login</div>
      <div class="card-body">
          <form action="?controller=Login&action=login" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre de usuario o correo electrónico</label>
            <input class="form-control" id="exampleInputEmail1" type="text" name="value" aria-describedby="emailHelp" placeholder="Usuario o correo electrónico">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="pass" placeholder="Contraseña">
          </div>
          
          <button class="btn btn-primary btn-block" type="submit" >Entrar</button>
           <a href="javascript:history.back(1)" class="btn btn-success btn-block cursor-pointer mr-2" >Regresar</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="?controller=Main&action=registerShow">Registrarse</a>
          <a class="d-block small mt-3" href="?controller=Main&action=recordar">Olvide la contraseña</a>
         
          
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <?php include "footerInit.php";?>
</body>

</html>
