<?php 
class Pagos extends EntidadBase{
    private $id, $id_user, $id_cartilla_paga, $id_cartilla_padre, $id_plan, $metodo_pago, $fecha_pago, $valor, $estado, $tipo, $documento, $referido, $posicion;
    public function __construct(){
        $table="pagos";
        parent::__construct($table);
    }
    function getId() {
        return $this->id;
    }

    function getId_user() {
        return $this->id_user;
    }

    /**
     * @return mixed
     */
    public function getIdCartillaPaga()
    {
        return $this->id_cartilla_paga;
    }

    /**
     * @param mixed $id_cartilla_paga
     */
    public function setIdCartillaPaga($id_cartilla_paga)
    {
        $this->id_cartilla_paga = $id_cartilla_paga;
    }


    public function setIdCartilla($id_cartilla)
    {
        $this->id_cartilla = $id_cartilla;
    }

    function getId_cartilla_padre() {
        return $this->id_cartilla_padre;
    }

    function getId_plan() {
        return $this->id_plan;
    }

    function getMetodo_pago() {
        return $this->metodo_pago;
    }

    function getFecha_pago() {
        return $this->fecha_pago;
    }

    function getValor() {
        return $this->valor;
    }

    function getEstado() {
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

    function getDocumento() {
        return $this->documento;
    }
    function getReferido() {
        return $this->referido;
    }
    function getPosicion() {
        return $this->posicion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    function setId_cartilla_padre($id_cartilla_padre) {
        $this->id_cartilla_padre = $id_cartilla_padre;
    }

    function setId_plan($id_plan) {
        $this->id_plan = $id_plan;
    }

    function setMetodo_pago($metodo_pago) {
        $this->metodo_pago = $metodo_pago;
    }

    function setFecha_pago($fecha_pago) {
        $this->fecha_pago = $fecha_pago;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    function setDocumento($documento) {
        $this->documento = $documento;
    }
    function setReferido($referido) {
        $this->referido = $referido;
    }
    function setPosicion($posicion) {
        $this->posicion = $posicion;
    }

        public function save($table){
    $query="INSERT INTO $table (id, id_user, id_cartilla_paga, id_cartilla_padre, id_plan, metodo_pago, fecha_pago, valor, estado, tipo, documento, posicion) "
            ."VALUES (NULL, '".$this->id_user."','".$this->id_cartilla_paga."', '".$this->id_cartilla_padre."', '".$this->id_plan."', '".$this->metodo_pago."',"
            ."'".$this->fecha_pago."','".$this->valor."','".$this->estado."','".$this->tipo."','".$this->documento."','".$this->posicion."')";
    $save=$this->db()->query($query);
    return $save;
    }
    public function update(){
        $query="UPDATE cartillas SET id_plan='".$this->id_pan."', fecha_vencimiento='".$this->fecha_vencimiento."', estado='".$this->estado_cartilla."',"
                ." WHERE id='".$this->id."'";
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
    
}

 
?>
