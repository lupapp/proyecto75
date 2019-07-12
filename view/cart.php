<a class="nav-link cart" data-target="#exampleModal" href="?controller=Main&action=showCart">
    <i class="fa fa-shopping-cart" data-toggle="tooltip" title="Carrito de compras"></i>
    <?php 
    $cantidad=0;
    if(Session::get('carrito')){
        $carrito=Session::get('carrito');
        
        foreach($carrito as $ca){
            $cantidad=$cantidad+$ca['cant'];
        }
    }?>

    <span class="number"><?php echo $cantidad ?></span>
</a>
