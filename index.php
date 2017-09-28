<?php 

    require_once "config/global.php";
    require_once "core/ControladorBase.php";
    require_once "core/ControladorFrontal.func.php";
    require_once 'core/Session.php';
try {
    Session::init();
    /**/
    /*function parseUrl()
    {
        if(isset($_GET['url']))
        {
            $url[]=array(parse_url($_GET['url']));
            print_r($url);
            return explode("/", $url['path']);
        }
    }*/
} catch (Exception $ex) {
    echo $ex->getMessage();
}

if(isset($_REQUEST['controller']))
{
        $controllerObj = cargarControlador($_REQUEST['controller']);  
}else{
        $controllerObj = cargarControlador(CONTROLADOR_DEFECTO);
}
lanzarAccion($controllerObj);
?>