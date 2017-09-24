<?php
class UsuariosModel extends ModeloBase{
    private $table;
    public function __construct($table) {
        $this->table="users";
        parent::__construct($this->table);
    }
}
?>
