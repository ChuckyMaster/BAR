<?php 

require_once 'db.php';

$id = null;
$cocktail = null;


if(isset($_POST['id']) && ctype_digit($_POST['id'])) {
$id = $_POST['id'];
};



if(!$id) {

    die("pas d'id");
};
    $requestOneCocktail = $pdo->prepare("SELECT * FROM cocktails
    WHERE id = :cocktail_id");
   
   $requestOneCocktail->execute([
       "cocktail_id" => $id
   ]);
   
   $cocktail = $requestOneCocktail->fetch();
  
   var_dump($cocktail);

   if(!$cocktail){
       header("Location: index.php?info=errDel");
       exit();
   };
   if(!$id){

    die( "Ce Cocktail n'existe pas" );
}

  
    $deleteOne = $pdo->prepare("DELETE FROM `cocktails` WHERE `cocktails` . `id` = :idToDelete");
    $deleteOne->execute([

        "idToDelete" => $id
    ]);
    header("Location: index.php");
    echo "c bon ? ";
    exit();





    







?>