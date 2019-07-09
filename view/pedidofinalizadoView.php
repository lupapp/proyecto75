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

                                <div class="col-md-10">

                                    <div class="card-body ">

                                        <div class="row">



                                            <div class="col-md-3">

                                                <div class="breadcrumb border-1">

                                                    <strong>Fecha: </strong> <?php echo $pago['pago']->fecha_pago ?>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="breadcrumb border-1">

                                                    <strong>Nombre:</strong> <?php echo $pago['user']->name ?>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="breadcrumb border-1">

                                                    <strong>Email: </strong> <?php echo $pago['user']->email ?>

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="breadcrumb border-1">

                                                    <strong>Dirección: </strong> <?php echo $pago['user']->direccion ?>

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="breadcrumb border-1">

                                                    <table class="table table-striped table-bordered">

                                                        <thead>

                                                        <tr>

                                                            <th>Producto</th>

                                                            <th>Calidad</th>

                                                            <th>Valor unitario</th>

                                                            <th>Total</th>

                                                        </tr>

                                                        </thead>

                                                        <tbody>

                                                            <tr>

                                                                <td><?php echo $pago['plan']->nombre_plan ?></td>
                                                                <td><?php echo $pago['pago']->posicion ?></td>
                                                                <td><?php echo $pago['pago']->valor/$pago['pago']->posicion ?></td>
                                                                <td><?php echo $pago['pago']->valor ?></td>

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

