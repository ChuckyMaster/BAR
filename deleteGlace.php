<?php

$id = null;


if(!empty($_POST['id']) && ctype_digit($_POST['id'])){


    $id = $_POST['id'];
}
// verifie que la glace existe bien



$modelGlace = new Glace();


if(!$modelGlace->findById($id)){
    redirect('index.php');
}

$modelGlace->remove($id);



?>