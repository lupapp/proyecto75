<!DOCTYPE html>
<html lang="en">

<head>
    <style>body{background:url(view/img/error.jpg)}</style>
  <?php include "headerMs.php";?>
    
  <div class="container">
    <div class="card card-login mx-auto mt-0">
      <div class="card-body">
        <div class="text-center mt-4 mb-5 ">
          <h4 class="mensajeError"><?php echo $mensaje ?></h4>
          
        </div>
          <?php if($linkBoton){ ?>
                <a class="btn btn-success btn-block" href="<?php echo $linkBoton ?>">Ok</a>
          <?php } ?>
        <div class="text-center">
         <?php if($link){
              echo $link;
          } ?>
        </div>
      </div>
    </div>
  </div>
  <?php include "footer.php"; ?>
</body>

</html>
