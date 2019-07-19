<?php

class CategoriasController extends ControladorBase{
    
    public function __construct() {
        
        parent::__construct();
    }
    public function index(){
        if(!Session::get('autenticado')){
            header("location:?controller=Login");
        }else{
            if(Session::get('level')=='admin'){
                $categoria = new Categoria;
                $categorias=$categoria->getCategorias();
                $this->view("categorias", array(
                    "categorias"=>$categorias
                ));
            }else{
                header("location:?controller=Main");
            }
        }
        Session::tiempo();
    }
    public function getCategorias(){
        if(!Session::get('autenticado')){
            header("location:?controller=Login");
        }else{
                $categoria = new Categoria;
                $categorias=$categoria->getCategorias();
                echo json_encode($categorias);
           
        }
        Session::tiempo();
    }

    public function create()
    {       
        $this->view("formCategorias",array());
    }
    public function crear(){
        if(isset($_POST['nombre'])){
            $nombre=$_POST['nombre'];
            $posicion=$_POST['posicion'];
            $img=$_FILES [ 'img' ];
            
            $categoria= new Categoria();
            $plan->uploaded($img);
            $categoria->setNombre($nombre);
            $categoria->setPosicion($posicion);
            $categoria->setImg($img['name']);
            $result=$categoria->save();
            if($result->error==""){
                header("location:?controller=Respuestas&action=registroExito");
            }else{
                header("location:?controller=Respuestas&action=errorGeneral");
            }
           
        }
    }
    public function show(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $categorias=new Categoria();
            $categoria=$categorias->getById($id);
            $this->view("editCategoria",array("categoria" =>$categoria));
        }else{
            $this->view("index",  array());
        }
    }
    
    public function update(){
        if($_POST['nombre']){
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $posicion=$_POST['posicion'];
            $img=$_FILES ['img'];
            $categoria = new Categoria();
            if($img['name']==''){
                $categoria->setImg($_POST['nameimg']);
            }else{
                $categoria->uploaded($img);
                $categoria->setImg($img['name']);
            }
            $categoria->setId($id);
            $categoria->setNombre($nombre);
            $categoria->setPosicion($posicion);
            
            $result[]=$categoria->update();
            
            if($result[0]->error==""){
                header("location:?controller=Respuestas&action=editExito");
            }else{
                header("location:?controller=Respuestas&action=errorGeneral");
            }
            
        }
    }
 
    public function borrar(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $categoria=new Categoria();
            $categoria->deleteById($id);
            header("location:?controller=Respuestas&action=registroDelete");
        }
    }
}