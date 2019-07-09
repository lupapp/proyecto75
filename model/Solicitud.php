<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comision
 *
 * @author Julian
 */
class Solicitud extends EntidadBase{
    private $id, $id_cartilla, $ids_comisiones, $valor, $estado, $fecha_solicitud, $fecha_pago;
    public function __construct(){
        $table="solicitudes";
        parent::__construct($table);
    }
    function getId() {
        return $this->id;
    }

    function getIds_comisiones() {
        return $this->ids_comisiones;
    }
    function getId_cartilla() {
        return $this->id_cartilla;
    }
    function getValor() {
        return $this->valor;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha_solicitud() {
        return $this->fecha_solicitud;
    }

    function getFecha_pago() {
        return $this->fecha_pago;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIds_comisiones($ids_comisiones) {
        $this->ids_comisiones = $ids_comisiones;
    }
    function setId_cartilla($id_cartilla) {
        $this->id_cartilla = $id_cartilla;
    }
    function setValor($valor) {
        $this->valor = $valor;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha_solicitud($fecha_solicitud) {
        $this->fecha_solicitud = $fecha_solicitud;
    }

    function setFecha_pago($fecha_pago) {
        $this->fecha_pago = $fecha_pago;
    }
    public function save(){
    $query="INSERT INTO solicitudes (id, id_cartilla, ids_comisiones, valor, estado, fecha_solicitud, fecha_pago) "
            ."VALUES (NULL,'".$this->id_cartilla."', '".$this->ids_comisiones."', '".$this->valor."', '".$this->estado."', '".$this->fecha_solicitud."',"
            ."'".$this->fecha_pago."')";
    $save=$this->db()->query($query);
    return $this->db();
    }
    public function update(){
        $query="UPDATE solicitudes SET ids_comisiones='".$this->ids_comisiones."', estado='".$this->estado."', valor='".$this->valor."',"
                ."fecha_solicitud='".$this->fecha_solicitud."', fecha_pago='".$this->fecha_pago."' WHERE id='".$this->id."'";
        $update=$this->db()->query($query);
        return $this->db();
    }

}
