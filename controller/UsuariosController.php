<?php

class UsuariosController extends ControladorBase{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $usuario = new Usuario;
        $allusers=$usuario->getAll();
        $this->view("index", array(
            "allusers"=>$allusers,
            "hola"=>"algo escrito"
        ));
    }
    public function crear(){
        if(isset($_POST['nombre'])){
            $nombre=$_POST['nombre'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $tipoDocumento=$_POST['tipoDocumento'];
            $cc=$_POST['cc'];
            $nacimiento=$_POST['nacimiento'];
            $fechaInscripcion=$_POST['fechaInscripcion'];
            $telefono=$_POST['telefono'];
            $celular=$_POST['celular'];
            $direccion=$_POST['direccion'];
            $ciudad=$_POST['ciudad'];
            $provincia=$_POST['provincia'];
            $pais=$_POST['pais'];
            $rol=$_POST['rol'];
            
            $usuario= new Usuario();
            $usuario->getName($nombre);
            $usuario->getEmail($email);
            $usuario->getPassword($password);
            $usuario->getTipoDocumento($tipoDocumento);
            $usuario->getCc($cc);
            $usuario->getNacimiento($nacimiento);
            $usuario->getFechaInscripcion($fechaInscripcion);
            $usuario->getTelefono($telefono);
            $usuario->getCelular($celular);
            $usuario->getDireccion($direccion);
            $usuario->getCiudad($ciudad);
            $usuario->getProvincia($provincia);
            $usuario->getPais($pais);
            $usuario->getRol($rol);
        }
    }
    
    public function borrar(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $usuario=new Usuario();
            $usuario->deleteById($id);
            $this->redirect();
        }
    }
}