<html lang="en">

<head>

    <?php include "headerMs.php";?>

    <link rel="stylesheet" type="text/css" href="view/tienda/css/main.css">

    <section class="page-body">

        <div class="row">

            <div class="col-md-2">

            </div>

            <div class="col-md-8">

                <div class="row">

                    <div class="container ">

                        <div class="l-inner-page-container">

                            <div class="alert-success">

                                <div class="row justify-content-md-center">

                                <div class="off"></div>

                                    <div class="col-md-8">

                                        <a href="../index.php" class="btn btn-success w-100 mt-2">

                                            <i class="fa fa-check"></i>

                                            Compra finalizada

                                        </a>

                                    </div>

                                <div class="col-md-12">

                                    <div class="card-body ">

                                        <div class="row">



                                            <div class="col-md-3">

                                                <div class="breadcrumb border-1">

                                                    <strong> </strong> <?php echo $pedido['pedido']->fecha ?>

                                                </div>

                                            </div>

                                            <div class="col-md-5">

                                                <div class="breadcrumb border-1">

                                                    <strong></strong> <?php echo $pedido['user']->name ?>

                                                </div>

                                            </div>

                                            <div class="col-md-4">

                                                <div class="breadcrumb border-1">

                                                    <strong></strong> <?php echo $pedido['user']->email ?>

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="breadcrumb border-1">

                                                    <strong> </strong> <?php echo $pedido['user']->direccion ?>

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="breadcrumb border-1">

                                                    <table class="table table-striped table-bordered">

                                                        <thead>

                                                        <tr>

                                                            <th>Producto</th>

                                                            <th>Cantidad</th>

                                                            <th>Valor unitario</th>

                                                            <th>Total</th>

                                                        </tr>

                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            
                                                            foreach($pedido['lineas'] as $p){ ?>
                                                            <tr>

                                                                <td><?php echo $p->id_plan ?></td>
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

                            </div>

                            </div>

                        </div>

                        </div>

                </div>

            </div>

        </div>

    </section>

    <?php include "footerInit.php";?>

</body>

</html>

