<?php


require_once "Model.php";



class Info extends Model {

protected string $table = "infos";




public function create($description){
    $request = $this->pdo->prepare("INSERT INTO {$this->table} 
    (description) VALUES (:description)");

    $request->execute([
        "description" => $description
    ]);


}

}


?>


