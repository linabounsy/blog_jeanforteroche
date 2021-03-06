<?php

namespace Controller;

use Model\PostManager;
use Model\CommentManager;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class FrontendPost

{


    public function listPosts()
    {
        $postManager = new PostManager(); // Création d'un objet
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
        $allPosts = $postManager->getAllPosts();
        $pageTitle = "accueil";

        require('view/HomePageView.php');
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = $postManager->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
            $allPosts = $postManager->getAllPosts();
            if (empty($post)) {
                throw new \Exception('Aucun identifiant de billet envoyé');
            }
        } else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }
        $pageTitle = "$post[title]";

        require('view/postView.php');
    }
}
