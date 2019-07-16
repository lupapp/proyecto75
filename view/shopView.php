<html lang="en">

<head>

    <?php include "headerMs.php";?>

    <link rel="stylesheet" type="text/css" href="view/tienda/css/main.css">

    <section class="page-body">

    <div class="row">

        <div class="col-md-1">
           

        </div>
        <div class="col-md-2">
        <?php include "navside.php"; ?>
        </div>
        <div class="col-md-8">

            <div class="row">

                <?php $constante= new Constantes();

                if(count($productos)>0){

                    foreach ($productos as $prod){ ?>

                    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                        <!-- Block2 -->

                        <div class="block2">

                            <div class="block2-img wrap-pic-w of-hidden pos-relative ">

                                <img src="view/img/<?php echo $prod->avatar_plan ?>" alt="IMG-PRODUCT">



                                <div class="block2-overlay trans-0-4">

                                    <!-- <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">

                                         <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>

                                         <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>

                                     </a>-->



                                    <div class="block2-btn-addcart  trans-0-4">

                                        <!-- Button -->

                                        <a href="<?php $constante->getPath(); ?>?Controller=Main&action=comprar&id=<?php echo $prod->id ?>   "

                                           class="btn btn-primary">

                                            Comprar

                                        </a>

                                    </div>

                                </div>

                            </div>



                            <h2 class="block-txt p-t-20 text-center   ">

                                <a href="product-detail.html" class="block2-name dis-block s-text2 p-b-5">

                                    <?php echo $prod->nombre_plan ?>

                                </a>

                                <?php 
                                
                                if(Session::get('autenticado')){  

                                     $cartilla=Session::get('membresias'); 

                                     $cartilla=Session::get('membresias');

                                     if(count($cartilla)>1){ 

                                        $vigencia=0;

                                        for ($i = 1; $i < count($cartilla); $i++) {

                                            if($cartilla[$i]['vigencia']==1){

                                                $vigencia++;

                                            }

                                            

                                        }

                                        if($vigencia>0){

                                            $descuento=($prod->descuento/100)*$prod->valor_plan;

                                            $valor=number_format($prod->valor_plan-$descuento,2,'.', '');

                                            echo '<span class="block2-price m-text20 p-r-5 valorPro">

                                                $'.$valor.'

                                            </span>';

                                        }else{

                                            echo '<span class="block2-price m-text20 p-r-5 valorPro">

                                                $'.number_format($prod->valor_plan,2,'.', '').'

                                            </span>';

                                        }

                                    }else{
                                        echo '<span class="block2-price m-text20 p-r-5 valorPro">

                                            $'.number_format($prod->valor_plan,2,'.', '').'

                                        </span>';
                                    }

    

                                }else{

                                    echo '<span class="block2-price m-text20 p-r-5 valorPro">

                                        $'.number_format($prod->valor_plan,2,'.', '').'

                                    </span>

                                    '; 

                                }?>

                                

                        </div>

                        <div class="block2-wrapbtn p-t-20 text-align">

                            <a href="<?php $constante->getPath(); ?>?Controller=Main&action=comprar&id=<?php echo $prod->id ?>"

                               class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">

                                Comprar

                            </a>

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