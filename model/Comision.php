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

class Comision extends EntidadBase{

    private $id, $id_cartilla_R, $id_cartilla_G, $fecha, $valor, $estado, $fecha_cobro, $nivel_cartilla_G, $suma;

    public function __construct(){

        $table="comisiones";

        parent::__construct($table);

    }



    function getId() {

        return $this->id;

    }



    function getId_cartilla_R() {

        return $this->id_cartilla_R;

    }



    function getId_cartilla_G() {

        return $this->id_cartilla_G;

    }

    function getFecha() {

        return $this->fecha;

    }

    function getValor() {

        return $this->valor;

    }



    function getEstado() {

        return $this->estado;

    }

    function getFecha_cobro() {

        return $this->fecha_cobro;

    }

    function getNivel_cartilla_G() {

        return $this->nivel_cartilla_G;

    }

    function getSuma() {

        return $this->suma;

    }

    function setId($id) {

        $this->id = $id;

    }



    function setId_cartilla_R($id_cartilla_R) {

        $this->id_cartilla_R = $id_cartilla_R;

    }



    function setId_cartilla_G($id_cartilla_G) {

        $this->id_cartilla_G = $id_cartilla_G;

    }

    function setFecha($fecha) {

        $this->fecha = $fecha;

    }

    function setValor($valor) {

        $this->valor = $valor;

    }



    function setEstado($estado) {

        $this->estado = $estado;

    }

    function setFecha_cobro($fecha_cobro) {

        $this->fecha_cobro = $fecha_cobro;

    }

    function setNivel_cartilla_G($nivel_cartilla_G) {

        $this->nivel_cartilla_G = $nivel_cartilla_G;

    }

    function setSuma($suma) {

        $this->suma = $suma;

    }

    

    public function getValorComision($id_cartilla){

        $total_comisiones=0;

        foreach($id_cartilla as $id){

            $query=$this->db()->query("SELECT sum(valor) AS suma FROM comisiones WHERE id_cartilla_R=$id AND estado=1");

            if($row=$query->fetch_object()){

                $total_comisiones=$total_comisiones+(float)$row;

            }

        }

        return $total_comisiones;

    }
    public function update(){
        $query="UPDATE comisiones SET valor='".$this->valor."', estado='".$this->estado."' WHERE id='".$this->id."'";
        $update=$this->db()->query($query);
        return $this->db();
    }
    


}

