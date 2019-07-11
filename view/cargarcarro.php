<?php @session_start();
$suma=0;
$cantidad=0;
$ds = DIRECTORY_SEPARATOR;  //1
$storeFolder = 'art';   //2
if(isset($_SESSION['carrito'])){


    if(isset($_POST['id_delete'])){
        $arreglo=$_SESSION['carrito'];
        $idDelete=$_POST['id_delete'];
        for($i=0;$i<count($arreglo);$i++){
            if($arreglo[$i]['id_cart']==$idDelete){
                unset($arreglo[$i]);
                $arreglo=array_values($arreglo);
                $_SESSION['carrito']=$arreglo;
            }
        }
        if(count($arreglo)==0){
                $_SESSION['carrito']=$arreglo;
                unset($_SESSION['total']);
                echo"<center>No hay productos</center>";

        }
    }
    if(isset($_POST['name'])&& $_POST['name']!=''){
        if(strcmp($_POST['modi'], 'edit') === 0){
            $arreglo=$_SESSION['carrito'];
            for ($i = 0; $i < count($arreglo); $i++) {
                if ($arreglo[$i]['id_cart'] == $_POST['id_cart']) {
                    $encontrado = true;
                    $numero = $i;
                }
            }
            $file = $_FILES['file'];
            $arreglo[$numero]['atributos']=$_POST['atributos'];
            $arreglo[$numero]['total']=($_POST['valor']+$_POST['shipping'])-$_POST['dis'];
            $arreglo[$numero]['file']= $file['name'];
            $arreglo[$numero]['namefile']=$_POST['namefile'];
            $arreglo[$numero]['nombre']=$_POST['name'];
            $arreglo[$numero]['img']=$_POST['img'];
            $arreglo[$numero]['art'] = $_POST['art'];
            $arreglo[$numero]['design'] = $_POST['design'];
            $arreglo[$numero]['cant']=$_POST['cantidad'];
            $arreglo[$numero]['price']=$_POST['valor'];
            $arreglo[$numero]['dis']= $_POST['dis'];
            $arreglo[$numero]['shipping']= $_POST['shipping'];
            $tempFile = $file['tmp_name'];          //3
            $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;  //4
            $targetFile = $targetPath . $file['name'];  //5
            move_uploaded_file($tempFile, $targetFile); //6
            $_SESSION['carrito']=$arreglo;
        }else {
            $arreglo = $_SESSION['carrito'];
            $encontrado = false;
            $numero = 0;
            $contador = 0;

            for ($i = 0; $i < count($arreglo); $i++) {
                if ($arreglo[$i]['id_cart'] == $_POST['id_cart']) {
                    $encontrado = true;
                    $numero = $i;
                }
            }

            if ($encontrado == true) {
                $arreglo[$numero]['cant'] = $arreglo[$numero]['cant'] + $_POST['cantidad'];
                $_SESSION['carrito'] = $arreglo;
            } else {
                $lastelement=end($arreglo);
                $idpriv=$lastelement['id_cart'];
                $idcart=$idpriv+1;
                $arreglo = $_SESSION['carrito'];
                $id = $_POST['id'];
                $file = $_FILES['file'];
                $namefile=$file['name'];
                $nombre = $_POST['name'];
                $cant = $_POST['cantidad'];
                $price = $_POST['valor'];
                $shipping=$_POST['shipping'];
                $dis = $_POST['dis'];
                $img = $_POST['img'];
                $modi = $_POST['modi'];
                $art = $_POST['art'];
                $artwork=$_POST['artwork'];
                $design = $_POST['design'];
                $atributos = $_POST['atributos'];
                $tempFile = $file['tmp_name'];          //3
                $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;  //4
                $targetFile = $targetPath . $file['name'];  //5
                move_uploaded_file($tempFile, $targetFile); //6

                $arregloNuevo = array(
                    'id_cart'=>$idcart,
                    'id' => $id,
                    'file' => $file['name'],
                    'namefile'=>$namefile,
                    'nombre' => $nombre,
                    'cant' => $cant,
                    'price' => $price,
                    'img' => $img,
                    'art' => $art,
                    'artwork'=>$artwork,
                    'design' =>$design,
                    'atributos' => $atributos,
                    'modi' => $modi,
                    'total' => ($price+$shipping)-$dis,
                    'dis' => $dis,
                    'shipping'=>$shipping
                );
                array_push($arreglo, $arregloNuevo);
                $_SESSION['carrito'] = $arreglo;
            }
        }

    }

}else{
	if(isset($_POST['name']) and $_POST['name']!=''){
        $id=$_POST['id'];
        $file=$_FILES['file'];
        $namefile=$file['name'];
		$nombre=$_POST['name'];
		$cant=$_POST['cantidad'];
        $price=$_POST['valor'];
        $shipping=$_POST['shipping'];
		$dis=$_POST['dis'];
        $img=$_POST['img'];
        $art = $_POST['art'];
        $artwork=$_POST['artwork'];
        $design = $_POST['design'];
        $atributos=$_POST['atributos'];
        $modi=$_POST['modi'];
        $tempFile = $file['tmp_name'];         //3
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
        $targetFile =  $targetPath. $file['name'];  //5
        move_uploaded_file($tempFile,$targetFile); //6

		$arreglo[]=array(
                'id_cart'=>1,
				'id'=>$id,
                'file'=>$file['name'],
                'namefile'=>$namefile,
				'nombre'=>$nombre,
				'cant'=>$cant,
				'price'=>$price,
                'img'=>$img,
                'art' => $art,
                'artwork'=>$artwork,
                'design' =>$design,
                'atributos'=>$atributos,
                'modi'=>$modi,
                'total'=>($price+$shipping)-$dis,
                'dis'=>$dis,
                'shipping'=>$shipping
				);
		
		$_SESSION['carrito']=$arreglo;
		
	}else{
	}
}
if(isset($_SESSION['carrito'])){
    $datos=$_SESSION['carrito'];            
    for($i=0;$i<count($datos);$i++){
        $suma= $datos[$i]['total']+$suma;
        $cantidad=$datos[$i]['cant']+$cantidad;
        $atri=json_decode($datos[$i]['atributos']);

        echo"
        
        <li>
          <div class='b-option-cart__items__img'>
              <div class='view view-sixth'>
                  <img data-retina='' src='Administer/public/img/".$datos[$i]['img']."' alt=''>
                  <div class='b-item-hover-action f-center mask'>
                      <div class='b-item-hover-action__inner'>
                          <div class='b-item-hover-action__inner-btn_group'>
                              <a href='#' class='b-btn f-btn b-btn-light f-btn-light info'><i class='fa fa-link'></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class='b-option-cart__items__descr'>
              <strong class='b-option-cart__descr__title f-option-cart__descr__title'><a href='#'>".$datos[$i]['nombre']." <ul>";

              foreach($atri as $a){
                  echo "<li>".$a->namea.": ".$a->namet."</li>";
              }
              echo "</ul></a></strong><span class='b-option-cart__descr__cost f-option-cart__descr__cost'>".$datos[$i]['cant']." x $".number_format($datos[$i]['price'], 2, ',', '.')."</span>
          </div>
          <i class='fa fa-times b-icon--fa quitar' data-atributos='".$datos[$i]['atributos']."' data-id_delete='".$datos[$i]['id_cart']."' data-id='".$datos[$i]['id']."' ></i>
        </li>
        ";


    }

}else{
    echo"<center>No hay productos</center>";
}
$_SESSION['cantidad']=$cantidad;
$_SESSION['total']=$suma;
?>