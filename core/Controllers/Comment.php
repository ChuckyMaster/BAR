<?php
namespace Controllers;

require_once "core/Controllers/AbstractController.php";
require_once "core/libraries/tools.php";
require_once "core/Models/Cocktail.php";


class Comment extends AbstractController{


        protected $defaultModelName = \Models\Comment::class;

        /**
         * Supprime un commentaire par son ID
         * @return void
         */
        public function delete()
        {
            $id = null;

            if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
                $id = $_POST['id'];
            }

            //verifier que le commentaire existe
            if (!$id){
                die("ERROR ID ITEM");
            }


            $comment = $this->defaultModel->findById($id);


            return $this->redirect("cocktail.php?id{$comment['id']}");
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

            if (!$cocktailId || $content || $author) {

                return $this->redirect("cocktail.php?id={$cocktailId}");
            }

            //Verifier que le cocktail existe

            $modelCocktail = new \Models\Cocktail();

            $cocktail = $modelCocktail->findById($cocktailId);

            if (!$cocktail) {
                return $this->redirect("index.php?info=noId");
            }

            $this->defaultModel->save($author, $content, $cocktailId);

            return $this->redirect("cocktail.php?id={$cocktailId}");
        }













}





?>