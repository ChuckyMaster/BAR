<?php



require_once "core/libraries/tools.php";
require_once "core/Models/Sandwich.php";

$id = null;

if(!empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $id = $_POST['id'];
}

if(!$id){
    die("ERREUR");
}

$modelSandwich = new Sandwich();

$sandwich = $modelSandwich->findById($id);

if(!$sandwich){
    redirect("sandwichs.php");
}

$modelSandwich->remove($id);

redirect("sandwichs.php");


?>