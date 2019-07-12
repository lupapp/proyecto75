<?php

/**

 * Created by PhpStorm.

 * User: Pc01

 * Date: 6/12/2018

 * Time: 5:28 PM

 */



class Constantes

{

    //define('MIN_VALUE', '0.0');  WRONG - Works OUTSIDE of a class definition.

    //define('MAX_VALUE', '1.0');  WRONG - Works OUTSIDE of a class definition.



    const PATH = 'localhost/mastercash/backoffice/';      // RIGHT - Works INSIDE of a class definition.

    //const PATH='www.mastercash1.com/backoffice/';



    public function getPath()

    {

        return self::PATH;

    }



}