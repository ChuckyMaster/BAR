<?php

namespace Models;

require_once dirname(__FILE__) . "/../libraries/db.php";
require_once "Model.php";

class Comment extends Model{


/**
 * 
 * 
 * trouve tous les commentaire associés à un cocktail
 * 
 * @param int $cocktail_id
 * 
 * @return array|bool
 * 
 */
 public function findAllByCocktail(int $cocktail_id)
{


        

        $requestComments = $this->pdo->prepare("SELECT * FROM comments
        WHERE cocktail_id = :cocktail_id");

        $requestComments->execute([
                "cocktail_id" => $cocktail_id

        ]);

        $comments = $requestComments->fetchAll();

        return $comments;

}



/**
*enregistre un commentaire dans la base de donn"és
*@param string author
*@param string content
*@param integer $cocktailId
*/

public function save(string $author, string $content, int $cocktailId):void{


    $requestCreateComment = $this->pdo->prepare("INSERT INTO comments
    (author, comment, cocktail_id)
    VALUES(:comment_author, :comment_content, :cocktail_id)");

    $requestCreateComment->execute([
        "comment_author" => $author,
        "comment_content" => $content,
        "cocktail_id" => $cocktailId
    ]);
}












}













?>