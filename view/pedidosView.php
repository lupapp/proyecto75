<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    if(Session::get('level')=='admin'){
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
            <li class="breadcrumb-item active">Pedidos </li>
            <a href="javascript:history.back(1)" class="btn btn-primary float-right cursor-pointer mr-2" >Regresar</a>
        </ol>
        <!-- Example DataTables Card-->
            <div class="card mb-3">

                <div class="card-body">
                    <?php
                    if(count($pedidos)>0){ ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID pedido</th>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>ID Membresía</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Valor</th>
                                    <th>Metodo de pago</th>
                                    <th>Cambio de estado</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID pedido</th>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>ID Membresía</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Valor</th>
                                    <th>Metodo de pago</th>
                                    <th>Cambio de estado <?php echo count($pedidos[0]['cartilla']); ?></th>
                                </tr>
                                </tfoot>
                                <tbody class="tbodySol">
                                <?php
                                for($i=0; $i<count($pedidos); $i++){ ?>
                                    
                                    <tr>
                                        <td><?php echo $pedidos[$i]['pedido']->id?></td>
                                        <td><?php echo $pedidos[$i]['pedido']->fecha?></td>
                                        <td><?php echo $pedidos[$i]['user']->user." | ".$pedidos[$i]['user']->name ?></td>
                                        <td><?php if(count($pedidos[$i]['cartilla'])>1){echo $pedidos[$i]['cartilla']->id;}else{}?></td>
                                        <td> <?php echo $pedidos[$i]['plan']->nombre_plan ?></td>
                                        <td><?php echo $pedidos[$i]['pedido']->cantidad?></td>
                                        <td>$ <?php echo $pedidos[$i]['pedido']->valor?></td>
                                        <td><?php echo $pedidos[$i]['pedido']->metodo?></td>
                                        <td><?php if($pedidos[$i]['pedido']->estado==0){ ?>
                                            <form action="?controller=Pedidos&action=cambioEstado" method="post">
                                                <input type="hidden" name="id" value="<?php echo $pedidos[$i]['pedido']->id?>">
                                                <input type="hidden" name="estado" value="1">
                                                <button class="btn btn-danger">Pendiente</button>
                                            </form>
                                            <?php }else{ ?>
                                                <form action="?controller=Pedidos&action=cambioEstado" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $pedidos[$i]['pedido']->id?>">
                                                    <input type="hidden" name="estado" value="0">
                                                    <button class="btn btn-success">Despachado</button>
                                                </form>
                                            <?php }?>
                                            </td>
                                    </tr>

                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php }else{
                         echo "<div  class='text-center text-primary w-100'>No hay historial de pedidos</div>";
                    }?>
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