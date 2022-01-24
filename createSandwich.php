<?php

require_once "core/libraries/tools.php";
require_once "core/Models/Sandwich.php";



$description = null;
$prix = null;

if(!empty($_POST['description'])) {
    $description = htmlspecialchars($_POST['description']);
}

if(!empty($_POST['price']) && ctype_digit($_POST['price'])){
    $prix = $_POST['price'];
}

if($description && $prix){
    $modelSandwich = new Sandwich();
    $modelSandwich->create($description, $prix);
    redirect('sandwichs.php');

}


$pageTitle = "creation de sandwich";

render('sandwichs/create', compact('pageTitle'));

?>