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
class Hijos extends EntidadBase{
    private $id, $id_cartilla, $id_user, $id_cartilla_hija, $posicion, $nivel;
    public function __construct(){
        $table="red_hijos";
        parent::__construct($table);
    }

    function getId() {
        return $this->id;
    }

    function getId_cartilla() {
        return $this->id_cartilla;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getId_cartilla_hija() {
        return $this->id_cartilla_hija;
    }
    function getPosicion() {
        return $this->posicion;
    }
    function getNivel() {
        return $this->nivel;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_cartilla($id_cartilla) {
        $this->id_cartilla = $id_cartilla;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    function setId_cartilla_hija($id_cartilla_hija) {
        $this->id_cartilla_hija = $id_cartilla_hija;
    }
    function setPosicion($posicion) {
        $this->posicion = $posicion;
    }
    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

}
