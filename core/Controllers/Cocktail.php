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
        'action'=>'index',
        'type'=>'cocktail'
        
    ]);
    }

    $cocktail = $this->defaultModel->findById($id);
    



    if(!$cocktail) {
        return $this->redirect([
            'action' => 'index',
            'type' => 'cocktail'
        ]);
    }


    $modelComment = new \Models\Comment();


    $comments = $modelComment->findAllByCocktail($cocktail->getId());

    $pageTitle =  $cocktail->getName();
    
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

    $cocktail = new \Models\Cocktail();
    $cocktail->setName($name);
    $cocktail->setImage($image);
    $cocktail->setIngredients($composition);

   $this->defaultModel->save($cocktail);

   return $this->redirect();
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

        if(!$id){return $this->redirect([
            'type' => 'cocktail',
            'action' => 'noId'
        ]);}

        if( !$this->defaultModel->findById($id) ){ return $this->redirect([
            'type' => 'cocktail',
            'action' => 'noId'
        ]); }

        $this->defaultModel->remove($id);

        return $this->redirect();



    }

    /**
     * 
     * 
     */
    public function edit()
{

    //si on repere le cas d'une demande de soumission 
    //alors on prend une autre direction

    $idEdit = null;
    $name = null;
    $image = null;
    $ingredients = null;

    if(!empty($_POST['name'])){ $name = $_POST['name'];}
    if(!empty($image_POST[''])){ $image = $_POST['image'];}
    if(!empty($_POST['ingredients'])){ $ingredients = $_POST['ingredients'];}
    if(!empty($_POST['idEdit']) && ctype_digit($_POST['idEdit'])){ $idEdit = $_POST['idEdit'];}

if($idEdit && $name && $image && $ingredients) {

    //Dans le cas de la soumission

    //verifier si le cocktail existe 

    $cocktail = $this->defaultModel->findById($idEdit);

    if(!$cocktail){
        return $this->redirect();
    }

    //Si le cocktail existe, on passe au traitement


    $this->defaultModel->update($idEdit, $name, $ingredients, $image);

   return $this->redirect([
       "type" => "cocktail",
       "action" => "edit",

   ]);
}

$id = null;

if ( !empty($_GET['id']) && ctype_digit($_GET['id'])) {

        $id = $_GET['id'];
}





}


}














?>