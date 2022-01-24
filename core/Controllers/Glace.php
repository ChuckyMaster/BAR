<?php

namespace Controllers;


require_once "core/libraries/tools.php";

require_once "core/Controllers/AbstractController.php";




class Glace extends AbstractController
{

    protected $defautModelName = \Models\Glace::class;


    /**
     * affiche les glaces
     */
    public function index():void
    {
        $glaces = $this->defaultModel->findAll();

        $pageTitle = "Glaces !";

        render("glaces/index", compact("pageTitle", "glaces"));
    }
}



?>