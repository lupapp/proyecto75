<?php 

class Categoria extends EntidadBase{

    private $id, $nombre, $img, $posicion;

    public function __construct(){

        $table="categorias";

        parent::__construct($table);

    }
    
    public function getId() {

        return $this->id;

    }

    public function getNombre() {

        return $this->nombre;

    }


    public function getImg() {

        return $this->img;

    }

    public function getPosicion(){

        return $this->posicion;

    }

   

    public function setId($id) {

        $this->id = $id;

    }



    public function setNombre($nombre) {

        $this->nombre = $nombre;

    }



    public function setImg($img) {

        $this->img = $img;

    }

    public function setPosicion($posicion){

        $this->posicion=$posicion;

    }


    public function getCategorias(){
            $resultSet=[];
            $query=$this->db()->query("SELECT * FROM categorias ORDER BY posicion DESC");

            while($row=$query->fetch_object()){

                    $resultSet[]=$row;

            }
            return $resultSet;

    }
   
    public function save(){

        $query="INSERT INTO categorias (id, nombre, posicion, img) "

                ."VALUES (NULL, '".$this->nombre."', '".$this->posicion."', '".$this->img."')";

        $save=$this->db()->query($query);

        return $this->db();

    }

    public function update(){

        $query="UPDATE categorias SET nombre='".$this->nombre."', posicion='".$this->posicion."', img='".$this->img."' WHERE id=".$this->id."";

        $update=$this->db()->query($query);

        return $this->db();

    }

    

}

 ?>