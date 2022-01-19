<?php
require_once dirname(__FILE__)."/../libraries/db.php";
echo "HELLLLLOOOOOOOOOOOOOOOOOOOOOO";







class Cocktail {

/**
 * 
 * 
 * retourne un tablrau contenant TOUS les cocktails
 * 
 * @return array $cocktail
 * 
 */


   public function findAllCocktails():array{
    $pdo = getPdo();

    $requestAllCocktails = $pdo->query("SELECT * FROM cocktails");

    $cocktails = $requestAllCocktails->fetchAll();

    return $cocktails;
}



/**
* 

* 
* trouver un cocktail pâr son id
* renvoie un tableau contenant un cocktail
* 
* @param integer $cocktail_id
* @param array|bool
* 
*/

 public function findCocktailById(int $cocktail_id){
    $pdo = getPdo();


    $requestOneCocktail = $pdo->prepare("SELECT * FROM cocktails WHERE id = :cocktail_id");

    $requestOneCocktail->execute([
            "cocktail_id" => $cocktail_id
    ]);



    $cocktail = $requestOneCocktail->fetch();
    return $cocktail;
}


}


?>