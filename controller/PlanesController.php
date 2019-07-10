<?php

class PlanesController extends ControladorBase{
    
    public function __construct() {
        
            
        
        parent::__construct();
    }
    public function index(){
        if(!Session::get('autenticado')){
            header("location:?controller=Login");
        }else{
            if(Session::get('level')=='admin'){
                $plan = new Plan;
                $allplanes=$plan->getAllMembresia();
                $productos=$plan->getAllProductos();
                $this->view("planes", array(
                    "allplanes"=>$allplanes, 'productos'=>$productos
                ));
            }else{
                header("location:?controller=Main");
            }
        }
        Session::tiempo();
    }

    public function create()
    {       
        $this->view("formPlanes",array());
    }
    public function crear(){
        if(isset($_POST['plan'])){
            $nombre_plan=$_POST['plan'];
            $categoria=$_POST['categoria'];
            $valor_plan=$_POST['valor_plan'];
            $descuento=$_POST['descuento'];
            $cant_hijos=$_POST['cant_hijos'];
            $porcentajes=$_POST['porcentaje'];
            $porcentaje1=$porcentajes[0];
            $porcentaje2=$porcentajes[1];
            $porcentaje3=$porcentajes[2];
            $porcentaje4=$porcentajes[3];
            $porcentaje5=$porcentajes[4];
            $porcentaje_fondo=$_POST['fondo'];
            $dias_vencimiento=$_POST['dias'];
            $estado=$_POST['estado'];
            $tipo=$_POST['tipo'];
            $avatar_plan=$_FILES [ 'avatar' ];
            $avatar_user=$_FILES [ 'avatar_user' ];
            $valor_bono=$_POST['valor_bono'];
            $cant_users=0;
            //$cant_users=$_POST['cant_users'];

            
            $plan= new Plan();
            $plan->uploaded($avatar_plan);
            $plan->uploaded($avatar_user);
            $plan->setNombre_plan($nombre_plan);
            $plan->setCategoria($categoria);
            $plan->setValor_plan($valor_plan);
            $plan->setDescuento($descuento);
            $plan->setCantHijos($cant_hijos);
            $plan->setPorcentaje1($porcentaje1);
            $plan->setPorcentaje2($porcentaje2);
            $plan->setPorcentaje3($porcentaje3);
            $plan->setPorcentaje4($porcentaje4);
            $plan->setPorcentaje5($porcentaje5);
            $plan->setPorcentaje_fondo($porcentaje_fondo);
            $plan->setDias_vencimiento($dias_vencimiento);
            $plan->setEstado($estado);
            $plan->setTipo($tipo);
            $plan->setAvatar_plan($avatar_plan['name']);
            $plan->setAvatar_user($avatar_user['name']);
            $plan->setValor_bono($valor_bono);
            $plan->setCant_users($cant_users);
            $result=$plan->save();
            /*$id_plan=$plan->getUltimoRegistro('porcentajes');
            $i=1;
            $porcen=new Porcentaje();
            foreach($porcentajes as $porcentaje){
                $porcen->setId_plan($id_plan);
                $porcen->setComision($porcentaje);
                $porcen->setNivel($i);
                $porcen->setTipo('0');
                $porcen->save();
                $i++;
            }*/
            if($result->error==""){
                header("location:?controller=Respuestas&action=registroExito");
            }else{
                header("location:?controller=Respuestas&action=errorGeneral");
            }
           
        }
    }
    public function show(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $plann=new Plan();
            //$porcentaje=new Porcentaje();
            $plan=$plann->getById($id);
            //$porcentaje->setId_plan($id);
            //$porcen=$porcentaje->getPorcentajes($id);
            $categoria=$plann->getByIdTable($plan->categoria, 'categorias');
            $this->view("editPlan",array("plan" =>$plan,"categoria"=>$categoria));
        }else{
            $this->view("index",  array());
        }
    }
    public function showProducto(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $plann=new Plan();
            //$porcentaje=new Porcentaje();
            $plan=$plann->getById($id);
            $categoria=$plann->getByIdTable($plan->categoria, 'categorias');
            $this->view("editPlan",array("plan" =>$plan, "categoria"=>$categoria));
        }else{
            $this->view("index",  array());
        }
    }
    public function update(){
        if($_POST['plan']){
            $id=$_POST['id'];
            $nombre=$_POST['plan'];
            $categoria=$_POST['categoria'];
            $valor_plan=$_POST['valor_plan'];
            $cant_hijos=$_POST['cant_hijos'];
            $porcentajes=$_POST['porcentaje'];
            $porcentaje1=$porcentajes[0];
            $porcentaje2=$porcentajes[1];
            $porcentaje3=$porcentajes[2];
            $porcentaje4=$porcentajes[3];
            $porcentaje5=$porcentajes[4];
            $porcentaje_fondo=$_POST['fondo'];
            $descuento=$_POST['descuento'];
            $dias_vencimiento=$_POST['dias'];
            $estado=$_POST['estado'];
            $tipo=$_POST['tipo'];
            $avatar_plan=$_FILES['avatar'];
            $avatar_user=$_FILES ['avatar_user'];
            $valor_bono=$_POST['valor_bono'];
            $cant_users=0;
            //$cant_users=$_POST['cant_users'];
            
            $plan= new Plan();
            if($avatar_plan['name']==''){
                $plan->setAvatar_plan($_POST['nameimg']);
            }else{
                $plan->uploaded($avatar_plan);
                $plan->setAvatar_plan($avatar_plan['name']);

            }
            if($avatar_user['name']==''){
                $plan->setAvatar_user($_POST['nameimg_user']);
            }else{
                $plan->uploaded($avatar_user);
                $plan->setAvatar_user($avatar_user['name']);
            }
            $plan->setId($id);
            $plan->setNombre_plan($nombre);
            $plan->setCategoria($categoria);
            $plan->setValor_plan($valor_plan);
            $plan->setDescuento($descuento);
            $plan->setCantHijos($cant_hijos);
            $plan->setPorcentaje1($porcentaje1);
            $plan->setPorcentaje2($porcentaje2);
            $plan->setPorcentaje3($porcentaje3);
            $plan->setPorcentaje4($porcentaje4);
            $plan->setPorcentaje5($porcentaje5);
            $plan->setPorcentaje_fondo($porcentaje_fondo);
            $plan->setDias_vencimiento($dias_vencimiento);
            $plan->setEstado($estado);
            $plan->setTipo($tipo);
            $plan->setValor_bono($valor_bono);
            $plan->setCant_users($cant_users);
            $result[]=$plan->update();
            /*$i=1;
            $porcen=new Porcentaje();
            foreach($porcentajes as $porcentaje){
                $porcen->setId_plan($id);
                $porcen->setComision($porcentaje);
                $porcen->setNivel($i);
                $porcen->update();
                $i++;
            }*/
            if($result[0]->error==""){
                header("location:?controller=Respuestas&action=editExito");
            }else{
                header("location:?controller=Respuestas&action=errorGeneral");
            }
            
        }
    }
    public static function buscarPlanes(){
        $user=new Usuario();
        $planes=$user->getUserByCartilla($_POST['id']);
        echo '<div class="card mb-4" >
                <div class="card-header">
                  *Seleccione un plan
                </div>';
        for($i=0;$i<count($planes);$i++){
        echo '<hr><div class="row pl-5 pr-5">
            <div class="col-md-1 col-4">
                <input type="hidden" name="id_cartilla" value="'.$_POST['id'].'">
                <input type="radio" name="id_plan" value="'.$planes[$i]->id.'" checked>
                <img class="w-50" src="view/img/'.$planes[$i]->avatar_plan.'">
            </div>
            <div class="col-md-3 col-7">
                <h4 for="exampleInputEmail1" class="text-primary">'.$planes[$i]->nombre_plan.'</h4>
            </div>
            <div class="col-md-2 col-3"><h4 class="font-weight-bold text-success">$ '.$planes[$i]->valor_plan.'</h4></div>
                <input class="form-control" id="exampleInputEmail1" type="hidden" name="valor" aria-describedby="emailHelp" value="'.$planes[$i]->valor_plan.'">
        </div>';
        }
        echo ' </div>
                <div class="mensaje"></div>
               </div>';
    }
    public function borrar(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $plan=new Plan();
            $plan->deleteById($id);
            header("location:?controller=Respuestas&action=registroDelete");
        }
    }
}