<?php
namespace Models;



// echo "HELLLLLOOOOOOOOOOOOOOOOOOOOOO";



class Cocktail extends AbstractModel {

    private $name;
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name ;
    }

    private $id;
    public function getId(){
        return $this->id;
    }
   


    private $ingredients;
    public function getIngredients(){
        return $this->ingredients;
    }
    public function setIngredients($ingredients){
        $this->ingredients
    }


    private $image;
    public function getImage(){
        return $this->image;
    }
    public function setImage(){
       $this->image
    }




protected string $tableName = "cocktails";

   

    /**
     * Ajoute un Cocktail dans la BDD
     * 
     * @param Cocktail $cocktail
     * @return void
     * 
     * 
     */
    public function save(Cocktail $cocktail):void
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (name, image, ingredients) VALUES 
        (:name, :image, :composition)");

        $sql->execute([
            'name' => $cocktail->name,
            'image' =>$cocktail->image,
            'composition' => $cocktail->ingredients
        ]);


       
    }

    /**
     * UPDATE un Cocktail dans la BDD via ID
     * 
     * @param string $name
     * @param string $image
     * @param string $composition
     * @param int $id
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