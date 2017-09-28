<?php
class RespuestasController extends ControladorBase{
    public function __construct() {
        parent::__construct();
    }
    public function errorCorreo(){
        $this->view("mensajeError", array("mensaje"=>"Algo salio mal, el correo electrónico que ingreso ya existe", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function registroExito(){
        $this->view("mensajeExito", array("mensaje"=>"Registro exitoso", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorCc(){
        $this->view("mensajeError",array("mensaje"=>"Algo salio mal,  el documento que ingreso ya existe", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorGeneral(){
        $this->view("mensajeError",array("mensaje"=>"Algo salio mal, vuelva a intentarlo", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function resetExito(){
        $this->view("mensajeExito",array("mensaje"=>"La contraseña fue reseteada", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorAut(){
        $this->view("mensajeError",array("mensaje"=>"Error al autenticarse", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorRol(){
        $this->view("mensajeError",array("mensaje"=>"No tiene privilegios", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    
}
?>
