<?php

/**

 * Created by PhpStorm.

 * User: Pc01

 * Date: 14/12/2018

 * Time: 9:50 AM

 */



class LineaPedido extends EntidadBase{

    private $id, $pedido, $id_plan, $id_cartilla, $precio, $cantidad, $total;

    public function __construct(){

        $table="pedidos";

        parent::__construct($table);

    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getPedido()
    {
        return $this->Pedido;
    }
     /**
     * @return mixed
     */
    public function getId_plan()
    {
        return $this->id_plan;
    }
     /**
     * @return mixed
     */
    public function getId_cartilla()
    {
        return $this->id_cartilla;
    }
    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }
     /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->Cantidad;
    }
     /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @param mixed $pedido
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;
    }
    /**
     * @param mixed $id_plan
     */
    public function setId_plan($id_plan)
    {
        $this->id_plan = $id_plan;
    }
    /**
     * @param mixed $id_cartilla
     */
    public function setId_cartilla($id_cartilla)
    {
        $this->id_cartilla = $id_cartilla;
    }
     /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
   
    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }


}