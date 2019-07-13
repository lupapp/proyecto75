<?php



class MainController extends ControladorBase{

     public function __construct() {

        parent::__construct();

    }

    public function index(){

        if(!Session::get('autenticado')){

            header("location:?controller=Login");

        }else{

            if(Session::get('level')=='admin'){

                header("location:?controller=Usuarios");

            }else{

                header("location:?controller=Login");

            }

        }

        Session::tiempo();

    }

    public function registerShow(){

        $usuario=new Usuario();

        $plan=$usuario->getMinValor('planes');

        $this->view("register",  array('plan'=>$plan));

    }

    public function registerUser(){

        $usuario=new Usuario();

        $plan=$usuario->getMinValor('planes');

        $this->view("registerUser",  array('plan'=>$plan));

    }
    public function deleteCart(){
        Session::destroy('carrito');
        return true;
    }
    public function addCart(){
        if(Session::get('carrito')){
            if(isset($_POST['control']) && $_POST['control']==1){
                $arreglo=Session::get('carrito');
                $idDelete=$_POST['id'];
                for($i=0;$i<count($arreglo);$i++){
                    if ($arreglo[$i]['id'] == $idDelete && $arreglo[$i]['id_cartilla']==$_POST['id_cartilla']){
                        unset($arreglo[$i]);
                        $arreglo=array_values($arreglo);
                        Session::set('carrito',$arreglo);
                    }
                }
                if(count($arreglo)==0){
                    Session::set('carrito',$arreglo);
                    Session::destroy('carrito');
                    echo 0;
                }else{
                    echo json_encode(Session::get('carrito'));        
                }
            }
            if(isset($_POST['control']) && $_POST['control']==2){
                $arreglo=Session::get('carrito');
                $encontrado=false;
                $numero=0;
                $idMenos=$_POST['id'];
    
                for($i=0;$i<count($arreglo);$i++){
                    if($arreglo[$i]['id'] == $idMenos && $arreglo[$i]['id_cartilla']==$_POST['id_cartilla']){
                        if($arreglo[$i]['cant']==1){
                            unset($arreglo[$i]);
                            $arreglo=array_values($arreglo);
                            Session::set('carrito',$arreglo);
                        }else{
                            $arreglo[$i]['cant']--;
                            $total=$arreglo[$i]['cant']*$arreglo[$i]['price'];
                            $arreglo[$i]['total']=$total;
                            Session::set('carrito',$arreglo);
                        }
                    }
                }			
                if(count($arreglo)==0){
                    Session::set('carrito',$arreglo);
                    Session::destroy('carrito');
                    echo 0;
                }else{
                    echo json_encode(Session::get('carrito'));
                }
            }
            if(isset($_POST['control']) && $_POST['control']==3){
                $arreglo=Session::get('carrito');
                $idMas=$_POST['id'];
                for($i=0;$i<count($arreglo);$i++){			
                    if($arreglo[$i]['id'] == $idMas && $arreglo[$i]['id_cartilla']==$_POST['id_cartilla']){
                        $arreglo[$i]['cant']++;
                        $total=$arreglo[$i]['cant'] *$arreglo[$i]['price'];
                        $arreglo[$i]['total']=$total;
                        Session::set('carrito',$arreglo);
                    }
                }
                echo json_encode(Session::get('carrito'));
            }
            if(isset($_POST['control']) && $_POST['control']==4){
                $arreglo=Session::get('carrito');
                $id=$_POST['id'];
                $valor=$_POST['valor'];
                
                for($i=0;$i<count($arreglo);$i++){
                    if ($arreglo[$i]['id'] == $id && $arreglo[$i]['id_cartilla']==$_POST['id_cartilla']){
                        if($valor<=0){
                            Session::set('carrito',$arreglo);
                            Session::destroy('carrito');
                            echo 0;
                        }else{
                            $arreglo[$i]['cant']=$valor;
                            $total=$arreglo[$i]['cant'] *$arreglo[$i]['price'];
                            $arreglo[$i]['total']=$total;
                            Session::set('carrito',$arreglo);
                            echo json_encode(Session::get('carrito'));   
                        }
                    }
                }
            }
            if(isset($_POST['nombre'])){
                    
                $arreglo=Session::get('carrito');
                $encontrado = false;
                $numero = 0;
                $contador = 0;
    
                for ($i = 0; $i < count($arreglo); $i++) {
                    if ($arreglo[$i]['id'] == $_POST['id'] && $arreglo[$i]['id_cartilla']==$_POST['id_cartilla']) {
                        $encontrado = true;
                        $numero = $i;
                    }
                }
    
                if ($encontrado == true) {
                    $total=($arreglo[$numero]['cant'] + $_POST['cantidad'])*$arreglo[$numero]['price'];
                    $totalneto=($arreglo[$numero]['cant'] + $_POST['cantidad'])*$arreglo[$numero]['priceneto'];
                    $arreglo[$numero]['cant'] = $arreglo[$numero]['cant'] + $_POST['cantidad'];
                    $arreglo[$numero]['total']=$total;
                    $arreglo[$numero]['totalneto']=$totalneto;
                    Session::set('carrito',$arreglo);
                } else {
                    $arreglo=Session::get('carrito');
                    $id = $_POST['id'];
                    $id_user=$_POST['id_user'];
                    $id_cartilla=$_POST['id_cartilla'];
                    $id_padre=$_POST['id_padre'];
                    $nombre = $_POST['nombre'];
                    $cant = $_POST['cantidad'];
                    $price = $_POST['valor'];
                    $priceneto=$_POST['valorneto'];
                    $img = $_POST['img'];
                    $tipoUser=$_POST['tipouser'];
                    $total=$price*$cant;
                    $totalneto=$priceneto*$cant;
                    
                    $arregloNuevo = array(
                        'id' => $id,
                        'id_user'=>$id_user,
                        'id_cartilla'=>$id_cartilla,
                        'id_padre'=>$id_padre,
                        'nombre' => $nombre,
                        'cant' => $cant,
                        'tipoUser'=>$tipoUser,
                        'priceneto'=> $priceneto,
                        'price' => $price,
                        'img' => $img,
                        'totalneto'=>$totalneto,
                        'total' => $total
                    );
                    array_push($arreglo, $arregloNuevo);
                    Session::set('carrito',$arreglo);
                }
                echo json_encode(Session::get('carrito'));
            }
            
        }else{
            if($_POST['nombre']!=''){
                $id = $_POST['id'];
                $id_user=$_POST['id_user'];
                $id_cartilla=$_POST['id_cartilla'];
                $id_padre=$_POST['id_padre'];
                $nombre = $_POST['nombre'];
                $cant = $_POST['cantidad'];
                $price = $_POST['valor'];
                $priceneto=$_POST['valorneto'];
                $img = $_POST['img'];
                $tipoUser=$_POST['tipouser'];
                $total=$price*$cant;
                $totalneto=$priceneto*$cant;

                $arreglo[]=array(
                    'id' => $id,
                    'id_user'=>$id_user,
                    'id_cartilla'=>$id_cartilla,
                    'id_padre'=>$id_padre,
                    'nombre' => $nombre,
                    'cant' => $cant,
                    'tipoUser'=>$tipoUser,
                    'priceneto'=> $priceneto,
                    'price' => $price,
                    'img' => $img,
                    'totalneto'=>$totalneto,
                    'total' => $total
                );
                Session::set('carrito',$arreglo);
                echo json_encode(Session::get('carrito'));
            }else{
            }
        } 
    }
    public function comprar(){

        $usuario=new Usuario();

        $producto=$usuario->getByIdTable($_GET['id'], 'planes');

        $plan=$usuario->getMinValor('planes');

        $this->view("compra",  array('plan'=>$plan, 'producto'=>$producto));

    }
    public function showCart(){
        $this->view("cart",  array());
    }
    public function showProductos(){
        $plan = new Plan;
        $categorias=$plan->getAllCategoriasByTable('categorias');
        if(isset($_GET['id_cat'])){
            $id_cat=$_GET['id_cat'];
            $productos=$plan->getProdByCat($id_cat);
        }else{
            $productos = $plan->getAllProductos();
        }
        
        $this->view("shop", array('productos' => $productos,'categorias'=>$categorias));
    }

    public function createUserLink(){

        if(isset($_GET['id'])){

            $id=(int)$_GET['id'];

            $usuario=new Usuario();

            $user=$usuario->getUserByCartilla2($_GET['id']);

            $plan=$usuario->getUserByCartilla($_GET['id']);

            $this->view("nuser",array('plan'=>$plan, 'user'=>$user));

        }

    }

    public function register(){

       

        if(isset($_POST['nombre'])){

            $user=$_POST['usuario'];

            $nombre=$_POST['nombre'];

            $email=$_POST['email'];

            $password=$_POST['password'];

            $tipoDocumento=$_POST['tipoDocumento'];

            $cc=$_POST['cc'];

            $nacimiento=$_POST['nacimiento'];

            $telefono=$_POST['telefono'];

            $celular=$_POST['celular'];

            $direccion=$_POST['direccion'];

            $ciudad=$_POST['ciudad'];

            $provincia=$_POST['provincia'];

            $pais=$_POST['pais'];

            $rol="standard";

            $fechaactual= getdate();

             require_once 'config/headers.php';

             require_once 'config/cuerposMails.php';

            $usuario= new Usuario();

            $usuario->setUser($user);

            $usuario->setName($nombre);

            $usuario->setEmail($email);

            $usuario->setPassword(md5($password));

            $usuario->setTipoDocumento($tipoDocumento);

            $usuario->setCc($cc);

            $usuario->setNacimiento($nacimiento);

            $usuario->setFechaInscripcion($fechaactual['mday']."/".$fechaactual['mon']."/".$fechaactual['year']);

            $usuario->setTelefono($telefono);

            $usuario->setCelular($celular);

            $usuario->setDireccion($direccion);

            $usuario->setCiudad($ciudad);

            $usuario->setProvincia($provincia);

            $usuario->setPais($pais);

            $usuario->setRol($rol);

            $result[]=$usuario->save();

            print_r($result);

            $datos= array(

                "destinatario"=>"$email",

                "asunto"=>"Credenciales registro de usuario Proyectos75",

                "cuerpo"=>"$cRegistro",

                "headers"=>"$headers"

            );

            $envio=$this->envioMail($datos);

           

            if($result[0]->error=="Duplicate entry '".$user."' for key 'user'"){

                header("location:?controller=Respuestas&action=errorCorreo");

            }else{

                header("location:?controller=Respuestas&action=registroUserExito");

            }



            

        }

    }

}



