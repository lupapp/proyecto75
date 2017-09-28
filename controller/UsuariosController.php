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
        $usuario = new Usuario;
        $allusers=$usuario->getAll();
        $this->view("usuarios", array(
            "allusers"=>$allusers,
            "hola"=>"algo escrito"
        ));
    }
    public function create()
    {       
        
        $this->view("formUsuarios",array());
    }
    public function crear(){
        if(isset($_POST['nombre'])){
            $nombre=$_POST['nombre'];
            $email=$_POST['email'];
            $password="123";
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
            $usuario->setName($nombre);
            $usuario->setEmail($email);
            $usuario->setPassword(md5($usuario->gPass()));
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
            $result[]=$usuario->save();
           
            if($result[0]->affected_rows==-1){
                if($result[0]->error=="Duplicate entry '".$email."' for key 'users_email_unique'"){
                        header("location:?controller=Respuestas&action=errorCorreo");
                }else{
                    if($result[0]->error=="Duplicate entry '".$cc."' for key 'users_cc_unique'"){
                        header("location:?controller=Respuestas&action=errorCc");
                    }else{
                        header("location:?controller=Respuestas&action=errorGeneral");
                    }
                }
            }else{
                 header("location:?controller=Respuestas&action=registroExito");
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
            if($result[0]->error==""){
                 header("location:?controller=Respuestas&action=registroExito");
                
            }else{
                if($result[0]->error=="Duplicate entry '".$email."' for key 'users_email_unique'"){
                        header("location:?controller=Respuestas&action=errorCorreo");
                }else{
                    if($result[0]->error=="Duplicate entry '".$cc."' for key 'users_cc_unique'"){
                        header("location:?controller=Respuestas&action=errorCc");
                    }else{
                        header("location:?controller=Respuestas&action=errorGeneral");
                    }
                }
                
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
            $destinatario = $_GET['email']; 
            $asunto = "Reseteo de contraseña"; 
            $cuerpo = ' 
            <html> 
            <head> 
               <title>Reseteo de contraseña</title> 
            </head> 
            <body> 
            <h1>Su nueva contraseña es: '.$pass.'</h1> 
            <p> 
            <b>Se asigno una nueva contraseña aleatoria si quiere cambiar por otra pulse <a href="?controller=Usuarios&action=cambiarPass">aqui</a> 
            </p> 
            </body> 
            </html> 
            '; 

            //para el envío en formato HTML 
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

            //dirección del remitente 
            $headers .= "From: <reset@proyecto75.com>\r\n"; 

            //dirección de respuesta, si queremos que sea distinta que la del remitente 
            $headers .= "Reply-To: hernan@proyectos75.com\r\n"; 

            //ruta del mensaje desde origen a destino 
            $headers .= "Return-path: proyecto75@proyectos75.com\r\n"; 

            //direcciones que recibián copia 
            //$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

            //direcciones que recibirán copia oculta 
            //$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

             mail($destinatario,$asunto,$cuerpo,$headers);
             header("location:?controller=Respuestas&action=resetExito");
            
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