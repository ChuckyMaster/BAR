<?php

require_once 'db.php';

$nameInput = null;
$ingrInput = null;
$imgInput = null;



if(!empty($_POST['name']) && !empty($_POST['ingredients']) &&!empty($_POST['image'])) {

    $nameInput = htmlspecialchars( $_POST['name'])  ;
    $ingrInput = htmlspecialchars( $_POST['ingredients']);
    $imgInput = htmlspecialchars( $_POST['image']);

   
}



if($nameInput && $imgInput && $ingrInput) {
    $requestCreate = $pdo->prepare("INSERT INTO cocktails (name, ingredients, image)
    VALUES (:name, :ingredients, :image)");
    
    // $requestCreate->bindParam(1, $cocktails['name']);
    // $requestCreate->bindParam(2, $cocktails['ingredients']);
    
    $requestCreate->execute([
        "name" => $nameInput,
        "ingredients" => $ingrInput,
        "image" => $imgInput
    ]);
    
    

     
    // if(!$nameInput && !$imgInput && !$ingrInput){ 


    //     die("REMPLIR TOUS LES CHAMPS MERCI BONSOIR");
    // }




    $id = $pdo->lastInsertId();
    header("Location: cocktail.php?id=$id");



};











$pageTitle = "New cocktail";

ob_start();

require_once "templates/cocktails/create.html.php";

$pageContent = ob_get_clean();

require_once "templates/layout.html.php";

?>