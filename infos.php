<?php





require_once "core/libraries/tools.php";
require_once "core/Models/Info.php";




$modelInfo = new Info();

$infos = $modelInfo->findAll();


$pageTitle = "TOUTES LES INFOS";


render("infos/index", compact('infos', 'pageTitle'));












?>




