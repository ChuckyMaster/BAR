<?php

$pdo = new PDO("mysql:host=localhost;dbname=bistrot;charset=utf8", "mojito","rhum", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);



?>