<?php

require_once "core/libraries/db.php";
require_once "core/libraries/tools.php";
require_once "core/Models/Cocktail.php";





//Point d'entrée

$modelCocktail = new Cocktail();

$cocktails = $modelCocktail->findAllCocktails();





$pageTitle = "Tous les Cocktails";


render("cocktails/index", compact('cocktails', 'pageTitle'));




?>


