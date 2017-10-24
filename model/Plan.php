<?php 
class Plan extends EntidadBase{
    private $id, $nombre_plan, $valor_plan, $porcentaje_comision, $dias_vencimiento, $estado, $avatar_plan, $valor_bono, $cant_users;
    public function __construct(){
        $table="planes";
        parent::__construct($table);
    }
    public function getId() {
        return $this->id;
    }
    public function getNombre_plan() {
        return $this->nombre_plan;
    }

    public function getValor_plan() {
        return $this->valor_plan;
    }

    public function getPorcentaje_comision() {
        return $this->porcentaje_comision;
    }

    public function getDias_vencimiento() {
        return $this->dias_vencimiento;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getAvatar_plan() {
        return $this->avatar_plan;
    }

    public function getValor_bono() {
        return $this->valor_bono;
    }

    public function getCant_users() {
        return $this->cant_users;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre_plan($nombre_plan) {
        $this->nombre_plan = $nombre_plan;
    }

    public function setValor_plan($valor_plan) {
        $this->valor_plan = $valor_plan;
    }

    public function setPorcentaje_comision($porcentaje_comision) {
        $this->porcentaje_comision = $porcentaje_comision;
    }

    public function setDias_vencimiento($dias_vencimiento) {
        $this->dias_vencimiento = $dias_vencimiento;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setAvatar_plan($avatar_plan) {
        $this->avatar_plan = $avatar_plan;
    }
    public function setValor_bono($valor_bono) {
        $this->valor_bono = $valor_bono;
    }
    public function setCant_users($cant_users) {
        $this->cant_users = $cant_users;
    }
    public function getPlanes(){
            $query=$this->db()->query("SELECT * FROM planes ORDER BY id DESC");
            while($row=$query->fetch_object()){
                    $resultSet[]=$row;
            }
            return $resultSet;
    }
    public function save(){
        $query="INSERT INTO planes (id, nombre_plan, valor_plan, porcentaje_comision, dias_vencimiento, estado, avatar_plan, valor_bono, cant_users) "
                ."VALUES (NULL, '".$this->nombre_plan."', '".$this->valor_plan."', '".$this->porcentaje_comision."', '".$this->dias_vencimiento."',"
                ."'".$this->estado."','".$this->avatar_plan."', '".$this->valor_bono."', '".$this->cant_users."')";
        $save=$this->db()->query($query);
        return $this->db();
    }
    public function update(){
        $query="UPDATE planes SET nombre_plan='".$this->nombre_plan."', valor_plan='".$this->valor_plan."',porcentaje_comision='".$this->porcentaje_comision."',"
                ."dias_vencimiento='".$this->dias_vencimiento."', estado='".$this->estado."', avatar_plan='".$this->avatar_plan."',"
                ."valor_bono='".$this->valor_bono."', cant_users='".$this->cant_users."' WHERE id=".$this->id."";
        $update=$this->db()->query($query);
        return $this->db();
    }
}
 ?>