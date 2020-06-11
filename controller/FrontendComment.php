<?php

namespace Controller;

use Exception;
use Model\CommentManager;
use Model\PostManager;


require_once ('model/CommentManager.php');
require_once ('model/PostManager.php');

class FrontendComment

{
    public function addComment($postId) // ajouter un commentaire
    {
        $commentManager = new CommentManager; //on instancie la classe CommentManager
        if (isset($_GET['id']) && $_GET['id'] > 0) { // on verifie qu'il y a un id '
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $affectedLines = $commentManager->postComment($_GET['id'], $_POST['author'], $_POST['comment']); // on appelle la méthode postComment et ses paramètres
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

    public function reportComment($commentId) // signaler un commentaire
    {
        if (isset($_GET['id']) && $_GET['id']> 0) {
            $commentId = $_GET['id'];
            $commentManager = new CommentManager;
            $postId = $commentManager->getComment($commentId); // recupère le tableau avec le commentaire en question
            $post = $postId['post_id']; // recupère l'id du post 
            $commentManager->reportComment($commentId);
         
            
        }
        header('Location: index.php?action=post&id=' .$post);
    
    }

    public function confirmUnreportComment($commentId)
    {
        if (isset($_GET['id']) && $_GET['id']> 0) {
            $commentId = $_GET['id'];
            $commentManager = new CommentManager;
            $postId = $commentManager->getComment($commentId); // recupère le tableau avec le commentaire en question
            $post = $postId['post_id']; // recupère l'id du post 
            $commentManager->unreportComment($commentId);
         
        }
        header('Location: index.php?action=adminconnexion');
    
    }

}
      

        
        

