<?php

namespace Controllers;

abstract class AbstractController {

    protected $defaultModel;

    protected $defaultModelName;

        public function __construct()
        {
                            // new \Models\Cocktail()
            $this->defaultModel = new $this->defaultModelName();
        }



        public function redirect( ? array $url=null):Response
        {
            return \App\Response::redirect($url);
        }


        public function render(string $template, array $datas){
            
            return \App\View::render($template, $datas);
        }
}

