<?php 
class Cartilla extends EntidadBase{
    private $id, $id_user, $id_plan, $id_padre, $fecha_vencimiento, $estado, $fecha_creacion;
    public function __construct(){
        $table="cartillas";
        parent::__construct($table);
    }
    public function getId() {
        return $this->id;
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function getId_plan() {
        return $this->id_plan;
    }

    public function getId_padre() {
        return $this->id_padre;
    }

    public function getFecha_vencimiento() {
        return $this->fecha_vencimiento;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function setId_plan($id_plan) {
        $this->id_plan = $id_plan;
    }

    public function setId_padre($id_padre) {
        $this->id_padre = $id_padre;
    }

    public function setFecha_vencimiento($fecha_vencimiento) {
        $this->fecha_vencimiento = $fecha_vencimiento;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }
    public function save(){
    $query="INSERT INTO cartillas (id, id_user, id_plan, id_padre, fecha_vencimiento, estado, fecha_creacion) "
            ."VALUES (NULL, '".$this->id_user."', '".$this->id_plan."', '".$this->id_padre."', '".$this->fecha_vencimiento."',"
            ."'".$this->estado."', '".$this->fecha_creacion."')";
    $save=$this->db()->query($query);
    return $this->db();
    }
    public function update(){
        $query="UPDATE cartillas SET id_plan='".$this->id_pan."', fecha_vencimiento='".$this->fecha_vencimiento."', estado='".$this->estado."',"
                ." WHERE id='".$this->id."'";
        $update=$this->db()->query($query);
        return $this->db();
    }
    public function getByIdPadre($id_padre){
        $query=$this->db()->query("SELECT * FROM cartillas WHERE id_padre=$id_padre");
        $resultSet=[];
        if($row=$query->fetch_object()){
                $resultSet=$row;
        }
        return $resultSet;
    }
}

 
?>
