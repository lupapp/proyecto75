
<?php 
@session_start();
$suma=0;
$cantidad=0;
include "../php/config.php";
echo"<script>
function actvalores(){
      $('.totalcarrito').load('php/actualizarvalor.php');
  }
 function actcant(){
      $('.cantCart').load('php/actualizarcantidad.php');
  } 
 $('#cancelCart').click(function(){
    $('.cantidadt').load('php/actualizarcantidad.php');   
    actvalores();
 });
$('.masitem').click(function(){ 
    $('.cargando').fadeIn();
    var id_prod = $(this).data('id_prod');
    var det = $(this).data('det');
    var delivery = $('.delivery span').text();
      $.ajax({
      type: 'POST',
      url: 'php/cargarcarro.php',
      data: {
      		'delivery':delivery,
			'id-mas' : id_prod,
			'det' : det                     
      },
      dataType: 'html',
      error: function(){
        alert('error petición ajax');
      },
      success:function(data){
        $('.itemCart').html(data);  
        $('.cargando').fadeOut();

      }
        }); 
     actcant();
     actvalores();
  });  
  $('.menositem').click(function(){   
    $('.cargando').fadeIn();
    var id_prod = $(this).data('id_prod');
    var det = $(this).data('det');
    var delivery = $('.delivery span').text();
      $.ajax({
      type: 'POST',
      url: 'php/cargarcarro.php',
      data: {
      			'delivery':delivery,
				'id-menos' : id_prod,
				'det' : det                     
      },
      dataType: 'html',
      error: function(){
        alert('error petición ajax');
      },
      success:function(data){
        $('.itemCart').html(data);  
        $('.cargando').fadeOut();

      }
        }); 
    actcant();
    actvalores();
  
  });
  $('.quitar').click(function(){    
    $('.cargando').fadeIn();
    var id_prod = $(this).data('id_prod');
    var det = $(this).data('det');
    var delivery = $('.delivery span').text();
      $.ajax({
      type: 'POST',
      url: 'php/cargarcarro.php',
      data: {
      			'delivery':delivery,
				'id-delete' : id_prod,
				'det' : det                     
      },
      dataType: 'html',
      error: function(){
        alert('error petición ajax');
      },
      success:function(data){
        $('.itemCart').html(data);  
        $('.cargando').fadeOut();

      }
        }); 
    actcant();
    actvalores();
  });
    actvalores();
    actcant();
</script>";
 $domicilio = number_format(1, 2);
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
if(isset($_SESSION['carrito'])){
    if(isset($_POST['id-menos']) ){
            $arreglo=$_SESSION['carrito'];
            $encontrado=false;
            $numero=0;
            $numero2=0;
            $idMenos=$_POST['id-menos'];
            $det=$_POST['det'];


            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['id']==$idMenos && $det==$arreglo[$i]['deta']){
                    if($arreglo[$i]['cant']==1){
                        unset($arreglo[$i]);
                        $arreglo=array_values($arreglo);
                        $_SESSION['carrito']=$arreglo;									
                    }
                }
            }			
            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['id']==$idMenos && $det==$arreglo[$i]['deta']){
                    if($arreglo[$i]['cant'] > 1){
                        $arreglo[$i]['cant']--;
                        $_SESSION['carrito']=$arreglo;
                    }
                }
            }
            if(count($arreglo)==0){
                $_SESSION['carrito']=$arreglo;
                unset($_SESSION['total']);
                echo"<center>No hay productos</center>";
            }
    }
    if(isset($_POST['id-mas']) && isset($_POST['det'])){
        $arreglo=$_SESSION['carrito'];
        $idMas=$_POST['id-mas'];
        $det=$_POST['det'];
        for($i=0;$i<count($arreglo);$i++){			
            if($arreglo[$i]['id']==$idMas && $det==$arreglo[$i]['deta']){
                $arreglo[$i]['cant']++;
                $_SESSION['carrito']=$arreglo;
            }
        }
    }

    if(isset($_POST['id-delete'])){
        $arreglo=$_SESSION['carrito'];
        $idDelete=$_POST['id-delete'];
        $det=$_POST['det'];

        for($i=0;$i<count($arreglo);$i++){
            if($arreglo[$i]['id']==$idDelete && $det==$arreglo[$i]['deta']  ){
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
    if(isset($_POST['nombre'])&& $_POST['nombre']!=''){
        $arreglo=$_SESSION['carrito'];
        $encontrado=false;
        $numero=0;
        $contador=0;
        for($i=0;$i<count($arreglo);$i++){		
                if($arreglo[$i]['nombre']==$_POST['nombre'] ){	
                        if(isset($_POST['deta'])){			 		
                                if($arreglo[$i]['deta']==$_POST['deta']){					
                                        $encontrado=true;
                                        $numero=$i;	
                                }
                        }else{
                                $encontrado=true;
                                $numero=$i;
                        }					
                }			
        }

        if($encontrado==true){
                $arreglo[$numero]['cant']=$arreglo[$numero]['cant']+$_POST['cantidad'];
                $_SESSION['carrito']=$arreglo;
        }else{	
        $arreglo=$_SESSION['carrito'];		
        $id_prod=$_POST['id_prod'];
        $nombre=$_POST['nombre'];
        $cant=$_POST['cantidad'];
        $price=$_POST['valor'];
        $hora=$_POST['hora'];
        $deta=$_POST['deta'];
        if(isset($_POST['option'])){
                $options=$_POST['option'];	
        }else{

                $options=0;
        }	


        $arregloNuevo=array(
                        'id'=>$id_prod,
                        'nombre'=>$nombre,
                        'cant'=>$cant,
                        'price'=>$price,
                        'hora'=>$hora,
                        'option'=>$options,
                        'deta'=>$deta

                        );
        array_push($arreglo, $arregloNuevo);
        $_SESSION['carrito']=$arreglo;
        }

    }
}else{
$valor=0;
	if(isset($_POST['nombre']) && $_POST['nombre']!=''){		
        $id_prod=$_POST['id_prod'];
		$nombre=$_POST['nombre'];
		$cant=$_POST['cantidad'];
		$price=$_POST['valor'];
		$hora=$_POST['hora'];
		$deta=$_POST['deta'];
		if(isset($_POST['option'])){
			$options=$_POST['option'];	
		}else{
			
			$options=0;
		}
		
                $delivery=array(
                    'v'=>number_format($domicilio,2),
                    'delv'=>'Domicilio'
                );
                $_SESSION['delivery']=$delivery;
		$arreglo[]=array(
				'id'=>$id_prod,
				'nombre'=>$nombre,
				'cant'=>$cant,
				'price'=>$price,
				'hora'=>$hora,
				'option'=>$options,
				'deta'=>$deta
				
				
				);
		
		$_SESSION['carrito']=$arreglo;
		
	}else{
	}
}
if(isset($_SESSION['carrito'])){
    $datos=$_SESSION['carrito'];            
    for($i=0;$i<count($datos);$i++){
        $suma= $datos[$i]['price']*$datos[$i]['cant']+$suma; 
        $cantidad=$datos[$i]['cant']+$cantidad;
        echo"
        <div class='itemCartscroll'>";
            if($datos[$i]['option']!=0){
            echo"<div class='detalleItem'>
                <h4>".$datos[$i]['nombre']."</h4>";
                for($j=0;$j<count($datos[$i]['option']);$j++){
                        echo "<p>".$datos[$i]['option'][$j]['grupo'].": 
                        ".$datos[$i]['option'][$j]['namead']."</p>
                        ";
                }
            echo"</div>";
            }else{
                echo"<div class='detalleItem'>
                        Sin adiciones
                </div>";
            }
            echo"<div class='productQuantity dropdown '>
                    <div class='cont-qua'>
                        <span class='masitem icon-arrow-mas' data-id_prod='".$datos[$i]['id']."' data-det='";
                        $detalle=''; 
                        for($j=0;$j<count($datos[$i]['option']);$j++){
                            $detalle=$detalle.$datos[$i]['option'][$j]['namead'];
                        } 
                        echo "".$detalle."'>
                        </span><span> ".$datos[$i]['cant']."</span>
                        <span class='menositem icon-arrow-menos' data-id_prod='".$datos[$i]['id']."' data-det='".$detalle."'></span>  
                    </div>
                </div>
                <div class='name'>
                        ".$datos[$i]['nombre']."
                </div>
                <div class='remove'>
                    <a class='quitar icon-cancel' data-id_prod='".$datos[$i]['id']."' data-det='".$detalle."'></a>
                </div>
                <div class='price'>
                        ".number_format($datos[$i]['price']*$datos[$i]['cant'],2,'.', '')."
                </div>

        </div>";

    }
}else{
    echo"<center>No hay productos</center>";
    unset($_SESSION['total']);
}
$_SESSION['suma']=number_format($suma,2,'.', '');
$_SESSION['cantidad']=$cantidad;
$_SESSION['total']=number_format($_SESSION['suma']+$_SESSION['delivery']['v'],2,'.', '');
?>