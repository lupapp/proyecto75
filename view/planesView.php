<!DOCTYPE html>
<html lang="en">

<head>
  <?php if(Session::get('level')=='admin'){  
    include "header.php";
  }else{
    include "headerSt.php"; 
  } ?>
</head>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="?controller=Main" class="text-success">Back Office</a>
        </li>
        <li class="breadcrumb-item active">Membresías y Productos </li>
        <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-users"></i> Lista de Membresías
          <a class="btn btn-success float-right" href="?controller=Planes&action=create">Nueva membresía</a></div>
        <div class="card-body">
          <div class="table-responsive">
              <?php if ($allplanes!=''){ ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Avatar</th>
                  <th>Avatar Usuario</th>
                  <th>Membresía</th>
                  <th>Valor</th>
                    <th>Cantidad de hijos</th>
                  <th>% comisión</th>
                  <th>% bono</th>
                  <th>% fondo</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Avatar</th>
                  <th>Avatar Usuario</th>
                  <th>Membresía</th>
                  <th>Valor</th>
                    <th>Cantidad de hijos</th>
                  <th>% comisión</th>
                  <th>% bono</th>
                  <th>% fondo</th>
                  <th>Opciones</th>
                </tr>
              </tfoot>
              <tbody>
                <?php 
                foreach ($allplanes as $planes){ ?>
                <tr>
                    <td class="w-10"><img class="img-thumbnail" src="view/img/<?php echo $planes->avatar_plan?>"></td>
                    <td class="w-10"><img class="img-thumbnail " src="view/img/<?php echo $planes->avatar_user?>"></td>
                    <td><?php echo $planes->nombre_plan?></td>
                    <td><?php echo $planes->valor_plan?></td>
                    <td><?php echo $planes->cant_hijos?></td>
                    <td>Nivel1: <?php echo $planes->porcentaje1?>%<br/>
                      Nivel 2: <?php echo $planes->porcentaje2?>%<br/>
                      Nivel 3: <?php echo $planes->porcentaje3?>%<br/>
                      Nivle 4: <?php echo $planes->porcentaje4?>%<br/>
                      Nivel 5: <?php echo $planes->porcentaje5?>%<br/>
                    </td>
                    <td><?php echo $planes->valor_bono?></td>
                    <td><?php echo $planes->porcentaje_fondo?></td>
                    <td>
                        <a class="btn btn-warning btn-options" data-toggle="tooltip" title="Editar plan" href="?controller=Planes&action=show&id=<?php echo $planes->id?>"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                      
                <?php }
              }else{
                        echo "<center>No existen membresías</center>";
              } ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-users"></i> Lista de Productos
                <a class="btn btn-success float-right" href="?controller=Planes&action=create">Nuevo Producto</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php if ($productos!=''){ ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>% comisión</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>% comisión</th>
                            <th>Opciones</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach ($productos as $pro){ ?>
                            <tr>
                                <td class="w-10"><img class="img-thumbnail" src="view/img/<?php echo $pro->avatar_plan?>"></td>
                                <td><?php echo $pro->nombre_plan?></td>
                                <td><?php echo $pro->valor_plan?></td>
                                <td><?php echo $pro->cant_hijos?></td>
                                <td>Nivel1: <?php echo $pro->porcentaje1?>%<br/>
                                  Nivel 2: <?php echo $pro->porcentaje2?>%<br/>
                                  Nivel 3: <?php echo $pro->porcentaje3?>%<br/>
                                  Nivle 4: <?php echo $pro->porcentaje4?>%<br/>
                                  Nivel 5: <?php echo $pro->porcentaje5?>%<br/>
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-options" data-toggle="tooltip" title="Editar plan" href="?controller=Planes&action=show&id=<?php echo $pro->id?>"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>

                        <?php }
                        ?>
                        </tbody>
                    </table>
                    <?php }else{
                        echo "<center>No existen productos</center>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include "logoutModal.php"; ?>
    <!-- Bootstrap core JavaScript-->
     <?php include "footer.php"; ?>
  </div>
</body>

</html>