<?php


/**
 * 
 * redirige vers l'url passée en parametre
 * 
 * @param string $url
 * 
 * @return void
 */

 function redirect(string $url):void{
     header("Location: {$url}");
     exit();
 }




 /**
  * genere le rendu d'une page à partir d'un template
  *et des donnés fournies
  *@param string $templateName
  *@param array $datas
  *@return void
  *
  */


  function render(string $templateName, array $datas):void{


    ob_start();

    extract($datas);

    require_once "templates/{$templateName}.html.php";

    $pageContent = ob_get_clean();

    require_once "templates/layout.html.php";

  }

?>