<?php
namespace App;


class Kernel

{

    public static function run(){

        $type = 'cocktail';
        $action = 'index';

        if(!empty($_GET['type'])) {
            $type = $_GET["type"];
        }
        if( !empty($_GET['action'])){
            $action = $_GET['action'];
        }

        $type = ucfirst($type);

        $nameType = "\Controllers\\".$type;

        $controller = new $nameType();
        $controller->$action();
    }
}


?>