<?php

require_once "db.php";

$requestAllCocktails = $pdo->query("SELECT * FROM cocktails");

$cocktails = $requestAllCocktails->fetchAll();

$pageTitle = "All the Cocktails";

ob_start();

require_once "templates/cocktails/index.html.php";

$pageContent = ob_get_clean();

require_once "templates/layout.html.php";



?>


