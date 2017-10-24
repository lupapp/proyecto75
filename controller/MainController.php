<?php

class MainController extends ControladorBase{
     public function __construct() {
        parent::__construct();
    }
    public function index(){
         if(!Session::get('autenticado')){
            header("location:?controller=Login");
        }
        Session::tiempo();
        $this->view("index",  array());
        
    }
    public function registerShow(){
        $this->view("register",  array());
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

