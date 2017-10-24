<?php

class UsuariosController extends ControladorBase{
    
    public function __construct() {
        if(!Session::get('autenticado')){
            header("location:?controller=Login");
        }
        Session::tiempo();
        parent::__construct();
    }
    public function index(){
        if(Session::get('level')=='admin'){
            $usuario = new Usuario;
            $allusers=$usuario->getAll();
            $this->view("usuarios", array(
                "allusers"=>$allusers,
                "hola"=>"algo escrito"
            ));
        }else{
            header("location:?controller=Main");
        }
    }
    public function create()
    {       
        
        $this->view("formUsuarios",array());
    }
    public function crear(){
        if(isset($_POST['nombre'])){
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
            
            $usuario= new Usuario();
            $pass=$usuario->gPass();
            $usuario->setUser($user);
            $usuario->setName($nombre);
            $usuario->setEmail($email);
            $usuario->setPassword($pass['passmd5']);
            $usuario->setTipoDocumento($tipoDocumento);
            $usuario->setCc($cc);
            $usuario->setNacimiento($nacimiento);
            $usuario->setFechaInscripcion($fechaactual['mday']."/".$fechaactual['month']."/".$fechaactual['year']);
            $usuario->setTelefono($telefono);
            $usuario->setCelular($celular);
            $usuario->setDireccion($direccion);
            $usuario->setCiudad($ciudad);
            $usuario->setProvincia($provincia);
            $usuario->setPais($pais);
            $usuario->setRol($rol);
            $result=$usuario->save();
            print_r($result);
            $password=$pass['pass'];
            require_once 'config/headers.php';
            require_once 'config/cuerposMails.php';
            $datos= array(
                "destinatario"=>"$email",
                "asunto"=>"Credenciales registro de usuario Proyectos75",
                "cuerpo"=>"$cRegistro",
                "headers"=>"$headers"
            );
            $envio=$this->envioMail($datos);
            echo $result->affected_rows;
           
            if($result->error=="Duplicate entry '".$user."' for key 'user'"){
                header("location:?controller=Respuestas&action=errorUser");
            }else{
               header("location:?controller=Respuestas&action=registroUserExito");
            }
        }
    }
    public function show(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $usuario=new Usuario();
            $user=$usuario->getById($id);
            $this->view("editUsuario",array("user" =>$user));
        }
    }
    public function perfil(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $usuario=new Usuario();
            $user=$usuario->getById($id);
            $this->view("editPerfil",array("user" =>$user));
        }
    }
    public function update(){
        if($_POST['nombre']){
            $id=$_POST['id'];
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
            
            $usuario= new Usuario();
            $usuario->setId($id);
            $usuario->setName($nombre);
            $usuario->setEmail($email);
            $usuario->setTipoDocumento($tipoDocumento);
            $usuario->setCc($cc);
            $usuario->setNacimiento($nacimiento);
            $usuario->setTelefono($telefono);
            $usuario->setCelular($celular);
            $usuario->setDireccion($direccion);
            $usuario->setCiudad($ciudad);
            $usuario->setProvincia($provincia);
            $usuario->setPais($pais);
            $usuario->setRol($rol); 
            $result[]=$usuario->update();
            print_r($result);
            if($result[0]->error==""){
                header("location:?controller=Respuestas&action=editExito");
            }else{
                header("location:?controller=Respuestas&action=errorGeneral");
            }
            
        }
    }
    public function resetPass(){
        if($_GET['email']){
            $usuario = new Usuario();
            $pass=$usuario->gPass();
            $usuario->setId($_GET['id']);
            $usuario->setPassword(md5($pass));
            print_r($usuario->changePass());
            require_once 'config/headers.php';
            require_once 'config/cuerposMails.php';
            $datos= array(
                "destinatario"=>"$email",
                "asunto"=>"Reseteo de contraseña",
                "cuerpo"=>"$cuerpo",
                "headers"=>"$headers"
            );
            $envio=$this->envioMail($datos);
             header("location:?controller=Respuestas&action=resetExito");
            
        }
    }
    public function  showPass(){
        $this->view("formChangePass", array());
    }

    public function cambiopass(){
        if(isset($_POST['id'])){
            $id=(int)$_POST['id'];
            $pass=$_POST['password'];
            $usuario=new Usuario();
            $usuario->setId($id);
            $usuario->setPassword(md5($pass));
            $usuario->changePass();
            print_r($usuario);
            header("location:?controller=Respuestas&action=resetExito");
        }
    }
    public function borrar(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $usuario=new Usuario();
            $usuario->deleteById($id);
            header("location:?controller=Respuestas&action=registroDelete");
        }
    }
}