<?php
/**
 * Created by PhpStorm.
 * User: Pc01
 * Date: 14/12/2018
 * Time: 9:50 AM
 */

class Pedido extends EntidadBase{
    private $id, $id_user, $id_cartilla, $id_prod, $fecha, $cantidad, $valor, $metodo, $estado;
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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getIdCartilla()
    {
        return $this->id_cartilla;
    }

    /**
     * @param mixed $id_cartilla
     */
    public function setIdCartilla($id_cartilla)
    {
        $this->id_cartilla = $id_cartilla;
    }

    /**
     * @return mixed
     */
    public function getIdProd()
    {
        return $this->id_prod;
    }

    /**
     * @param mixed $id_prod
     */
    public function setIdProd($id_prod)
    {
        $this->id_prod = $id_prod;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getMetodo()
    {
        return $this->metodo;
    }

    /**
     * @param mixed $metodo
     */
    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function updateEstado(){
        $query="UPDATE pedidos SET estado='".$this->estado."' WHERE id='".$this->id."'";
        $update=$this->db()->query($query);
        return $this->db();
    }
    public function update(){
        $query="UPDATE cartillas SET cantidad='".$this->cantidad."',valor='".$this->valor."', estado='".$this->estado."',"
            ." WHERE id='".$this->id."'";
        $update=$this->db()->query($query);
        return $this->db();
    }

}