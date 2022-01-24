<?php


namespace Controllers;



require_once "core/libraries/tools.php";

require_once "core/Controllers/AbstractController.php";

require_once "core/Models/Glace.php";



class Glace extends AbstractController
{

    protected $defaultModelName = \Models\Glace::class;

    /**
     * 
     * affiche la page des glaces
     * @return void
     */
    public function index():void

    {

        $glaces = $this->defaultModel->findAll();

        $pageTitle = "ICE CREAM";

        render("glaces/inddex", compact("pageTitle", "glaces"));

    }
}











?>