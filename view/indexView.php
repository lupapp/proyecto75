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
      <?php if(Session::get('level')=='admin'){
            include "contadmin/escritorio.html";
         }else{
             include "contuser/red.html";
         } ?>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
    <!-- Scroll to Top Button-->
    
    <!-- Logout Modal-->
    <?php include 'logoutModal.php'; ?>
    <!-- Bootstrap core JavaScript-->
    <?php include "footer.php"; ?>
  </div>
</body>

</html>
