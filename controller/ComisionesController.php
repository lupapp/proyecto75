<?php

class ComisionesController extends ControladorBase{
    
    public function __construct() {
        if(!Session::get('autenticado')){
            header("location:?controller=Login");
        }
        Session::tiempo();
        parent::__construct();
    }
    public function index(){
        $cartilla=new Cartilla();
        $user=$cartilla->getByIdTable(Session::get('id'), 'users');
        $com=$cartilla->getComisionesByidCartilla($_GET['id']);
        $cart=$cartilla->getById($_GET['id']);
        $totales=$cartilla->comisionesTotales($_GET['id']);
        $vigencia=$cartilla->verificarFechaVen($cart->fecha_vencimiento);
        $this->view("cobrarComisiones",array("comisiones" =>$com, "user"=>$user, "cartilla"=>$cart, "totales"=>$totales,"vigencia"=>$vigencia));
        
    }
    public function create(){ 
        
        
    }
    
    public function cobrar(){
        $solicitud=new Solicitud();
        if(isset($_POST['idComision'])){
            $id_comision=$_POST['idComision'];
            $valores=$_POST['valor'];
            $id_cartilla=$_POST['id_cartilla'];
            $valor=0;
            $id_comisiones='';
            for($i=0;$i<count($id_comision);$i++){
               $valor=$valor+(float)$valores[$i];
               if($id_comisiones==''){
                   $id_comisiones=$id_comision[$i];
               }else{
                   $id_comisiones=$id_comisiones.",".$id_comision[$i];
               }
               $solicitud->updateComision($id_comision[$i], 'comisiones');

            }
            echo $valor;
            echo $id_comisiones;
            $fecha=date('Y')."-".date('m')."-".date('d');
            $solicitud->setId_cartilla($id_cartilla);
            $solicitud->setIds_comisiones($id_comisiones);
            $solicitud->setValor($valor);
            $solicitud->setEstado(0);
            $solicitud->setFecha_solicitud($fecha);
            $solicitud->save();
            if($result->error==""){
                header("location:?controller=Respuestas&action=registroExito");
            }else{
                header("location:?controller=Respuestas&action=errorGeneral");
            }
        }
    }
     public function pagar(){
        $com=new Comision();
        if(isset($_POST['idSolicitud'])){
            $id_solicitud=$_POST['idSolicitud'];
            for($i=0;$i<count($id_solicitud);$i++){
               $com->updateSolicitud($id_solicitud[$i], 'solicitudes');
            }
                header("location:?controller=Respuestas&action=cambioEstadoExitoso");
        }
    }
    public function buscar(){
        $sol=new Comision();
        $result=$sol->getAllSolicitudes('WHERE estado=0');
        $cant=count($result)-1;
        if($cant>0){
           echo $cant; 
        }else{
            echo '';
        }
        
    }
    public function showSolicitudes(){
        $com=new Comision();
        $sol=$com->getAllSolicitudes('');
        $this->view("pagar",array("sol" =>$sol));
    }
    public function showComision(){
        $cartilla=new Cartilla();
        $user=$cartilla->getByIdTable($_GET['id'], 'users');
        $com=$cartilla->getComisiones($_GET['id']);
        $vigencia=$cartilla->verificarFechaVen($_GET['id']);
        $this->view("comisiones",array("cartillas" =>$com, 'user'=>$user, 'vigencia'=>$vigencia));
    }
    public function showRed(){
        $cartilla=new Cartilla();
        $user=$cartilla->getByIdTable($_GET['id'], 'users');
        $com=$cartilla->getComisionesAndRed($_GET['id']);
        $this->view("redes",array("cartillas" =>$com, 'user'=>$user));
    }
    public function showHistorialComision(){
        $cartilla=new Cartilla();
        $user=$cartilla->getByIdTable($_GET['id_user'], 'users');
        $com=$cartilla->getComisionesByidCartilla($_GET['id']);
        $this->view("listComisiones",array("comisiones" =>$com, "user"=>$user));
    }
    public function show(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $comision=new Comision();
            $ids_cartillas=$comision->getIdcartillaXIduser($id);
            $sol=$comision->getSolicitudes($ids_cartillas, 'solicitudes');
            $this->view("listSolicitudes",array("solicitudes" =>$sol));
        }
    }
    public function editar(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $comision=new Comision();
            $com=$comision->getById($id);
            $this->view("editComision",array("comision" =>$com));
        }
    }
    public function update(){
        if($_POST['id']){
            $id=$_POST['id'];
            $valor=$_POST['valor'];
            $estado=$_POST['estado'];

            $comision= new Comision();
            $comision->setId($id);
            $comision->setValor($valor);
            $comision->setEstado($estado);
            $result[]=$comision->update();
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
            $com=new Comision();
            $com->deleteById($id);
            header("location:?controller=Respuestas&action=registroDelete");
        }
    }
}