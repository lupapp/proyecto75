<?php 
class Usuario extends EntidadBase{
    private $id, $name, $email, $password, $tipoDocumento, $cc, $nacimiento, $fechaInscripcion, $telefono, $celular, $direccion, $ciudad, $provincia, $pais, $rol;
    public function __construct(){
        $table="users";
        parent::__construct($table);
    }
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    function getCc() {
        return $this->cc;
    }

    function getNacimiento() {
        return $this->nacimiento;
    }

    function getFechaInscripcion() {
        return $this->fechaInscripcion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCelular() {
        return $this->celular;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getPais() {
        return $this->pais;
    }

    function getRol() {
        return $this->rol;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }

    function setCc($cc) {
        $this->cc = $cc;
    }

    function setNacimiento($nacimiento) {
        $this->nacimiento = $nacimiento;
    }

    function setFechaInscripcion($fechaInscripcion) {
        $this->fechaInscripcion = $fechaInscripcion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    public function save(){
        $query="INSERT INTO users (id, name, email, password, tipoDocumento, cc, nacimiento, fechaInscripcion, telefono, celular,"
                ."direccion, ciudad, provincia, pais, rol, avatar, remember_token, created_at, updated_at, tipoUsuario) "
                ."VALUES (NULL, '".$this->name."', '".$this->email."', '".$this->password."', '".$this->tipoDocumento."',"
                ."'".$this->cc."', '".$this->nacimiento."', '".$this->fechaInscripcion."', '".$this->telefono."', '".$this->celular."',"
                ."'".$this->direccion."', '".$this->ciudad."', '".$this->provincia."', '".$this->pais."', '".$this->rol."','','','','','')";
        $save=$this->db()->query($query);
        return $this->db();
    }
    public function update(){
        $query="UPDATE users SET name='".$this->name."', email='".$this->email."', tipoDocumento='".$this->tipoDocumento."',"
                ."cc='".$this->cc."', nacimiento='".$this->nacimiento."', telefono='".$this->telefono."', celular='".$this->celular."',"
                ."direccion='".$this->direccion."', ciudad='".$this->ciudad."', provincia='".$this->provincia."', pais='".$this->pais."',"
                ."rol='".$this->rol."' WHERE id='".$this->id."'";
        $update=$this->db()->query($query);
        return $this->db();
    }
    public function changePass(){
        $query="UPDATE users SET password='".$this->password."' WHERE id='".$this->id."'";
        $update=$this->db()->query($query);
        return $this->db();
    }
   
}

 ?>