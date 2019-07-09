<?php 

class Plan extends EntidadBase{

    private $id, $nombre_plan, $valor_plan, $descuento, $cant_hijos, $porcentaje1, $porcentaje2, $porcentaje3, $porcentaje4, $porcentaje5, $porcentaje_fondo, $dias_vencimiento, $estado, $tipo, $avatar_plan, $avatar_user, $valor_bono, $cant_users;

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

    public function getDescuento(){

        return $this->descuento;

    }

    public function getCantHijos()

    {

        return $this->cant_hijos;

    }

    public function setCantHijos($cant_hijos)

    {

        $this->cant_hijos = $cant_hijos;

    }

    public function getPorcentaje1() {

        return $this->porcentaje1;

    }

    public function getPorcentaje2() {

        return $this->porcentaje2;

    }
    public function getPorcentaje3() {

        return $this->porcentaje3;

    }

    public function getPorcentaje4() {

        return $this->porcentaje4;

    }
    public function getPorcentaje5() {

        return $this->porcentaje5;

    }

    function getPorcentaje_fondo() {

        return $this->porcentaje_fondo;

    }



    public function getDias_vencimiento() {

        return $this->dias_vencimiento;

    }



    public function getEstado() {

        return $this->estado;

    }



    public function getTipo()

    {

        return $this->tipo;

    }



    public function setTipo($tipo)

    {

        $this->tipo = $tipo;

    }



    public function getAvatar_plan() {

        return $this->avatar_plan;

    }

    function getAvatar_user() {

        return $this->avatar_user;

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

    public function setDescuento($descuento){

        $this->descuento=$descuento;

    }

    public function setPorcentaje1($porcentaje1) {

        $this->porcentaje1 = $porcentaje1;

    }

    public function setPorcentaje2($porcentaje2) {

        $this->porcentaje2 = $porcentaje2;

    }
    public function setPorcentaje3($porcentaje3) {

        $this->porcentaje3 = $porcentaje3;

    }
    public function setPorcentaje4($porcentaje4) {

        $this->porcentaje4 = $porcentaje4;

    }
    public function setPorcentaje5($porcentaje5) {

        $this->porcentaje5 = $porcentaje5;

    }

    function setPorcentaje_fondo($porcentaje_fondo) {

        $this->porcentaje_fondo = $porcentaje_fondo;

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

    function setAvatar_user($avatar_user) {

        $this->avatar_user = $avatar_user;

    }

    public function setValor_bono($valor_bono) {

        $this->valor_bono = $valor_bono;

    }

    public function setCant_users($cant_users) {

        $this->cant_users = $cant_users;

    }

    public function getPlanes(){

            $query=$this->db()->query("SELECT * FROM planes WHERE tipo=1 ORDER BY id DESC");

            while($row=$query->fetch_object()){

                    $resultSet[]=$row;

            }

            return $resultSet;

    }

    public function save(){

        $query="INSERT INTO planes (id, nombre_plan, valor_plan, descuento, cant_hijos, porcentaje1, porcentaje2, porcentaje3, porcentaje4, porcentaje5, porcentaje_fondo, dias_vencimiento, estado, tipo, avatar_plan, avatar_user, valor_bono, cant_users) "

                ."VALUES (NULL, '".$this->nombre_plan."', '".$this->valor_plan."', '".$this->descuento."', '".$this->cant_hijos."', '".$this->porcentaje1."', '".$this->porcentaje2."' , '".$this->porcentaje3."', '".$this->porcentaje4."', '".$this->porcentaje5."',  '".$this->porcentaje_fondo."', '".$this->dias_vencimiento."',"

                ."'".$this->estado."','".$this->tipo."','".$this->avatar_plan."', '".$this->avatar_user."', '".$this->valor_bono."', '".$this->cant_users."')";

        $save=$this->db()->query($query);

        return $this->db();

    }

    public function update(){

        $query="UPDATE planes SET nombre_plan='".$this->nombre_plan."', valor_plan='".$this->valor_plan."', descuento='".$this->descuento."', cant_hijos='".$this->cant_hijos."',porcentaje1='".$this->porcentaje1."',"

                ."porcentaje2='".$this->porcentaje2."', porcentaje3='".$this->porcentaje3."', porcentaje4='".$this->porcentaje4."', porcentaje5='".$this->porcentaje5."', porcentaje_fondo='".$this->porcentaje_fondo."', dias_vencimiento='".$this->dias_vencimiento."', estado='".$this->estado."', tipo='".$this->tipo."', avatar_plan='".$this->avatar_plan."',"

                ."avatar_user='".$this->avatar_user."',valor_bono='".$this->valor_bono."', cant_users='".$this->cant_users."' WHERE id=".$this->id."";

        $update=$this->db()->query($query);

        return $this->db();

    }

    

}

 ?>