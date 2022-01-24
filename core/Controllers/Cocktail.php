<?php


namespace Controllers;



    require_once "core/libraries/tools.php";

    require_once "core/Models/Comment.php";

    require_once "core/Controllers/AbstractController.php";

class Cocktail extends AbstractController
{

        protected $defaultModelName = \Models\Cocktail::class;
/**
 * 
 * affiche des cocktails ave tous les cockatils
 * 
 * @return void
 */

public function index(){

    

    $cocktails =  $this->defaultModel->findAll();

    $pageTitle = "All Cocktails";


    render("cocktails/index", compact('cocktails', 'pageTitle'));


}


/**
 * 
 * 
 * afficher la page d'un cocktail à partir de son id
 * 
 * @return void
 */
public function show(){

    $id = null;

    if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
       
        $id = $_GET['id'];
    }

    if (!$id){
        redirect("index.php?info=noId");
    }

    $modelCocktail = new \Models\Cocktail();

    $cocktail = $modelCocktail->findById($id);
    



    if(!$cocktail) {
        redirect("index.php?info=noId");
    }


    $modelComment = new \Models\Comment();


    $comments = $modelComment->findAllByCocktail($cocktail['id']);

    $pageTitle =  $cocktail['name'];
    
    render("cocktails/show", compact('cocktail', 'comments', 'pageTitle' ));
 }




/**
 * 
 * creation d'un nouveau cocktail
 *  @return void 
 */

public function new(){

    $name = null;
    $image = null;
    $composition = null;

    if(!empty($_POST['name'])){ $name = htmlspecialchars($_POST['name']);}
    if(!empty($_POST['image'])){ $name = htmlspecialchars($_POST['image']);}
    if(!empty($_POST['composition'])){ $name = htmlspecialchars($_POST['composition']);}



if( $name && $image && $composition){

   $this->defaultModel->new($name, $image, $composition);

    redirect('index.php');
}

render('cocktails/create', ["pageTitle" => "new cocktail"]);

}
 /**
     * supprimer un cocktail de la BDD et redirige vers les cocktails restants
     * 
     * @return void
     */
    public function delete():void
    {

    

        $id=null;
        if( !empty($_POST['id']) && ctype_digit($_POST['id'])){  $id = $_POST['id']; }

        if(!$id){redirect('index.php?info=noId');}

        if( !$this->defaultModel->findById($id) ){ redirect('index.php?info=noId'); }

        $this->defaultModel->remove($id);

        redirect('index.php');



    }



}














?>