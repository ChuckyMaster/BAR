<?php


require_once "core/libraries/tools.php";
require_once "core/Models/Sandwich.php";



$modelSandwich = new Sandwich();

$sandwichs = $modelSandwich->findAll();



$pageTitle = "Sandwichs";



render("sandwichs/index", compact('sandwichs', 'pageTitle'));












?>