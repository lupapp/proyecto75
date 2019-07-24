<html lang="en">

<head>

    <?php include "headerMs.php";?>

    <link rel="stylesheet" type="text/css" href="view/tienda/css/main.css">

    <section class="page-body">
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="bannerCategorias">
                <h1>Nuestros Productos</h1>
            </div>
            
        </div>
    </div>   

    <div class="row">

        
        <div class="col-md-1">
        </div>
        <div class="col-md-10">

            <div class="row">

                <?php $constante= new Constantes();

                if(count($categorias)>0){

                    foreach ($categorias as $categoria){ ?>

                    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                        <!-- Block2 -->

                        <div class="block2">

                            <div class="block2-img wrap-pic-w of-hidden pos-relative cursor-pointer">
                                    
                                    <a href="?controller=Main&action=showProductos&id_cat=<?php echo $categoria->id ?>" class="btn btn-primary">
                                    <h2 class="titulo-categoria">
                                        <?php echo $categoria->nombre ?>
                                    </h2>
                                    <img class="" src="view/img/<?php echo $categoria->img ?>" alt="<?php echo $categoria->nombre ?>">
                                    </a>
                                    <div class="block2-btn-addcart trans-0-4">
                                        <a href="?controller=Main&action=showProductos&id_cat=<?php echo $categoria->id ?>"                                         class="btn btn-primary">
                                        <?php echo $categoria->nombre ?>
                                        </a>
                                    </div>

                            </div>

                        </div>


                    </div>

                <?php

                }

            }else{ ?>

                    <div class="s-text3 text-center p-5"> No hay productos </div>

               <?php  }

                ?>

            </div>

        </div>





    </div>



    </section>



    </div>

    <?php include "footerInit.php";?>

</body>

</html>