<?php
namespace Models;


class Sandwich extends AbstractModel {


protected string $tableName = "sandwichs";



/**
 * 
 * Ajoute un sandwich dans la BDD
 * @param string $description
 * @param int $prix
 * 
 * @return void
 */
public function save(string $description, int $prix):void
{

    $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (description, prix) 
    VALUES (:description, :prix)");

    $sql->execute([
        'description' => $description,
        'prix' => $prix
    ]);
}

}







?>