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

        render("glaces/index", compact("pageTitle", "glaces"));

    }

    /**
     * 
     * affiche une glace par son ID
     */
    public function show():void
    {

        $id = null;
        if( !empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];

        }

        $glace = $this->defaultModel->findById($id);

        if (!$glace) { redirect('index.php?info=noId');
        }

        $pageTitle = $glace['description'];

        render("glaces/show", compact('pageTitle', 'glace'));

    }

    /**
     * Supprime une glace par son ID et redirige vers l'index des glaces
     * @return void
     */
    public function delete():void{

        $id = null;

        if( !empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (!$id){
            redirect('index.php?info=noId');
        }


        if( !$this->defaultModel->findById($id)){
            redirect('index.php?info=noId');
        }

        $this->defaultModel->remove($id);

        redirect('index.php');
    }


    /**
     * Ajoute une nouvelle glace
     * 
     * @return void
     */
    public function new():void{

        $description = null;

        if(!empty($_POST['description'])){
            $description = $_POST['description'];
        }

        if($description){

            $this->defaultModel->save($description);

            redirect('index.php');
        }

        render("glaces/create", ["pageTitle" => 'new glace']);
    }




}











?>