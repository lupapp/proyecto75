<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
  if(Session::get('level')=='admin'){  
    include "header.php";
  }else{
    include "headerSt.php"; 
  } ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     <?php if(Session::get('level')=='admin'){
        include "contadmin/editaruser.html";
     }else{
         include "contuser/editaruser.html";
     } ?> 
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    </div>
    <!-- Logout Modal-->
    <?php include 'logoutModal.php'; ?>
    <!-- Bootstrap core JavaScript-->
     <?php include "footer.php"; ?>
  </div>
</body>

</html>
