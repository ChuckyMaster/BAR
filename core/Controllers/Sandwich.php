<?php
namespace Controllers;

require_once "core/Models/Sandwich.php";
require_once "core/Controllers/AbstractController.php";


class Sandwich extends AbstractController {

    protected $defaultModelName = \Models\Sandwich::class;

    /**
     * affiche l'accueil des casse-dalles
     * @return 
     */
    public function index() {

        $sandwichs = $this->defaultModel->findAll();

        $pageTitle = "Les casse-dalles";

        return $this->render("sandwichs/index", compact("pageTitle", "sandwichs"));
    }

/**
 * Affiche un seule sandwiche
 * 
 */
    public function show(){

        $id = null;

        if( !empty($_GET['id']) && ctype_digit($_GET['id']) ){ $id= $_GET['id']; }

        if(!$id){ 
          
            
           return $this->redirect('index.php?info=noId');
         }

         $sandwich = $this->defaultModel->findById($id);

         if (!$sandwich) {
             return $this->redirect('index.php?info=noId');
         }

         $pageTitle = $sandwich['description'];

         $this->render("sandwichs/show", compact('pageTitle', 'sandwich'));
    }

    /**
     * creer un nouveau sandwich
     * 
     */
    public function new(){

        $description = null;
        $prix = null;

        if( !empty($_POST['description'])){
            $description = $_POST['description'];
        }

        if( !empty($_POST['price']) && ctype_digit($_POST['price'])) {

            $prix = $_POST['price'];
        }

        if($prix && $description){

            $this->defaultModel->save($description, $prix);

            return $this->redirect('sandwichs.php');
        }

        return $this->render("sandwichs/create", ["pageTitle" => "new casse-dalle"]);
    }

}

?>