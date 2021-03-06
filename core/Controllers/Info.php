<?php
namespace Controllers;

class Info extends AbstractController {

    protected $defaultModelName = \Models\Info::class;
    
    /**
     * affiche la pages des infos
     * @return
     */
    public function index(){

        $infos = $this->defaultModel->findAll();

        $pageTitle = "Flash News";

        return $this->render('infos/index', compact('pageTitle', 'infos'));
    }



    /**
     * 
     * Afficher une info et les réactions
     * @return
     */
    public function show(){

        $id = null;


        if( !empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];

        }
        if(!$id){ 
          
            
            return $this->redirect([
                'action'=>'index',
                'type'=>'info'
            ]);
          }

        $info = $this->defaultModel->findById($id);

        if( !$info){
            return $this->redirect([
                'action'=>'index',
                'type'=>'info'           
            ]);
        }

        $modelReaction = new \Models\Reaction();
        $reactions = $modelReaction->findAllByInfo($id);

        $pageTitle = "Info";

        return $this->render("infos/show", compact('pageTitle', 'info', "reactions"));


 


    }

  /**
   * 
   * creer une nouvelle Info
   * 
   * @param string $author
   * @param string $content
   * 
   */
  public function new(){

    
    $content = null;

   
    if(!empty($_POST['content'])){
        $content = $_POST['content'];
    }


   
    if( $content){
        $this->defaultModel->save( $content);

        return $this->redirect( [
            "type" => "info",
              "action" => "index"
        ]);
      
        
    };

    $pageTitle = "New Info";
    return $this->render('infos/create', compact('pageTitle'));


     

   
    

   

   

  }









}





?>