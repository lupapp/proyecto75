<?php
class LoginController extends ControladorBase{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        if(Session::get('autenticado')){
            $this->view("index", array());
        }else{
            $this->view("login", array());
        }
    }
    
    public function login(){
        $value=$_POST['value'];
        $pass=$_POST['pass'];
        $usuario=new Usuario();
        $user=$usuario->getLogin($value,$pass);
        if(!$user){
            $this->view("mensajeError", array("mensaje"=>"Usuario o contraseña no valido","link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
            exit;
        }else{
            Session::set('autenticado', true);
            Session::set('level', $user->rol);
            Session::set('id', $user->id);
            Session::set('user', $user->user);
            Session::set('nombre', $user->name);
            Session::set('avatar', $user->avatar);
            Session::set('cc', $user->cc);
            Session::set('email', $user->email);
            Session::set('tiempo', time());
            $this->view("mensajeExito", array("mensaje"=>"Inicio sesión exitosamente", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
        }
    }
    

    public function cerrar(){
        Session::destroy();
        $this->redirect('login');
    }
    public function sesionVencida(){
        $this->view("mensajeError", array("mensaje"=>"El tipo de 60 minutos de la sesión se agoto", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>", "linkBoton"=>"?controller=Login"));
    }
}
