<?php


namespace Controllers;



class Cocktail extends AbstractController
{

        protected $defaultModelName = \Models\Cocktail::class;
/**
 * 
 * affiche des cocktails ave tous les cockatils
 * 
 * @return Response
 */

public function index(){

    

    $cocktails =  $this->defaultModel->findAll();

    $pageTitle = "All Cocktails";


    return $this->render("cocktails/index", compact('cocktails', 'pageTitle'));


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
        return $this->redirect([  
        'action'=>'cocktails',
        'type'=>'index']);
    }

    $cocktail = $this->$defaultModel->findById($id);
    



    if(!$cocktail) {
        return $this->redirect("index.php?info=noId");
    }


    $modelComment = new \Models\Comment();


    $comments = $modelComment->findAllByCocktail($cocktail['id']);

    $pageTitle =  $cocktail['name'];
    
    return $this->render("cocktails/show", compact('cocktail', 'comments', 'pageTitle' ));
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
    if(!empty($_POST['image'])){ $image = htmlspecialchars($_POST['image']);}
    if(!empty($_POST['composition'])){ $composition = htmlspecialchars($_POST['composition']);}



if( $name && $image && $composition){

   $this->defaultModel->save($name, $image, $composition);

   return $this->redirect('index.php');
}

return $this->render('cocktails/create', ["pageTitle" => "new cocktail"]);

}
 /**
     * supprimer un cocktail de la BDD et redirige vers les cocktails restants
     * 
     * @return void
     */
    public function delete():Response
    {

    

        $id=null;
        if( !empty($_POST['id']) && ctype_digit($_POST['id'])){  $id = $_POST['id']; }

        if(!$id){return $this->redirect('index.php?info=noId');}

        if( !$this->defaultModel->findById($id) ){ return $this->redirect('index.php?info=noId'); }

        $this->defaultModel->remove($id);

        return $this->redirect('index.php');



    }



}














?>