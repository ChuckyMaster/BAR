<?php
namespace Controllers;



class Comment extends AbstractController{


        protected $defaultModelName = \Models\Comment::class;

        /**
         * Supprime un commentaire par son ID
         * @return void
         */
        public function delete()
        {
            $idCock = null;
            $idCom = null;

            if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
                $idCom = $_POST['id'];
            }
            if (!empty($_POST['idCoke']) && ctype_digit($_POST['idCoke'])) {
                $idCock = $_POST['idCoke'];
            }

            //verifier que le commentaire existe
            if (!$idCock || !$idCom){
                die("ERROR ID ITEM");
            }


            $comment = $this->defaultModel->findById($idCom);

            if(!$comment) {
                return $this->redirect();
            }

            $this->defaultModel->remove($idCom);

            return $this->redirect([
                "type" => "cocktail",
                "action" => 'show',
                "id" => $idCock
            ]);
            

            
        }


        /**
         * 
         * Créer un nouveau commentaire
         * @return void
         * 
         */
        public function new(){
            if ( !empty($_POST['cocktailId']) && ctype_digit($_POST['cocktailId'])) {

                $cocktailId = $_POST['cocktailId'];
            }

            if ( !empty($_POST['author'])) {
                $author = htmlspecialchars($_POST['author']);
            }

            if (!empty($_POST['content'])) {
                $content = htmlspecialchars($_POST['content']);
            }

            if (!$cocktailId || !$content || !$author) {

                return $this->redirect();
            }

            //Verifier que le cocktail existe

            $modelCocktail = new \Models\Cocktail();

            $cocktail = $modelCocktail->findById($cocktailId);

            if (!$cocktail) {
                return $this->redirect([
                    "action" => "index",
                    "type" => "cocktail"
                ]);
            }

            $this->defaultModel->save($comment);

            return $this->redirect([
                "action" => "show",
                "type" => "cocktail",
                "id" => $cocktailId
            ]);
        }













}





?>