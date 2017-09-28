<?php
    class login extends EntidadBase{

        public function __construct() {
            $this->table="users";
            parent::__construct($this->table);
        }
        public function getUser($cc, $pass){
            $resultSet=[];
            $passmd5=md5($pass);
            $query=$this->db()->query("SELECT * FROM users   WHERE cc='".$cc."' AND password='".$passmd5."'");
            if($row=$query->fetch_object()){
                    return $row;
            }
            //return $resultSet;
        }
    }
?>

