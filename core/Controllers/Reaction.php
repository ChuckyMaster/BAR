<?php
namespace Controllers;


class Reaction extends AbstractController
{

    protected $defaultModelName = \Models\Reaction::class;

    /**
     * créer nouvelle réaction
     * @return void
     */
    public function new(){

        $id = null;
        $author = null;
        $content = null;

        if ( !empty($_POST['infoId']) && ctype_digit($_POST['infoId'])){

            $id = $_POST['infoId'];
        }
        if ( !empty($_POST['author']) ){

            $author = htmlspecialchars($_POST['author']) ;
        }
        if ( !empty($_POST['content'])) {

            $content = htmlspecialchars($_POST['content']) ;
        }

        if (!$id || !$content || !$author) {
            return $this->redirect();
        }

        //verifier que l'info existe

        $modelInfo = new \Models\Info();

        $info = $modelInfo->findById($id);

        if (!$info){
            return $this->redirect([
                "action" => "index",
                "type" => "info"
            ]);
        }

        $this->defaultModel->save($author, $content, $id);

        return $this->redirect([
            "action" => "show",
            "type" => "info",
            "id" => $id
        ]);




    }

    /**
     * 
     * supprimer une réactions par son id
     *  @return void
     */
    public function delete(){

        $idInfo = null;
        $idReact = null;

        if (!empty($_POST['idInfo']) && ctype_digit(($_POST['idInfo']))) {
            $idInfo = $_POST['idInfo'];
        }
        if (!empty($_POST['idReact']) && ctype_digit(($_POST['idReact']))) {
            $idReact= $_POST['idReact'];
        }

        //verifier que l'info existe

        if (!$idInfo || !$idReact){
            die("ERROR SUR ID");
        }


        $reaction = $this->defaultModel->findById($idReact);

        if(!$reaction) {
            return $this->redirect();
        }

        $this->defaultModel->remove($idReact);

        return $this->redirect([
            "type" => "info",
            "action" => "show",
            "id" => $idInfo
        ]);


    }





}




?>