<?php
class LoginController extends ControladorBase{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        if(Session::get('autenticado')){
            $cartilla=new Cartilla();
            $user=$cartilla->getByIdTable(Session::get('id'), 'users');
            $com=$cartilla->getComisionesAndRed(Session::get('id'));
            $this->view("mired",array("cartillas" =>$com, 'user'=>$user));
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
            $membresias = $usuario->getComisionesAndRed($user->id);
            Session::set('autenticado', true);
            Session::set('level', $user->rol);
            Session::set('id', $user->id);
            Session::set('user', $user->user);
            Session::set('nombre', $user->name);
            Session::set('avatar', $user->avatar);
            Session::set('cc', $user->cc);
            Session::set('email', $user->email);
            Session::set('membresias', $membresias);
            Session::set('tiempo', time());
            
            if(Session::get('level')=='admin'){
                    $this->view("mensajeExito", array("mensaje"=>"Inicio sesión exitosamente", "link"=>"<meta http-equiv='refresh' content='2.5;URL=index.php?controller=Usuarios' >"));
                }else{
                    $this->view("mensajeExito", array("mensaje"=>"Inicio sesión exitosamente", "link"=>"<meta http-equiv='refresh' content='2.5;URL=index.php?controller=Login' >"));
                }
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
