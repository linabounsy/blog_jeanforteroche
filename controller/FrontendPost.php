<?php

namespace Controller;

use Model\PostManager;
use Model\CommentManager;

require_once ('model/PostManager.php');
require_once ('model/CommentManager.php');

class FrontendPost 

{
    public function listPosts()
    {
        $postManager = new PostManager(); // Création d'un objet
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    
    
        require ('view/HomePageView.php');
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
        }
        else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }

        require ('view/postView.php');
   
    }

}
