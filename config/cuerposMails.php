<?php
$cuerpo = ' 
    <html> 
    <head> 
       <title>Reseteo de contraseña</title> 
    </head> 
    <body> 
    <h1>Su nueva contraseña es: '.$password.'</h1> 
    <p> 
    <b>Se asigno una nueva contraseña aleatoria si quiere cambiar por otra pulse <a href="?controller=Usuarios&action=cambiarPass">aqui</a> 
    </p> 
    </body> 
    </html> 
    '; 
$cRegistro = ' 
    <html> 
    <head> 
       <title>Su registro fue exitoso</title> 
    </head> 
    <body> 
    <h1>Su usuario es: '.$user.'</h1>
    <h1>Su contraseña es: '.$password.'</h1> 
    <p> 
    <b>Ahora puede ingresar al Back Office <a href="http://www.wealthtree1.com/backoffice/?controller=Login">aqui</a> 
    </p> 
    </body> 
    </html> 
    '; 
?>

