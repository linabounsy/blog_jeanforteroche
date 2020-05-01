<?php

namespace Controller;

use Exception;
use Model\CommentManager;

require_once ('model/CommentManager.php');

class FrontendComment

{
    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager; 
        $affectedLines = $commentManager->postComment($postId, $author, $comment);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }

        require ('view/postView.php');
        
    }
}
