<?php
class PlanModel extends ModeloBase{
    private $table;
    public function __construct($table) {
        $this->table="planes";
        parent::__construct($this->table);
    }
}
?>

