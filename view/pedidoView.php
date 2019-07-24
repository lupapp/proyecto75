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
                    <div class="col-md-12">
                        <div class="breadcrumb border-1">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="border border-secondary"><strong>Fecha</strong></th>
                                        <th class="border border-secondary"><strong>Nombre Usuario</strong></th>
                                        <th class="border border-secondary"><strong>Correo electrónico</strong></th>
                                        <th class="border border-secondary"><strong>Dirección</strong></th>
                                    </tr>
                                    <tr class="">
                                        <td class="border border-secondary">
                                                <strong> </strong> <?php echo $pedido['pedido']->fecha ?>
                                        </td>
                                        <td class="border border-secondary">
                                                <strong></strong> <?php echo $pedido['pedido']->name ?>
                                        </td>
                                        <td class="border border-secondary">
                                                <strong></strong> <?php echo $pedido['pedido']->email ?>
                                        </td>
                                        <td class="border border-secondary">
                                            <strong> </strong> <?php echo $pedido['pedido']->direccion ?>
                                        </td>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="breadcrumb border-1">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr class="border border-secondary">
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Valor unitario</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($pedido['lineas'] as $p){ ?>
                                    <tr class="border border-secondary">
                                        <td><?php echo $p->nombre_plan ?></td>
                                        <td><?php echo $p->cantidad ?></td>
                                        <td>$ <?php echo $p->precio ?></td>
                                        <td>$ <?php echo $p->total ?></td>
                                    </tr>
                                    
                                    <?php } ?>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td><strong>Total</strong></td>
                                        <td><strong>$ <?php echo $pedido['pedido']->valor ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
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