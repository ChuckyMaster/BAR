<?php

namespace Models;

class Reaction extends AbstractModel{


    protected string $tableName = "reactions";

    /**
     * 
     * Trouve toutes les réactions associés à une info
     * @param int $info_id
     * 
     * @return array|bool
     * 
     */
    public function findAllByInfo(int $info_id){

        $sql = $this->pdo->prepare("SELECT * FROM reactions WHERE info_id = :info_id");

        $sql->execute([
            "info_id" => $info_id
        ]);

        $reactions = $sql->fetchAll();

        return $reactions;
    }



}















?>