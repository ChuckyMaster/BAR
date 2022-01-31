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

        $reactions = $sql->fetchAll(\PDO::FETCH_CLASS,get_class($this));

        return $reactions;
    }


    /**
     * enregistre une réaction dans la BDD
     * @param string $author
     * @param string $content
     * @param integer $id
     */
    public function save(string $author, string $content, int $id){
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (author, content, info_id) 
        VALUES (:author, :content, :id)");

        $sql->execute([
            "author" => $author,
            "content" => $content,
            "id" => $id
        ]);
    }

}















?>