<?php
require_once 'db.php';

$authorInput = null;
$commentInput = null;


if(
    !empty($_POST['author'])
    &&
    !empty($_POST['content'])
){

    $authorInput = htmlspecialchars($_POST['author']);
    $commentInput = htmlspecialchars($_POST['content']);
};


// RECCUP ID COCKTAIL

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

if($authorInput && $commentInput){
    $createComment = $pdo ->prepare("INSERT INTO comments (author, comment)
    
    VALUES (:author, :comment)
    
    WHERE id = :cocktail_id");


$createComment->execute([

    "author" => $authorInput,
    "comment" => $commentInput,
    "cocktail_id" => $id 
]);

$id = $pdo->lastInsertId();
header("Location: cocktail.php?id=$id");


}


?>