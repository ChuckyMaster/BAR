<?php


require_once 'core/libraries/tools.php';
require_once 'core/Models/Info.php';




$id = null;

$id = null;
if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
    $id = $_GET['id'];
}


if(!$id){
    redirect("index.php?info=noId"); //??
}

$modelInfo = new Info();

$info = $modelInfo->findById($id);


if(!$info){
    redirect("info.php?info=noId");
}


$pageTitle = "NEWS !";


render("infos/show", compact('info', 'pageTitle'));








?>