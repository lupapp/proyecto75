<?php
$cuerpo = ' 
            <html> 
            <head> 
               <title>Reseteo de contraseña</title> 
            </head> 
            <body> 
            <h1>Su nueva contraseña es: '.$password.'</h1> 
            <p> 
            Se asigno una nueva contraseña aleatoria si quiere cambiar por otra pulse <a href="?controller=Usuarios&action=cambiarPass">aqui</a> 
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
                Ahora puede ingresar al Back Office <a href="http://www.mastercash1.com/backoffice/?controller=Login">aqui</a> 
            </p>    
            </body> 
            </html> 
        ';

if(isset($_POST['id_user'])){
    if($pago->metodo_pago==1){
        //registro de desde la red del usuario cuando hay un usurio existente y con metodo de pago deposito
        $registroInRed= ' 
        <html> 
        <head> 
           <title>Su registro fue exitoso</title> 
        </head> 
        <body> 
        <h1>Usted realizó el registro para adquirir la membresía<img src="http://www.mastercash1.com/backoffice/view/img/'.$plan[0]->avatar_plan.'"> '.$plan[0]->nombre_plan.' por valor de '.$plan[0]->valor_plan.'</h1>
        <h1>Es importante que de a conocer el número de documento o transacción para la aprobación del registro de la membresía</h1>
        <p>    
        Usted marco como método de pago deposito si no ha realizado el deposito lo puede hacer el en la cuenta de ahorros No. 4444444444 del Banco Pichincha.
        Una ves tenga un número de documento ingrese ese número <a href="http://www.mastercash1.com/backoffice/index.php?controller=Usuarios&action=showPago&id_pago='.$pago->id.'">aqui</a>
        </p> 
        </body> 
        </html> 
        '; 
    }else{
        //registro de desde la red del usuario cuando hay un usurio existente y con metodo de pago bitcoins
        $registroInRed= ' 
        <html> 
        <head> 
           <title>Su registro fue exitoso</title> 
        </head> 
        <body> 
        <h1>Usted realizó el registro para adquirir la membresía<img src="http://www.mastercash1.com/backoffice/view/img/'.$plan[0]->avatar_plan.'"> '.$plan[0]->nombre_plan.' por valor de '.$plan[0]->valor_plan.'</h1>
        <h1>Es importante que de a conocer el número de documento o transacción para la aprobación del registro de la membresía</h1>
        <p>Usted marcó como método de pago Bitcoins si no lo ha realizado puede
        <form action="http://www.mastercash1.com/backoffice/bitcoins/pago.php" method="POST">
        <input type="hidden" name="valor" value="'.$pago->valor.'">
        <input type="hidden" name="id_pago" value="'.$pago->id.'">
        <input class="btn btn-success" type="submit" value="Procesarlo aqui">
        una ves tenga un número de transaccion exitosa ingrese ese número de transacción<a href="http://www.mastercash1.com/backoffice/index.php?controller=Usuarios&action=showPago&id_pago='.$pago->id.'">aqui</a>
        </p> 
        </body> 
        </html> 
        '; 
    }
}else{

    if($pago->metodo_pago==1){
        //registro de desde la red del usuario cuando no hay usuario y se crea y con metodo de pago deposito
        $registroInRed= ' 
        <html> 
        <head> 
        <title>Su registro fue exitoso</title> 
        </head> 
        <body> 
        <h1>Usted realizó el registro para adquirir la membresía<img src="http://www.mastercash1.com/backoffice/view/img/'.$plan[0]->avatar_plan.'"> '.$plan[0]->nombre_plan.' por valor de '.$plan[0]->valor_plan.'</h1>
        <h1>Su usuario es: '.$user.'</h1>
        <h1>Su contraseña es: '.$password.'</h1> 
        <h1>Es importante que de a conocer el número de documento o transacción para la aprobación del registro de la membresía</h1>    
        <p> 
        Ahora puede ingresar al Back Office <a href="www.mastercash1.com/backoffice/?controller=Login">aqui</a> 
        </p>    
        <p>
        Usted marco como método de pago deposito si no ha realizado el deposito lo puede hacer el en la cuenta de ahorros No. 4444444444 del Banco Pichincha.
        Una ves tenga un número de documento ingrese ese número <a href="http://www.mastercash1.com/backoffice/index.php?controller=Usuarios&action=showPago&id_pago='.$pago->id.'">aqui</a>
        </p> 
        </body> 
        </html> 
        '; 
    }else{
        //registro de desde la red del usuario cuando no hay usuario y se crea y con metodo de pago bitcoins
        $registroInRed= ' 
        <html> 
        <head> 
          <title>Su registro fue exitoso</title> 
        </head> 
        <body> 
        <h1>Usted realizó el registro para adquirir la membresía<img src="http://www.mastercash1.com/backoffice/view/img/'.$plan[0]->avatar_plan.'"> '.$plan[0]->nombre_plan.' por valor de '.$plan[0]->valor_plan.'</h1>
        <h1>Su usuario es: '.$user.'</h1>
        <h1>Su contraseña es: '.$password.'</h1> 
        <h1>Es importante que de a conocer el número de documento o transacción para la aprobación del registro de la membresía</h1>    
        <p> 
        Ahora puede ingresar al Back Office <a href="http://www.mastercash1.com/backoffice/?controller=Login">aqui</a> 
        </p>    
        <p>
        Usted marcó como método de pago Bitcoins si no lo ha realizado puede
        <form action="http://www.mastercash1.com/backoffice/bitcoins/pago.php" method="POST">
        <input type="hidden" name="valor" value="'.$plan[0]->valor_plan.'">
        <input type="hidden" name="id_pago" value="'.$pago->id.'">
        <input class="btn btn-success" type="submit" value="Procesarlo aqui">
        una ves tenga un número de transaccion exitosa ingrese ese número<a href="http://www.mastercash1.com/backoffice/index.php?controller=Usuarios&action=showPago&id_pago='.$pago->id.'"> aqui</a>
        </p> 
        </body> 
        </html> 
        '; 

    }
}




?>

