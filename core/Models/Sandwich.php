<?php


require_once "Model.php";



class Sandwich extends Model {



protected string $table = "sandwichs";


    /**
     * 
     * 
     */
    public function create($description, $price){

        $request = $this->pdo->prepare("INSERT INTO {$this->table} 
        (description, prix) VALUES (:description, :prix)");

        $request->execute([
            "description" => $description,
            "prix" => $price
        ]);
    }







}




?>