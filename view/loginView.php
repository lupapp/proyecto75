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
            <label for="exampleInputEmail1">Documento de identidad</label>
            <input class="form-control" id="exampleInputEmail1" type="text" name="cc" aria-describedby="emailHelp" placeholder="Ingrese documento de identidad">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="pass" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Recordar Contraseña</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" >Entrar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Registrarse</a>
       
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <?php include "footer.php";?>
</body>

</html>
