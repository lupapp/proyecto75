<?php 
class Porcentaje extends EntidadBase{

    private $id, $id_plan, $comision, $nivel, $tipo;

    public function __construct(){
        $table="porcentajes";
        parent::__construct($table);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId_plan() {
        return $this->id_plan;
    }

    public function setId_plan($id_plan) {
        $this->id_plan = $id_plan;
    }

    public function getComision() {
        return $this->comision;
    }

    public function setComision($comision) {
        $this->comision = $comision;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    public function save(){
        $query="INSERT INTO planes (id, id_plan, comision, nivel, tipo) "
                ."VALUES (NULL, '".$this->id_plan."', '".$this->comision."', '".$this->nivel."', '".$this->tipo."')";
        $save=$this->db()->query($query);
        return $this->db();
    }

    public function update(){
        $query="UPDATE planes SET  comision='".$this->comision."' WHERE id=$this->id_plan AND nivel=$this->nivel";
        $update=$this->db()->query($query);
        return $this->db();
    }
}

 ?>