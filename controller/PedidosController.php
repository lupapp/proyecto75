<?php
/**
 * Created by PhpStorm.
 * User: Pc01
 * Date: 14/12/2018
 * Time: 10:53 AM
 */

class PedidosController extends ControladorBase
{

    public function __construct()
    {


        parent::__construct();
    }

    public function index()
    {
        if (!Session::get('autenticado')) {
            header("location:?controller=Login");
        } else {
            if (Session::get('level') == 'admin') {
                $pedidos = new Pedido();
                $ped = $pedidos->getPedidos();
                $this->view("pedidos", array('pedidos' => $ped));
            } else {
                header("location:?controller=Main");
            }
        }
        Session::tiempo();
    }
    public function cambioEstado(){
        $pedidos=new Pedido();
        $pedidos->setId($_POST['id']);
        $pedidos->setEstado($_POST['estado']);
        $pedidos->updateEstado();
        header("location:?controller=Respuestas&action=cambioExito");
    }
}

