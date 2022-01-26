<?php
namespace Models;


require_once "AbstractModel.php";

// echo "HELLLLLOOOOOOOOOOOOOOOOOOOOOO";



class Cocktail extends AbstractModel {


protected string $tableName = "cocktails";

    /**
     * Ajoute un Cocktail dans la BDD
     * 
     * @param string $name
     * @param string $image
     * @param string $composition
     * 
     * 
     */
    public function save(string $name, string $composition, string $image)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (name, image, ingredients) VALUES 
        (:name, :image, :composition)");

        $sql->execute([
            'name' => $name,
            'image' =>$image,
            'ingredients' => $composition
        ]);
    }







    /**
     * UPDATE un Cocktail dans la BDD
     * 
     * @param string $name
     * @param string $image
     * @param string $composition
     */
    public function update(string $name, string $composition, string $image, int $id)
    {

        $sql = $this->pdo->prepare("UPDATE {$this->tableName} 
        SET name = :name, image = :image, ingredients = :composition
        WHERE id = :id");

        $sql->execute([
            'name' => $name,
           'image'=> $image,
           'composition' => $composition,
            'id' => $id
        ]);


    }







}


?>