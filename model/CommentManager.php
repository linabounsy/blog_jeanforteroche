<?php

namespace Model;

require_once ('model/Database.php');

class CommentManager extends Database
{
    public function getComments($postId) // fonction recupere les commentaires d'un post
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        $comment = $comments->fetchAll();
        
        return $comment;
    }

    public function postComment($postId, $author, $comment) // fonction ajouter un commenatire
    {
        $db = $this->dbConnect();
        $newComment = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW()');
        $affectedLines = $newComment->execute(array($postId, $author, $comment));
        
        return $affectedLines;
    }
}
