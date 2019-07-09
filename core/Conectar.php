<?php 
	class Conectar{
		private $driver, $host, $user, $pass, $database, $charset;

		public function __construct(){
			$db_cfg = require_once "config/database.php";
			$this->driver = $db_cfg['driver'];
			$this->host = $db_cfg['host'];
			$this->user = $db_cfg['user'];
			$this->pass = $db_cfg['pass'];
			$this->database = $db_cfg['database'];
			$this->charset = $db_cfg['charset'];
		}

		public function conexion(){
			$con = new mysqli($this->host, $this->user, $this->pass, $this->database);
                        if ($con->connect_errno) {
                            printf("Connect failed: %s\n", $con->connect_error);
                            exit();
                        }

			$con->query("SET NAMES '".$this->charset."'");
			return $con;
		}
                public function close($conexion){
                    mysqli_close($conexion);
                }
	}



?>