<?php
class RespuestasController extends ControladorBase{
    public function __construct() {
        parent::__construct();
    }
   
    public function registroExito(){
        $this->view("mensajeExito", array("mensaje"=>"Registro exitoso", "link"=>"<a class='btn btn-success btn-block' href='?controller=Planes=create'>Seguir registrando</a>", "linkBoton"=>"?controller=Planes"));
    }
    public function registroUserExito(){
        $this->view("mensajeExito", array("mensaje"=>"Registro de usuario exitoso, la contraseña llega al correo, <strong>revise el spam de su correo.</strong>", "link"=>"<meta http-equiv='Refresh' content='3; url=?controller=Main' />", "linkBoton"=>"?controller=Usuarios"));
    }
     public function editExito(){
        $this->view("mensajeExito", array("mensaje"=>"Se edito el registro exitosamente", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function resetExito(){
        $this->view("mensajeExito",array("mensaje"=>"La contraseña fue cambiada", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function registroDelete(){
        $this->view("mensajeExito",array("mensaje"=>"Registro eliminado", "link"=>"<script>setTimeout('javacript:history.back(1)', 1000)</script>"));
    }

    public function errorCc(){
    $this->view("mensajeError",array("mensaje"=>"Algo salio mal,  el documento que ingreso ya existe", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorGeneral(){
        $this->view("mensajeError",array("mensaje"=>"Algo salio mal, vuelva a intentarlo", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorUser(){
        $this->view("mensajeError", array("mensaje"=>"Algo salio mal, el usuario ya existe", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorAut(){
        $this->view("mensajeError",array("mensaje"=>"Error al autenticarse", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorRol(){
        $this->view("mensajeError",array("mensaje"=>"No tiene privilegios", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function tipoFile(){
        $this->view("mensajeError",array("mensaje"=>"El tipo de archivo no es permitido", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function sizeFile(){
        $this->view("mensajeError",array("mensaje"=>"El tamaño del archivo exede el permitido", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    
}
?>
