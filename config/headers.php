<?php

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: <no_reply@proyecto75.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: lupaproyectos@gmail.com\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "\r\n"; 


?>
