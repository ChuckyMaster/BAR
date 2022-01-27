<?php

namespace App;

class Response 
{


    /**
 * 
 * redirige vers l'url passée en parametre
 * 
 * @param string $url
 * 
 * @return void
 */

 public static function redirect(array $parameters):void{
    header("Location: index.php?type=".$parameters['type']."&action=".$parameters['action']);
    exit();
}




}




?>