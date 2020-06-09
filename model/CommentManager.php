<?php

namespace Model;

require_once ('model/Database.php');

class CommentManager extends Database
{
    public function getComments($postId) // fonction recupere les commentaires d'un post
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $req->execute(array($postId));
        $comments = $req->fetchAll();
        
        return $comments;
    }

    public function getComment($commentId) // fonction qui recupere UN commentaire
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

    public function postComment($postId, $author, $comment) // fonction ajouter un commenatire
    {
        $db = $this->dbConnect();
        $newComment = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, alert) VALUES (?, ?, ?, NOW(), "0")');
        
        $affectedLines = $newComment->execute(array($postId, $author, $comment));
        
        return $affectedLines;
    }

    public function reportComment($commentId) // incrémente les signalements d'un commentaire
    {
        $db = $this->dbConnect();
        $report = $db->prepare('UPDATE comments SET alert = alert+1 WHERE id = ?');
        $report->execute(array($commentId));
        
    }

    public function unReportComment($commentId) // repasse le nbre de signalements à 0
    {
        $db = $this->dbConnect();
        $report = $db->prepare('UPDATE comments SET alert = 0 WHERE id = ?');
        $report->execute(array($commentId));
        
    }

    public function displayReported() // recupère les commentaires et les trie par ordre croissant 
    {
        $db = $this->dbConnect();
        $nbReport = $db->prepare('SELECT * FROM comments WHERE alert > 0 ORDER BY alert DESC');
        $nbReport->execute(array());
        $reportComment = $nbReport->fetchAll();

        return $reportComment;
    }

    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM comments WHERE id = ?');
        $delete->execute(array($commentId));
    }

}
