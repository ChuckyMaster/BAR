<?php

require_once dirname(__FILE__) . "/../libraries/db.php";


class Comment {


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
 public function findAllCommentsCocktail(int $cocktail_id)
{


        $pdo = getPdo();

        $requestComments = $pdo->prepare("SELECT * FROM comments
        WHERE cocktail_id = :cocktail_id");

        $requestComments->execute([
                "cocktail_id" => $cocktail_id

        ]);

        $comments = $requestComments->fetchAll();

        return $comments;

}

/**
 * 
 * 
 * trouve un commentaire par son id
 * renvoie un tableau contenant un commentaire
 * 
 * @param integer $comment_id
 * @return array|bool
 * 
 */

 public function findCommentById(int $comment_id){


        $pdo = getPdo();



        $requestOneComment =  $pdo->prepare("SELECT *FROM comments WHERE id = :comment_id");

        $requestOneComment->execute([
                "comment_id" => $comment_id
        ]);

        $comment = $requestOneComment->fetch();

        return $comment;


 }


 public function removeComment(int $comment_id): void {

        $pdo = getPdo();

        $requestRemove = $pdo->prepare("DELETE FROM comments WHERE id = :comment_id");

        $requestRemove->execute([
                "comment_id" => $comment_id
        ]);
}

public function saveComment(string $author, string $content, int $cocktailId):void{

    $pdo = getPdo();

    $requestCreateComment = $pdo->prepare("INSERT INTO comments
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