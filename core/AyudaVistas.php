<?php 

class AyudaVistas{
    public function url($controlador=CONTROLADOR_DEFECTO, $accion=ACCION_DEFECTO){
        $urlstring = "index.php?controller=".$controlador."&action=".$accion;
        return $urlstring;
    }
}

?>