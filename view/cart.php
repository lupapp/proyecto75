<a class="nav-link cart" data-target="#exampleModal" href="?controller=Main&action=showCart">
    <i class="fa fa-shopping-cart" data-toggle="tooltip" title="Carrito de compras"></i>
    <?php 
    $cantidad=0;
    $totalCart=0;
    $tipoUser=0;
    if(Session::get('carrito')){
        $carrito=Session::get('carrito');
        
        foreach($carrito as $ca){
            $cantidad=$cantidad+$ca['cant'];
            $totalCart=$totalCart+$ca['total'];
            $tipoUser=$tipoUser+$ca['tipoUser'];
        }
    }?>

    <span class="number"><?php echo $cantidad ?></span>
</a>
