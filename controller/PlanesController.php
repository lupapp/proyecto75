<?php

class PlanesController extends ControladorBase{
    
    public function __construct() {
        if(!Session::get('autenticado')){
            header("location:?controller=Login");
        }
        Session::tiempo();
        parent::__construct();
    }
    public function index(){
        if(Session::get('level')=='admin'){
            $plan = new Plan;
            $allplanes=$plan->getAll();
            $this->view("planes", array(
                "allplanes"=>$allplanes
            ));
        }else{
            header("location:?controller=Main");
        }
    }
    public function create()
    {       
        $this->view("formPlanes",array());
    }
    public function crear(){
        if(isset($_POST['plan'])){
            $nombre_plan=$_POST['plan'];
            $valor_plan=$_POST['valor_plan'];
            $porcentaje_plan=$_POST['porcentaje'];
            $dias_vencimiento=$_POST['dias'];
            $estado=$_POST['estado'];
            $avatar_plan=$_FILES [ 'avatar' ];
            $valor_bono=$_POST['valor_bono'];
            $cant_users=$_POST['cant_users'];
            
            $plan= new Plan();
            $plan->uploaded($avatar_plan);
            $plan->setNombre_plan($nombre_plan);
            $plan->setValor_plan($valor_plan);
            $plan->setPorcentaje_comision($porcentaje_plan);
            $plan->setDias_vencimiento($dias_vencimiento);
            $plan->setEstado($estado);
            $plan->setAvatar_plan($avatar_plan['name']);
            $plan->setValor_bono($valor_bono);
            $plan->setCant_users($cant_users);
            $result=$plan->save();
            print_r($avatar_plan);
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
            $plan=$plann->getById($id);
            $this->view("editPlan",array("plan" =>$plan));
        }
    }
    
    public function update(){
        if($_POST['plan']){
            $id=$_POST['id'];
            $nombre=$_POST['plan'];
            $valor_plan=$_POST['valor_plan'];
            $porcentaje_comision=$_POST['porcentaje'];
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
            $plan->setPorcentaje_comision($porcentaje_comision);
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
    public function borrar(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $plan=new Plan();
            $plan->deleteById($id);
            header("location:?controller=Respuestas&action=registroDelete");
        }
    }
}