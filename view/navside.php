<nav class="nav flex-column nav-side">
    <h2>Categorías</h2>
    <?php
        $i=1; 
        foreach($categorias as $categoria){ 
            if(isset($catselect)){
                if($catselect==$categoria->id){
                    $class="active";
                }else{
                    $class="";
                }
            }else{
                if($i==1){
                    $class='active';
                }else{
                    $class='';
                }
            }?>
            <a class="nav-link <?php echo $class ?>" href="?controller=Planes&action=showProducto&id_cat=<?php echo $categoria->id?>"><?php echo $categoria->nombre?></a>
        <?php  
        $i++;
        } ?>
</nav>