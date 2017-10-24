<?php 
class Usuario extends EntidadBase{
    private $id, $user, $name, $email, $password, $tipoDocumento, $cc, $nacimiento, $fechaInscripcion, $telefono, $celular, $direccion, $ciudad, $provincia, $pais, $rol;
    public function __construct(){
        $table="users";
        parent::__construct($table);
    }
    public function getId() {
        return $this->id;
    }
    public function getUser() {
        return $this->user;
    }
    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function getCc() {
        return $this->cc;
    }

    public function getNacimiento() {
        return $this->nacimiento;
    }

    public function getFechaInscripcion() {
        return $this->fechaInscripcion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setUser($user) {
        $this->user = $user;
    }
    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function setCc($cc) {
        $this->cc = $cc;
    }

    public function setNacimiento($nacimiento) {
        $this->nacimiento = $nacimiento;
    }

    public function setFechaInscripcion($fechaInscripcion) {
        $this->fechaInscripcion = $fechaInscripcion;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function setPais($pais) {
        $this->pais = $pais;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }
    
   
    public function save(){
        $query="INSERT INTO users (id, user, name, email, password, tipoDocumento, cc, nacimiento, fechaInscripcion, telefono, celular,"
                ."direccion, ciudad, provincia, pais, rol, avatar, remember_token, created_at, updated_at, tipoUsuario) "
                ."VALUES (NULL, '".$this->user."', '".$this->name."', '".$this->email."', '".$this->password."', '".$this->tipoDocumento."',"
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