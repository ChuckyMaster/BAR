<?php

namespace Controllers;

use App\Response;

require_once "core/Models/Cocktail.php";
require_once "core/Models/Comment.php";
require_once "core/Models/Glace.php";
require_once "core/App/Response.php";
require_once "core/App/View.php";


abstract class AbstractController {

    protected $defaultModel;

    protected $defaultModelName;

        public function __construct()
        {
                            // new \Models\Cocktail()
            $this->defaultModel = new $this->defaultModelName();
        }



        public function redirect($url):Response
        {
            return \App\Response::redirect($url);
        }


        public function render(string $template, array $datas){
            
            return \App\View::render($template, $datas);
        }
}

