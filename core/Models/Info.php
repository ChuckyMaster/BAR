<?php
namespace Models;



class Info extends AbstractModel {

protected string $tableName = "infos";

/**
 * enregistre une nouvelle Info dans la BDD
 * 
 * 
 * @param string $content
 * 
 */
public function save(string $content){

    $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} ( description) VALUES ( :content)");

    $sql->execute([
       
        "content" => $content
    ]);
}

}










?>