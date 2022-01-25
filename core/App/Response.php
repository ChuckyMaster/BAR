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
 * @return 
 */

 public static function redirect(string $url){
    header("Location: {$url}");
    exit();
}




}




?>