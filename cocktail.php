<!-- INTERAGIR AVEC LE BDD POUR OBTENIR $cocktail

DECLENCHER LE SYSTEME DE TEMPLATING -->



<?php


require_once 'core/libraries/tools.php';
require_once 'core/Models/Cocktail.php';
require_once 'core/Models/Comment.php';




$id = null;
if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
    $id = $_GET['id'];
}


if(!$id){
    redirect("index.php?info=noId");
}

$modelCocktail = new Cocktail();

$cocktail = $modelCocktail->findCocktailById($id);


if(!$cocktail){
    redirect("index.php?info=noId");
}

$modelComment = new Comment();

$comments = $modelComment->findAllCommentsCocktail($id);

$pageTitle = $cocktail['name'];

render("cocktails/show", compact('cocktail', 'comments', 'pageTitle'));







?>


