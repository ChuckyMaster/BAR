<?php

namespace Models;

require_once "core/Database/PdoMySQL.php";

abstract class AbstractModel
{
protected $pdo;
protected string $tableName;

public function __construct()
{
    $this->pdo = \Database\PdoMySQL::getPdo();
}

/**
 * 
 * 
 * retourne un tableau contenant TOUS les elemesnt
 * 
 * @return array $elements
 * 
 */
   public function findAll():array{
   

    $requestAllElem = $this->pdo->query("SELECT * FROM {$this->tableName}");

    $elements = $requestAllElem->fetchAll();

    return $elements;
}




/**
 * retrouve un element par son id
 * 
 * @return array
 * 
 * 
 */
public function findById(int $id){

    

    $requestOneId =  $this->pdo->prepare("SELECT *FROM {$this->tableName} WHERE id = :id");

    $requestOneId->execute([
            "id" => $id
    ]);

    $element = $requestOneId->fetch();

    return $element;


}


/**
 * 
 * 
 */

public function remove(int $id): void {

       

    $requestRemove = $this->pdo->prepare("DELETE FROM {$this->tableName} WHERE id = :id");

    $requestRemove->execute([
            "id" => $id
    ]);
}


}





?>