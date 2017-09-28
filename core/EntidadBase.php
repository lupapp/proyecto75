<?php 
class EntidadBase{
	private $table, $db, $conectar;

	public function __construct($table){
		$this->table=(string) $table;

		require_once "Conectar.php";
		$this->conectar= new Conectar();
		$this->db=$this->conectar->conexion();
	}

	public function getConectar(){
		return $this->conectar;
	}

	public function db(){
		return $this->db;
	}	

	public function getAll(){
		$query=$this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
		while($row=$query->fetch_object()){
			$resultSet[]=$row;
		}
		return $resultSet;
	}
	public function getById($id){
		$query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");
		if($row=$query->fetch_object()){
			$resultSet=$row;
		}
		return $resultSet;
	}
         public function getLogin($cc, $pass){
            $passmd5=md5($pass);
            $query=$this->db->query("SELECT * FROM $this->table WHERE cc='$cc' AND password='$passmd5'");
            if($row=$query->fetch_object()){
                    return $row;
            }
            //return $resultSet;
        }
	public function getBy($columna, $value){
		$query=$this->db->query("SELECT * FROM $this->table WHERE $columna = '$value'");
		while($row=$query->fetch_object()){
			$resultSet[]=$row;
		}
		return $resultSet;
	}
	public function deleteById($id){
		$query=$this->db->query("DELETE FROM $this->table WHERE id=$id");
		return $query;
	}
        public function gPass(){
            $opc_letras = TRUE; //  FALSE para quitar las letras
            $opc_numeros = TRUE; // FALSE para quitar los números
            $opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
            $opc_especiales = FALSE; // FALSE para quitar los caracteres especiales
            $longitud = 12;
            $password = [];

            $letras ="abcdefghijklmnopqrstuvwxyz";
            $numeros = "1234567890";
            $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $especiales ="|@#~$%()=^*+[]{}-_";
            $listado = "";
            $pass="";

            if ($opc_letras == TRUE) {
                $listado .= $letras; }
            if ($opc_numeros == TRUE) {
                $listado .= $numeros; }
            if($opc_letrasMayus == TRUE) {
                $listado .= $letrasMayus; }
            if($opc_especiales == TRUE) {
                $listado .= $especiales; }

            str_shuffle($listado);
            for( $i=1; $i<=$longitud; $i++) {
            $password[$i] = $listado[rand(0,strlen($listado))];
            str_shuffle($listado);
            }
            
            foreach ($password as $dato_password) {
                $pass=$pass."".$dato_password;
                //return $dato_password;
            }
            return $pass;

        }
}
?>