<?php

namespace Database;

class PdoMySQL
{
/**
 * Retourne un objet pour intéragir avec la base de données
 * 
 * @return \PDO
 * 
 */

public static function getPdo():\PDO {
    $pdo = new \PDO("mysql:host=localhost;dbname=bistrot;charset=utf8", "mojito","rhum", [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
    ]);
    return $pdo;

}

}









?>