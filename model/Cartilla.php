<?php 
class Cartilla extends EntidadBase{
    private $id, $id_user, $id_plan, $id_padre, $posicion1, $posicion2, $posicion, $fecha_vencimiento, $estado_cartilla, $fecha_creacion;
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

    public function getEstado_cartilla() {
        return $this->estado_cartilla;
    }

    public function getFecha_creacion() {
        return $this->fecha_creacion;
    }
    function getPosicion1() {
        return $this->posicion1;
    }

    function getPosicion2() {
        return $this->posicion2;
    }

    function getPosicion() {
        return $this->posicion;
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

    public function setEstado_cartilla($estado_cartilla) {
        $this->estado_cartilla = $estado_cartilla;
    }

    public function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }
    function setPosicion1($posicion1) {
        $this->posicion1 = $posicion1;
    }

    function setPosicion2($posicion2) {
        $this->posicion2 = $posicion2;
    }

    function setPosicion($posicion) {
        $this->posicion = $posicion;
    }

    public function save(){
    $query="INSERT INTO cartillas (id, id_user, id_plan, id_padre, posicion1, posicion2, posicion, fecha_vencimiento, estado_cartilla, fecha_creacion) "
            ."VALUES (NULL, '".$this->id_user."', '".$this->id_plan."', '".$this->id_padre."', '".$this->posicion1."', '".$this->posicion2."', '".$this->posicion."',"
            ."'".$this->fecha_vencimiento."','".$this->estado_cartilla."', '".$this->fecha_creacion."')";
    $save=$this->db()->query($query);
    return $this->db();
    }
    public function update(){
        $query="UPDATE cartillas SET id_plan='".$this->id_pan."', posicion1='".$this->posicion1."',posicion2='".$this->posicion2."', fecha_vencimiento='".$this->fecha_vencimiento."', estado='".$this->estado_cartilla."',"
                ." WHERE id='".$this->id."'";
        $update=$this->db()->query($query);
        return $this->db();
    }
    public function updatePlan(){
        $query=$this->db()->query("UPDATE cartillas SET id_plan='".$this->id_plan."' WHERE id='".$this->id."'");
        $update=$this->db()->query($query);
        return $this->db();
        //return $resultSet;
    }
    public function updateEstado(){
        $query="UPDATE cartillas SET estado_cartilla='".$this->estado_cartilla."' WHERE id='".$this->id."'";
        $update=$this->db()->query($query);
        return $this->db();
    }
    public function updateFecha(){
        $query="UPDATE cartillas SET fecha_vencimiento='".$this->fecha_vencimiento."' WHERE id='".$this->id."'";
        $update=$this->db()->query($query);
        return $this->db();
    }
    public function getByIdPadre($id_padre){
        $query=$this->db()->query("SELECT * FROM cartillas WHERE id_padre=$id_padre");
        if($row=$query->fetch_object()){
                $resultSet=$row;
        }
        return $resultSet;
    }
    public function getByIdCartilla($id){
        $query=$this->db()->query("SELECT * FROM cartillas WHERE id=$id");
        if($row=$query->fetch_object()){
            $resultSet=$row;
        }
        return $resultSet;
    }
   
}

 
?>
