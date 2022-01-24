<?php

namespace Controllers;

require_once "core/Models/Cocktail.php";
require_once "core/Models/Comment.php";
require_once "core/Models/Glace.php";


abstract class AbstractController {

    protected $defaultModel;

    protected $defaultModelName;

        public function __construct()
        {
                            // new \Models\Cocktail()
            $this->defaultModel = new $this->defaultModelName();
        }
}