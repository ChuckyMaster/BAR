<?php

namespace Models;

require_once "AbstractModel.php";



class Glace extends AbstractModel {
    
    protected string $tableName = "glaces";

    /**
     * ajoute une glace
     * @return string $description
     */
    public function save(string $description):void
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (description) VALUES (:description)");

        $sql->execute([
            'description' => $description
        ]);
    }


}












?>