<?php

class MainController extends ControladorBase{
     public function __construct() {
        if(!Session::get('autenticado')){
            header("location:?controller=Login");
        }
        Session::tiempo();
        parent::__construct();
    }
    public function index(){
            $this->view("index",  array());
        
    }
}

