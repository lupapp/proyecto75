<nav class="nav flex-column nav-side">
    <h2>Categorías</h2>
    <?php
        $i=1; 
        foreach($categorias as $categoria){ 
            if(isset($_GET['id_cat'])){
                if($_GET['id_cat']==$categoria->id){
                    $class="active";
                }else{
                    $class="";
                }
            }?>
            <a class="nav-link <?php echo $class ?>" href="?controller=Main&action=showProductos&id_cat=<?php echo $categoria->id?>"><?php echo $categoria->nombre?></a>
        <?php  
        $i++;
        } ?>
</nav>