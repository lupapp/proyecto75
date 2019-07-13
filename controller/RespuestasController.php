<?php
class RespuestasController extends ControladorBase{
    public function __construct() {
        parent::__construct();
    }
    public function compraProducto(){
        $pedidos=new Pedido();
        $ulped=$pedidos->getUltimoRegistro('pedidos');
        $pedido=$pedidos->getPedidoById($ulped->id);
        $this->view("pedidofinalizado", array("pedido"=> $pedido ));
    }
    public function cambioEstadoExitoso(){
        $this->view("mensajeExito", array("mensaje"=>"<span class='text-success'>TODO BIEN!</span><br> Cambio de estado exitoso", "link"=>"<meta http-equiv='Refresh' content='3; url=?controller=Main' />", "linkBoton"=>"?controller=Usuarios"));
    }
    public function ascensoExitoso(){
        $this->view("mensajeExito", array("mensaje"=>"<span class='text-success'>TODO BIEN!</span><br> La membresía ascendio exitosamente", "link"=>"<meta http-equiv='Refresh' content='3; url=?controller=Main' />", "linkBoton"=>"?controller=Usuarios"));
    }
    public function cambioExito(){
        $this->view("mensajeExito", array("mensaje"=>"<span class='text-success'>TODO BIEN!</span><br> Cambio de estado exitoso", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function registroExito(){
        $this->view("mensajeExito", array("mensaje"=>"<span class='text-success'>TODO BIEN!</span><br> Registro exitoso", "link"=>"<a class='btn btn-success btn-block' href='?controller=Usuarios'>Seguir registrando</a>", "linkBoton"=>"?controller=Usuarios"));
    }
    public function registroUserExito(){
        $this->view("mensajeExito", array("mensaje"=>"<span class='text-success'>TODO BIEN!</span><br> Registro de usuario exitoso, la contraseña llega al correo, <strong>revise el spam de su correo.</strong>", "link"=>"<meta http-equiv='Refresh' content='3; url=?controller=Main' />", "linkBoton"=>"?controller=Usuarios"));
    }
    
     public function editExito(){
        $this->view("mensajeExito", array("mensaje"=>"<span class='text-success'>TODO BIEN!</span><br> Se edito el registro exitosamente", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function resetExito(){
        $this->view("mensajeExito",array("mensaje"=>"<span class='text-success'>TODO BIEN!</span><br> La contraseña fue cambiada", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function registroDelete(){
        $this->view("mensajeExito",array("mensaje"=>"<span class='text-success'>TODO BIEN!</span><br> Registro eliminado", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorAscender(){
        $this->view("mensajeError", array("mensaje"=>"<span class='text-danger'>ERROR</span><br>Esta membresía no puede ascender más", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorCc(){
    $this->view("mensajeError",array("mensaje"=>"<span class='text-danger'>ERROR</span><br> Algo salio mal,  el documento que ingreso ya existe", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorGeneral(){
        $this->view("mensajeError",array("mensaje"=>"<span class='text-danger'>ERROR</span><br> Algo salio mal, vuelva a intentarlo", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorUser(){
        $this->view("mensajeError", array("mensaje"=>"<span class='text-danger'>ERROR</span><br> Algo salio mal, el usuario ya existe", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorAut(){
        $this->view("mensajeError",array("mensaje"=>"<span class='text-danger'>ERROR</span><br> Error al autenticarse", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function errorRol(){
        $this->view("mensajeError",array("mensaje"=>"<span class='text-danger'>ERROR</span><br> No tiene privilegios", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function tipoFile(){
        $this->view("mensajeError",array("mensaje"=>"<span class='text-danger'>ERROR</span><br> El tipo de archivo no es permitido", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    public function sizeFile(){
        $this->view("mensajeError",array("mensaje"=>"<span class='text-danger'>ERROR</span><br> El tamaño del archivo exede el permitido", "link"=>"<script>setTimeout('javacript:history.back(1)', 2500)</script>"));
    }
    
    
}
?>
