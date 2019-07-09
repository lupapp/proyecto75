<?php
class Session{
    public static function init(){
        session_start();
    }
     public static function destroy($calve=false){
        if($clave){
            if(is_array($clave)){
                for ($i=0;$i<count($clave);$i++){
                     if(isset($_SESSION[$clave][$i])){
                         unset($_SESSION[$clave][$i]);
                    }
                }
            }else{
                if($_SESSION[$clave]){
                    unset($_SESSION[$clave]);
                }
            }
        }else{
            session_destroy();
        }
         
     }
     public static function set($clave, $valor){
         if(!empty($clave)){
            $_SESSION[$clave]=$valor;
         }
     }
     public static function getAll(){
         if(isset($_SESSION)){
             return $_SESSION;
         }
     }
     public static function get($clave){
         if(isset($_SESSION[$clave])){
             return $_SESSION[$clave];
         }
     }
     public static function acceso($level){
         if(!Session::get('autenticado')){
            header('location:?controller=Respuestas&action=errorAut');
            exit;
         }
         Session::tiempo();
         if(Session::getLevel($level)>Session::getLevel(Session::get('level'))){
            header('location:?controller=Respuestas&action=errorRol');
            exit;
         }
         
         
     }
     public static function accesoView($level){
         if(!Session::get('autenticado')){
             return false;
         }
         if(Session::getLevel($level)>Session::getLevel(Session::get('level'))){
            return false;
         }
         return true    ;
         
     }

     public static function getLevel($level){
         $role['admin']=3;
         $role['especial']=2;
         $role['standard']=1;
         if(array_key_exists($level, $role)){
             //throw new Exception('Error de acceso');
         }else{
             return $role[$level];
         }
     }
     public static function accesoEstricto(array $level, $noAdmin =false){
         if(!Session::get('autenticado')){
            header('location:?controller=Respuestas&action=errorAut');
            exit;
         }
         if($noAdmin==false){
             if(Session::get('level')=='admin'){
                 return;
             }
             if(count($level)){
                 if(in_array($level, $haystackarray)){
                     return;
                 }
             }
              header('location:?controller=Respuestas&action=errorAut');
         }
     }
     public static function accesoViewEstricto(array $level, $noAdmin =false){
        if(!Session::get('autenticado')){
            return false;
        }
        if($noAdmin==false){
            if(Session::get('level')=='admin'){
                return true;
            }
            if(count($level)){
                if(in_array($level, $haystackarray)){
                    return true;
                }
            }
            return false;
        }
     }
     public static function tiempo(){
         if(!Session::get('tiempo') || !defined('SESSION_TIME')){
             throw new Exception('No se ha definido el tiempo de sesión');
         }
         if(SESSION_TIME==0){
             return;
         }
         if(time()-Session::get('tiempo') > (SESSION_TIME*60)){
             Session::destroy();
             header("location:?controller=login&action=sesionVencida");
         }else{
             Session::set("timepo", time());
         }
     }
}


