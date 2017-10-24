<?php 
class EntidadBase{
	private $table, $db, $conectar, $cerrar;

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
        public function cerrar(){
            $con= new Conectar();
            $con->close($this->db);
           return $con;
        }
	public function getAll(){
		$query=$this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
		while($row=$query->fetch_object()){
			$resultSet[]=$row;
		}
		return $resultSet;
	}
        public function getAllByTable($table){
            $query=$this->db->query("SELECT * FROM $table ORDER BY id DESC");
            /*while($row=$query->fetch_object()){
                    $resultSet[]=$row;
            }*/
            return $query;
	}
        
        
        public function getCartilla(){
            $query=$this->db->query("SELECT * FROM cartillas JOIN users ON cartillas.id_user = users.id JOIN planes ON cartillas.id_plan = planes.id ");
            while($row=$query->fetch_object()){
                $query2=$this->db->query("SELECT * FROM cartillas WHERE id=$row->id_padre");
                if($row2=$query2->fetch_object()){
                    $padre=$row2;
                }
                $resultSet[]=array("cartilla"=>$row, "padre"=>$row2);
            }
            
            return $resultSet;
        }
        public function padres($id_cartilla, $id_padre, $num_padre){
            if($num_padre<5){
            $query=$this->db->query("SELECT id FROM cartillas WHERE id=$id_padre");
                if($query!=0){
                    $query2=$this->db->query("INSERT INTO padres (id, id_cartilla, id_cartilla_padre, numero_padre) VALUE (NULL, $id_cartilla, $id_padre, $num_padre )");
                    $this->padres($id_cartilla, $query, $num_padre++);
                }else{
                    exit();
                }
            }else{
                 exit();
            }
            
        }
        public function contarUsers(){
            
        }

        public function getById($id){
		$query=$this->db->query("SELECT * FROM $this->table WHERE id='$id'");
		if($row=$query->fetch_object()){
                    $resultset[]=$row;
		}
		return $resultset;
	}
         public function getLogin($value, $pass){
            $passmd5=md5($pass);
            $query=$this->db->query("SELECT * FROM $this->table WHERE password='$passmd5' AND  (user='$value' OR email='$value')");
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
            $password[$i] = $listado[rand(0,strlen($listado)-1)];
            str_shuffle($listado);
            }
            
            foreach ($password as $dato_password) {
                $pass=$pass."".$dato_password;
                //return $dato_password;
            }
            $passmd5=array("passmd5"=>md5($pass),"pass"=>$pass);
            return $passmd5;

        }
        public function uploaded($file){
           
            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
            $cad = ""; 
            for($i=0;$i<4;$i++) { 
            $cad .= substr($str,rand(0,62),1); 
            } 
           
            $tamano = $file['size']; // Leemos el tamaño del fichero 
            $tamaño_max=2097152; // Tamaño maximo permitido 
            if( $tamano < $tamaño_max){ // Comprovamos el tamaño  
                $destino = 'view/img' ; // Carpeta donde se guardata 
                $sep=explode('image/',$file["type"]); // Separamos image/ 
                $tipo=$sep[1]; // Optenemos el tipo de imagen que es 
                echo $tipo;
                if($tipo == "pjpeg" || $tipo == "jpg" || $tipo == "png"){ // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen 
                    move_uploaded_file ( $file[ 'tmp_name' ], $destino . '/' .$file[ 'name' ]);  // Subimos el archivo 
                } 
                //else header("location:?controller=Respuestas&action=tipoFile");// Si no es el tipo permitido lo desimos 
            } 
            else header("location:?controller=Respuestas&action=sizeFile");// Si supera el tamaño de permitido lo desimos 
             
        }
}
?>