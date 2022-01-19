<?php

require_once "core/libraries/tools.php";
require_once "core/Models/Comment.php";


$id = null;

if(!empty($_POST['idComment']) && ctype_digit($_POST['idComment'])) {
    $id = $_POST['idComment'];
}

if(!$id){
    die("ERREUR");
}

//verifier que le commentaire existe

$modelComment = new Comment();

$comment = $modelComment->findCommentById($id);


if(!$comment){
    redirect("cocktail.php?id={$comment['cocktail_id']}");
}

$modelComment->removeComment($id);

redirect("cocktail.php?id={$comment['cocktail_id']}");



?>