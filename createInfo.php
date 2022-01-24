<?php

require_once "core/libraries/tools.php";
require_once "core/Models/Info.php";






$description = null;


if(!empty($_POST['description'])) {
    $description = htmlspecialchars($_POST['description']);
}


if($description) {
    $modelInfo = new Info();
    $modelInfo->create($description);
    redirect('infos.php');

}


$pageTitle = "Creation Info";

render('infos/create', compact('pageTitle'));










?>