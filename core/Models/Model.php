<?php

namespace Models;

require_once dirname(__FILE__)."/../libraries/db.php";

class Model
{
protected $pdo;
protected string $table;

public function __construct()
{
    $this->pdo = getPdo();
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
   

    $requestAllElem = $this->pdo->query("SELECT * FROM {$this->table}");

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

    

    $requestOneId =  $this->pdo->prepare("SELECT *FROM {$this->table} WHERE id = :id");

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

       

    $requestRemove = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");

    $requestRemove->execute([
            "id" => $id
    ]);
}


}





?>