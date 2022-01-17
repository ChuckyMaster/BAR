<!-- INTERAGIR AVEC LE BDD POUR OBTENIR $cocktail

DECLENCHER LE SYSTEME DE TEMPLATING -->



<?php



require_once 'db.php';



if( !empty(($_GET['id'])) && ctype_digit($_GET['id'])   ) {

    $id = $_GET['id'];


}
// REQUEST COCKTAIL

$requestOneCocktail = $pdo->prepare("SELECT * FROM cocktails
 WHERE id = :cocktail_id");

$requestOneCocktail->execute([
    "cocktail_id" => $id
]);
$cocktail=$requestOneCocktail->fetch();

if(!$cocktail){
    header("Location: index.php?info=noId");
    exit();
}

// END ONE COCKTAIL




// REQUEST COMMENT
$requestComment = $pdo->prepare("SELECT * FROM comments
WHERE cocktail_id = :cocktail_id");

$requestComment->execute([
    "cocktail_id" => $id
]);

$comments=$requestComment->fetchAll();
// END COMMENT



$pageTitle = ($cocktail['name']);

ob_start();

require_once "templates/cocktails/show.html.php";

$pageContent = ob_get_clean();

require_once "templates/layout.html.php";






?>


