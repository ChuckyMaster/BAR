<?php 
require_once 'db.php';


$id = null;

$nameEdit = null;
$IngrEdit = null;
$imgEdit = null;



if(isset($_GET['idToEdit']) && ctype_digit($_GET['idToEdit'])){

    $id = $_GET['idToEdit'];

};

if(!empty($_POST['nameEdit']) && !empty($_POST['ingredientsEdit']) &&!empty($_POST['imageEdit'])){

    $nameEdit = htmlspecialchars( $_POST['nameEdit']);
    $ingrEdit = htmlspecialchars( $_POST['ingredientsEdit']);
    $imgEdit = htmlspecialchars( $_POST['imageEdit']);

   
};




// REQUETE QUI RECCUP UN COCKTAIL AVEC UN ID SPECIFIQUE
if($id){
    $requestOneCocktail = $pdo->prepare("SELECT * FROM cocktails
 WHERE id = :cocktail_id");

$requestOneCocktail->execute([
    "cocktail_id" => $id
]);

$cocktail = $requestOneCocktail->fetch();
}

if($nameEdit && $ingrEdit && $imgEdit) {

    $requestEdition = $pdo->prepare("UPDATE cocktails
    SET name = :name, image =:img, ingredients = :ingr
    WHERE id = :cocktail_id ");
    
    $requestEdition->execute([
        "name" =>  $nameEdit,
      "img" =>  $imgEdit,
      "ingr" =>  $ingrEdit,
      "cocktail_id" => $id
    
    ]);


header("Location: cocktail.php?id=$id");
}
    $pageTitle = ("Edit: ");

    ob_start();

    require_once "templates/cocktails/edit.html.php";

    $pageContent = ob_get_clean();

    require_once "templates/layout.html.php";


    ?>


