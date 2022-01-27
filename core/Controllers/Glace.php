<?php


namespace Controllers;




class Glace extends AbstractController
{

    protected $defaultModelName = \Models\Glace::class;

    /**
     * 
     * affiche la page des glaces
     * @return 
     */
    public function index()

    {
        

        $glaces = $this->defaultModel->findAll();

        $pageTitle = "ICE CREAM";

        return $this->render("glaces/index", compact("pageTitle", "glaces"));

    }

    /**
     * 
     * affiche une glace par son ID
     */
    public function show()
    {

        $id = null;
        if( !empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];

        }

        $glace = $this->defaultModel->findById($id);

        if (!$glace) { return $this->redirect('index.php?info=noId');
        }

        $pageTitle = $glace['description'];

        return $this->render("glaces/show", compact('pageTitle', 'glace'));

        // render("glaces/show", compact('pageTitle', 'glace'));

    }

    /**
     * Supprime une glace par son ID et redirige vers l'index des glaces
     * @return void
     */
    public function delete(){

        $id = null;

        if( !empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (!$id){
            return $this->redirect('index.php?info=noId');
        }


        if( !$this->defaultModel->findById($id)){
            return $this->redirect('index.php?info=noId');
        }

        $this->defaultModel->remove($id);

        return $this->redirect('glaces.php');
    }


    /**
     * Ajoute une nouvelle glace
     * 
     * @return void
     */
    public function new(){

        $description = null;

        if(!empty($_POST['description'])){
            $description = $_POST['description'];
        }

        if($description){

            $this->defaultModel->save($description);

          $this->index();
        }

        return $this->render("glaces/create", ["pageTitle" => 'new glace']);
    }




}











?>