<?php


namespace Controllers;

use Models\AbstractModel;

require_once "core/libraries/tools.php";

require_once "core/Controllers/AbstractController.php";



class Glace extends AbstractModel 
{

    protected $defaultName = \Models\Glace::class;

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