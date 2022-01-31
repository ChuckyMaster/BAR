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

 public static function redirect(?array $parameters=null):void{


    $url = "index.php";
        if($parameters){

            $url = "?";

                    foreach($parameters as $key => $value){

                        $newParamGet = $key."=".$value."&";

                        $url.=$newParamGet;
                    }
        }


    header("Location: ".$url);
    exit();
}




}




?>