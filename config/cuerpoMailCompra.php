<?php 
$compraOnline='<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; font-family: dHelvetica Neue, Arial, Helvetica, sans-serif"">
<tr>

    <td align="center" bgcolor="#055ead" style="padding: 5px 0 10px 0;">


    </td>

</tr>
    <tr>

        <td align="center" bgcolor="#ffffff" style="padding: 40px 0 30px 0;">

            <img src="../view/img/mastercash200.png">
        </td>

    </tr>
    <tr >
        <td align="center" style="background: #055ead; color:#ffffff; padding: 10px 20px 10px 20px"><h3 style="margin:0">Información de la orden</h3></td>
    </tr>
    <tr >
        <td style="padding: 5px 10px 30px 10px;" >

            <table cellpadding="0" cellspacing="0" width="100%" >
                <tr style="color:#055ead;">
                    <th>Producto</th>
                    <th style="padding:10px 0 10px 0; "></th>
                   
                    <th>Valor unitario</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($carrito as $d) { ?>
                <tr style="color:#666666; font-size: 12px;">
                    <td style="padding: 3px 0 3px 0">
                        <img width="50" src="../view/img/'.$d['img'].'"/>
                    </td>
                    <td align="left">
                        '.$d['nombre'].'
                    </td>
                    <td align="center">'. $d['price'].'</td>
                    <td align="center">'. $d['cant'].'</td>
                    <td align="right">$ '.$d['total'].'</td>
                </tr>
                <?php } ?>
            </table>
        </td>
    </tr>
    <tr>
        <td align="right">
            <table cellpadding="0" cellspacing="0" width="100%" >
                <tr>
                    <td style="padding:10px 0 10px 0" width="260"></td>
                    <td><strong>Total pagado</strong></td>
                    <td align="right" style="padding:0 15px 0 0"><strong>$ '.$total.'</strong></td>
                </tr>
                <tr>
                    <td style="padding:10px 0 10px 0" width="260"></td>
                    <td><strong>Metodo de pago</strong></td>
                    <td align="right" style="padding:0 15px 0 0"><strong>'.$metodo.'</strong></td>
                </tr>
                <tr >
                    <td colspan="3" style="padding:20px 15px 20px 15px">
                        <p></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#055ead" style="padding: 30px 30px 30px 30px;">
            <table>
                <tr>
                    <td>
                        <a href="http://www.mastercash1.com">www.mastercash1.com</a>
                    </td>
                    <td align="right">
                        
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>';