<?php

class CartillasController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        if(Session::get('level')=='admin'){
            $cartilla = new Cartilla;
            
            $allcartillas=$cartilla->getCartillaByIduser($_GET['id']);
            $this->view("cartillas", array("cartillas"=> $allcartillas));
            
        }else{
            header("location:?controller=Main");
        }
    }
    public function verificarFromDelete(){
        $cartilla = new Cartilla();
        $padres=$cartilla->fromDelete($_POST['id']);
        if($padres['padres']==0 && $padres['solicitudes']==0){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function showCartilla(){
        if(Session::get('level')=='admin'){
            $cartilla = new Cartilla;
            $allcartilla=$cartilla->getByIdCartilla($_GET['id']);
            $this->view("editCartilla", array("cartilla"=> $allcartilla));
            
        }else{
            header("location:?controller=Main");
        }
    }
    public function updateCartilla(){
        if(Session::get('level')=='admin'){
            $cartilla = new Cartilla;
            $cartilla->setId($_POST['id']);
            $cartilla->setFecha_vencimiento($_POST['fv']);
            $cartilla->updateFecha();
            header("location:?controller=Respuestas&action=editExito");
            
        }else{
            header("location:?controller=Main");
        }
    }
    public function create(){ 
        $cartilla= new Cartilla();
        $user=$cartilla->getByIdTable($_GET['id'], 'users');
        $cartillas=$cartilla->getCartillaExclu($_GET['id']);
        $plan=$cartilla->getMinValor('planes');
        $allplanes=$cartilla->getPlanes();
        $this->view("formCartilla",array("cartillas"=>$cartillas, "user"=>$user, "plan"=>$plan, 'allplanes'=>$allplanes));
        
    }
    function crearCartilla($objeto, $id_user, $id_cartilla_padre, $id_plan, $posicion, $referido, $fecha_creacion){
        $plan=$objeto->getByIdTable($id_plan, 'planes');
        $dias=$plan[0]->dias_vencimiento;
        $valor_plan=$plan[0]->valor_plan;
        $fecha_vencimiento=$objeto->fechaVencimiento($fecha_creacion,$dias);
        $estado_cartilla=1;
        $objeto->setId_user($id_user);
        $objeto->setPosicion($posicion);
        $objeto->setId_plan($id_plan);
        $objeto->setId_padre($id_cartilla_padre);
        $objeto->setFecha_vencimiento($fecha_vencimiento);
        $objeto->setEstado_cartilla($estado_cartilla);
        $objeto->setFecha_creacion($fecha_creacion);
        $result=$objeto->save();
        $id_cartilla=$objeto->getUltimoRegistro('cartillas');
        $cartillas_padre=$objeto->padres($id_cartilla->id, $id_cartilla_padre, 1);
        if($referido==0){
            $comisiones=$objeto->generarComisiones($valor_plan,$id_cartilla->id);
        }else{
            $comisiones=$objeto->generarComisionesReferido($valor_plan,$id_cartilla->id, $referido);
        }
    }
    public function aprobarCompra(){
        $cartilla=new Cartilla();
        $pagos='';
        if(isset($_GET['id_pago'])){
            $id_pago=$_GET['id_pago'];
            $cartilla->updatePago($id_pago, 'pagos');
            $pagos=$cartilla->getByIdTable($id_pago, 'pagos');
            $comisiones=$cartilla->generarComisionesProducto($pagos[0]->valor,$pagos[0]->id_cartilla_paga, $pagos[0]->id_plan);
            $pago=$cartilla->getPagoByid($id_pago);
            $data = ['id_user' => $pago['pago']->id_user,
                'id_cartilla' => $pago['pago']->id_cartilla_paga,
                'id_prod' => $pago['pago']->id_plan,
                'valor' => $pago['pago']->valor,
                'cantidad' => $pago['cantidad'],
                'fecha' => $pago['pago']->fecha_pago,
                'metodo' => $pago['pago']->metodo_pago
        ];

            $cartilla->savePedido($data);
        }

        header("location:?controller=Respuestas&action=cambioEstadoExitoso");
    }
    public function aprobar(){
        $cartilla=new Cartilla();
        $pagos='';
        if(isset($_POST['idPago'])){
            $id_pago=$_POST['idPago'];
            for($i=0;$i<count($id_pago);$i++){
               $cartilla->updatePago($id_pago[$i], 'pagos');
               $pagos[]=$cartilla->getByIdTable($id_pago[$i], 'pagos');
            }
        }
        if(isset($_GET['id_user'])){
            $this->crearCartilla($cartilla, $_GET['id_user'], $_GET['id_cartilla_padre'], $_GET['id_plan'], $_GET['posicion'], $_GET['referido'], $_GET['insc']);
        }else{
            foreach($pagos as $pago){
                $this->crearCartilla($cartilla, $pago[0]->id_user, $pago[0]->id_cartilla_padre, $pago[0]->id_plan, $pago[0]->posicion, $pago[0]->referido, $pago[0]->fecha_pago);
            }
        }
        header("location:?controller=Respuestas&action=cambioEstadoExitoso");
    }
    
    public function crear(){
        $cartilla=new Cartilla();
        if(isset($_POST['id_plan'])){
            $id_user=$_POST['id_user'];
            $id_cartilla_padre=$_POST['id_cartilla_padre'];
            //$id_user_padre=$_POST['id_user_padre'];
            $id_plan=$_POST['id_plan'];
            /*if($_POST['id_user_padre']==0){
                $id_cartilla_padre=0;
            }else{
                $id_cartilla_padre=$cartilla->getIdcartillaByIduser($id_user_padre);
            }*/
            $fecha=date('Y')."-".date('m')."-".date('d');
            //print_r($id_cartilla_padre);
            $plan=$cartilla->getByIdTable($id_plan, 'planes');
             //print_r($plan);
            $meses=$plan[0]->dias_vencimiento;
            $valor_plan=$plan[0]->valor_plan;
            $estado_cartilla=1;
            if(empty($_POST['insc'])) {
                $fecha_creacion = $fecha;
            }else{
                $fecha_creacion=$_POST['insc'];
            }
            $fecha_vencimiento=$cartilla->fechaVencimiento($fecha_creacion,(int)$meses);
            $cartilla->setId_user($id_user);
            $cartilla->setId_plan($id_plan);
            $cartilla->setId_padre($id_cartilla_padre);
            $cartilla->setFecha_vencimiento($fecha_vencimiento);
            $cartilla->setEstado_cartilla($estado_cartilla);
            $cartilla->setFecha_creacion($fecha_creacion);
            $result=$cartilla->save();
            
            //$recursiva=$cartilla->recursiva(1);
           
            $id_cartilla=$cartilla->getUltimoRegistro('cartillas');
            $cartillas_padre=$cartilla->padres($id_cartilla->id, $id_cartilla_padre, 1);
            
            //print_r($cartillas_padre);
            if($_POST['referido']==0){
                $comisiones=$cartilla->generarComisiones($valor_plan,$id_cartilla->id);
            }else{
                $comisiones=$cartilla->generarComisionesReferido($valor_plan,$id_cartilla->id, $_POST['referido']);
            }
            if($result->error==""){
                header("location:?controller=Respuestas&action=registroExito");
            }else{
                header("location:?controller=Respuestas&action=errorGeneral");
            }
        }
    }
    
    public function showComision(){
        $cartilla=new Cartilla();
        $user=$cartilla->getByIdTable($_GET['id'], 'users');
        $com=$cartilla->getComisiones($_GET['id']);
            $this->view("comisiones",array("cartillas" =>$com, 'user'=>$user));
    }
    public function showRed(){
        $cartilla=new Cartilla();
        $user=$cartilla->getByIdTable($_GET['id'], 'users');
        $com=$cartilla->getComisionesAndRed($_GET['id']);
        if(Session::get('level')=='admin') {
            $this->view("redes", array("cartillas" => $com, 'user' => $user));
        }else{
            $this->view("mired", array("cartillas" => $com, 'user' => $user));
        }
    }
    public function showHistorialComision(){
        $cartilla=new Cartilla();
        $user=$cartilla->getByIdTable($_GET['id_user'], 'users');
        $com=$cartilla->getComisionesByidCartilla($_GET['id']);
        $this->view("listComisiones",array("comisiones" =>$com, "user"=>$user));
    }
    public function showAscender(){
        if(Session::get('level')=='admin'){
            $cartilla= new Cartilla();
            $cartillas=$cartilla->getByIdTable($_GET['id'], 'cartillas');
            $user=$cartilla->getByIdTable($cartillas[0]->id_user, 'users');
            $plan=$cartilla->getPlanesMayorQue($_GET['valor']);
            if($plan==false){
                header("location:?controller=Respuestas&action=errorAscender");
            }else{
                $this->view("formAscender",array("cartillas"=>$cartillas, "user"=>$user, "plan"=>$plan));
            }
         }else{
            header("location:?controller=Main");
        }
    }

    public function show(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $cartilla=new Plan();
            $carti=$cartilla->getById($id);
            $this->view("editCartilla",array("cartilla" =>$carti));
        }
    }
    public function showRenovar(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $cartilla=new Cartilla();
            $user=$cartilla->getUserByCartilla2($id);
            $com=$cartilla->getByIdCartilla($id);
            $plan=$cartilla->getPlanByidCat($com->id_plan, 'planes');
            $this->view("renovar",array('cartilla'=>$com, 'user'=>$user, 'plan'=>$plan));
        }
    }
    public function ascenderMembresia(){
        $cartilla=new Cartilla();
        $id_cartilla=$_POST['id_cartilla'];
        $id_plan=$_POST['id_plan'];
        $cartilla->setId_plan($id_plan);
        $cartilla->setId($id_cartilla);
        $cartilla->updatePlan();
        $plan=$cartilla->getPlanByidCat($id_plan, 'planes');
        $cartilla->generarComisiones($plan->valor_plan, $id_cartilla);
        header("location:?controller=Respuestas&action=ascensoExitoso");
    }

    public function update(){
        if($_POST['plan']){
            $id=$_POST['id'];
            $nombre=$_POST['plan'];
            $valor_plan=$_POST['valor_plan'];
            $dias_vencimiento=$_POST['dias'];
            $estado=$_POST['estado'];
            $avatar_plan=$_FILES['avatar'];
            $valor_bono=$_POST['valor_bono'];
            $cant_users=$_POST['cant_users'];
            
            $plan= new Plan();
            $plan->uploaded($avatar_plan);
            $plan->setId($id);
            $plan->setNombre_plan($nombre);
            $plan->setValor_plan($valor_plan);
            $plan->setDias_vencimiento($dias_vencimiento);
            $plan->setEstado($estado);
            $plan->setAvatar_plan($avatar_plan['name']);
            $plan->setValor_bono($valor_bono);
            $plan->setCant_users($cant_users);
            $result[]=$plan->update();
            print_r($result);
            if($result[0]->error==""){
                header("location:?controller=Respuestas&action=editExito");
            }else{
                header("location:?controller=Respuestas&action=errorGeneral");
            }
        }
    }
    public function cambioFecha(){
        $valor_plan=$_GET['valor'];
        $id_cartilla=$_GET['id'];
        $cartilla=new Cartilla();
        $cartilla->setId($id_cartilla);
        if(isset($_GET['fecha'])){
            $fechav=$_GET['fecha'];
        }else{
            $fechav=$_POST['fecha'];
        }
        $nuevaFecha=$cartilla->fechaVencimiento($fechav ,0);
        $cartilla->setFecha_vencimiento($nuevaFecha);
        $cartilla->updateFecha();
        $cartilla->generarComisiones($valor_plan,$id_cartilla);
        if(isset($_POST['idPago'])){
            $id_pago=$_POST['idPago'];
            $cartilla->updatePago($id_pago, 'pagos');
        }
        header("location:?controller=Respuestas&action=cambioExito");
    }
    public function renovacion(){
        $cartilla=new Cartilla();
        $id_cartilla=$_POST['id_cartilla'];
        $id_cartilla_padre=$_POST['id_cartilla_padre'];
        $valor=$_POST['valor'];
        $id_plan=$_POST['id_plan'];
        $metodo_pago=$_POST['metodo'];
        $id_user=$_POST['id_user'];
        $documento=$_POST['documento'];
        $fecha=date('Y')."-".date('m')."-".date('d');
        $data=['id_car_padre'=>$id_cartilla_padre,
            'id_cartilla_paga'=>$id_cartilla,
            'id_plan'=>$id_plan,
            'valor'=>$valor,
            'metodo'=>$metodo_pago,
            'id_user'=>$id_user,
            'documento'=>$documento,
            'referido'=>'',
            'posicion'=>'',
            'inscripcion'=>$fecha
        ];
        $p=$cartilla->savePago($data, 1);
        header("location:?controller=Respuestas&action=cambioExito");
    }
   
    public function pedido(){
        $cartilla=new Cartilla();
        $cantidad=$_POST['cantidad'];
        $valor=$_POST['valor']*$cantidad;
        $id_plan=$_POST['id_plan'];
        $metodo_pago=$_POST['metodo'];
        $documento=$_POST['documento'];
        if(isset($_POST['id_user'])){
            $id_user=$_POST['id_user'];
            $fecha=date('Y')."-".date('m')."-".date('d');
            if(isset($_POST['usuarioRegular'])){
                $data=[
                    'id_car_padre'=>'',
                    'id_cartilla_paga'=>'',
                    'id_plan'=>$id_plan,
                    'valor'=>$valor,
                    'metodo'=>$metodo_pago,
                    'id_user'=>$id_user,
                    'documento'=>$documento,
                    'referido'=>'',
                    'posicion'=>'',
                    'inscripcion'=>$fecha,
                    'cantidad'=>$cantidad
                ];
                $pedidoData=[
                    'id_cartilla'=>'',
                    'id_user'=>$id_user,
                    'id_prod'=>$id_plan,
                    'fecha'=>$fecha,
                    'cantidad'=>$cantidad,
                    'valor'=>$valor,
                    'metodo'=>$metodo
                ];
                $p=$cartilla->savePago($data, 3);
                $pe=$cartilla->savePedido($pedidoData);
                $plan=$cartilla->getByIdTable($id_plan, 'planes');
                $pago=$cartilla->getUltimoRegistro('pagos');
                require_once 'config/headers.php';
                require_once 'config/cuerposMails.php';
                $datos= array(
                    "destinatario"=>"$email",
                    "asunto"=>"Credenciales registro de usuario Mastercash",
                    "cuerpo"=>"$cRegistro",
                    "headers"=>"$headers"
                );
                $envio=$cartilla->envioMail($datos);
            }else{
                $id_cartilla=$_POST['id_cartilla'];
                $id_cartilla_padre=$_POST['id_padre'];
                $data=['id_car_padre'=>$id_cartilla_padre,
                    'id_cartilla_paga'=>$id_cartilla,
                    'id_plan'=>$id_plan,
                    'valor'=>$valor,
                    'metodo'=>$metodo_pago,
                    'id_user'=>$id_user,
                    'documento'=>$documento,
                    'referido'=>'',
                    'posicion'=>'',
                    'inscripcion'=>$fecha,
                    'cantidad'=>$cantidad
                ];
                $p=$cartilla->savePago($data, 2);
            }
            
        }else{
            $user=$_POST['usuario'];
            $nombre=$_POST['nombre'];
            $email=$_POST['email'];
            $tipoDocumento=$_POST['tipoDocumento'];
            $cc=$_POST['cc'];
            $nacimiento=$_POST['nacimiento'];
            $telefono=$_POST['telefono'];
            $celular=$_POST['celular'];
            $direccion=$_POST['direccion'];
            $ciudad=$_POST['ciudad'];
            $provincia=$_POST['provincia'];
            $pais=$_POST['pais'];
            $rol=$_POST['rol'];

            $fechaactual= getdate();
            $pass=$cartilla->gPass();
            $fechain= ($fechaactual['mday']."/".$fechaactual['month']."/".$fechaactual['year']);
            $result=$cartilla->saveUser($user, $nombre, $pass['passmd5'], $email, $tipoDocumento, $cc, $fechain, $rol);
            $userUl = $cartilla->getUltimoRegistro('users');
            $id_user = $userUl->id;
            $fecha=date('Y')."-".date('m')."-".date('d');
            $data=[
                'id_car_padre'=>'',
                'id_cartilla_paga'=>'',
                'id_plan'=>$id_plan,
                'valor'=>$valor,
                'metodo'=>$metodo_pago,
                'id_user'=>$id_user,
                'documento'=>$documento,
                'referido'=>'',
                'posicion'=>'',
                'inscripcion'=>$fecha,
                'cantidad'=>$cantidad
            ];
            $pedidoData=[
                'id_cartilla'=>'',
                'id_user'=>$id_user,
                'id_prod'=>$id_plan,
                'fecha'=>$fecha,
                'cantidad'=>$cantidad,
                'valor'=>$valor,
                'metodo'=>$metodo
            ];
            $pe=$cartilla->savePedido($pedidoData);
            $p=$cartilla->savePago($data, 3);
            $password=$pass['pass'];
            $plan=$cartilla->getByIdTable($id_plan, 'planes');
            $pago=$cartilla->getUltimoRegistro('pagos');
            require_once 'config/headers.php';
            require_once 'config/cuerposMails.php';
            $datos= array(
                "destinatario"=>"$email",
                "asunto"=>"Credenciales registro de usuario Mastercash",
                "cuerpo"=>"$cRegistro",
                "headers"=>"$headers"
            );
            $envio=$cartilla->envioMail($datos);
            
        }
        
        header("location:?controller=Respuestas&action=compraProducto");
    }
    public function cambioEstado(){
        $cartilla=new Cartilla();
        $cartilla->setId($_POST['id']);
        $cartilla->setEstado_cartilla($_POST['estado']);
        $cartilla->updateEstado();
        header("location:?controller=Respuestas&action=cambioExito");
    }
    public function borrar(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $plan=new Plan();
            $plan->deleteById($id);
            header("location:?controller=Respuestas&action=registroDelete");
        }
    }
}