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
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $affectedLines = $commentManager->postComment($postId, $author, $comment);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
            if ($affectedLines === false) { // on teste la requete - doit retourner le nombre de lignes impactées, sinon fase si y a une erreur 
                throw new Exception('Impossible d\'ajouter le commentaire');
            }
            else {
                header('Location: index.php?action=post&id=' . $postId);
            }
                
        }
        require ('view/postView.php');
    }
}
      

        
        

