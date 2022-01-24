<?php 

require_once 'core/libraries/tools.php';
require_once 'core/Models/Sandwich.php';



$id = null;

$id = null;
if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
    $id = $_GET['id'];
}


if(!$id){
    redirect("index.php?info=noId");
}

$modelSandwich = new Sandwich();

$sandwich = $modelSandwich->findById($id);

if(!$sandwich){
    redirect("sandwich.php?info=noId");
}

$pageTitle = $sandwich['prix']; //MDR

render("sandwichs/show", compact('sandwich', 'pageTitle'));
?>