<?php

require_once './core/Models/Comment.php';
require_once './core/Models/Cocktail.php';
require_once './core/libraries/tools.php';

$authorInput = null;
$commentInput = null;
$cocktailId = null;

if(!empty($_POST['cocktailId']) && ctype_digit($_POST['cocktailId'])){
    $cocktailId = $_POST['cocktailId'];
}



if(
    !empty($_POST['author'])){
        $authorInput = htmlspecialchars($_POST['author']);
    }

  if(!empty($_POST['content']))  
{

   
    $commentInput = htmlspecialchars($_POST['content']);
};


if(!$cocktailId || !$commentInput || !$authorInput){

    redirect("cocktail.php?id={$cocktailId}");
}


//Verification du cocktail

$modelCocktail = new Cocktail();

$cocktail = $modelCocktail->findCocktailById($cocktailId);

if(!$cocktail){
    redirect("index.php?info=noId");
}

$modelComment = new Comment();
$modelComment->saveComment($authorInput, $commentInput, $cocktailId);


redirect("cocktail.php?id={$cocktailId}");




?>