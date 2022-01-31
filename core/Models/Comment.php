<?php

namespace Models;



class Comment extends AbstractModel{

    private $author;
    public function getAuthor(){
        return $this->author;
    }
    public function setAuthor(){
        return $this->author;
    }

    private $comment;
    public function getComment(){
        return $this->comment;
    }
    public function setComment(){
        return $this->comment;
    }


 protected string $tableName = "comments";
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

        $cocktail =  new \Models\Cocktail();
        $requestComments->execute([
                "cocktail_id" => $cocktail->getId()

        ]);

        $comments = $requestComments->fetchAll(\PDO::FETCH_CLASS,get_class($this));

        return $comments;

}



/**
*enregistre un commentaire dans la base de donn"és
*@param Comment $comment
*
*/
public function save(Comment $comment):void{


    $requestCreateComment = $this->pdo->prepare("INSERT INTO comments
    (author, comment, cocktail_id)
    VALUES(:comment_author, :comment_content, :cocktail_id)");

    $cocktail =  new \Models\Cocktail();

    $requestCreateComment->execute([
        "comment_author" => $comment->author,
        "comment_content" => $comment->comment,
        "cocktail_id" => $cocktail->getId()
    ]);
}












}













?>