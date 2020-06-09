<?php

namespace Controller;

use Exception;
use Model\AdminManager;
use Model\PostManager;
use Model\CommentManager;


require_once('model/AdminManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
class FrontendAdmin
{
    public function adminConnexion()
    {


        $adminManager = new AdminManager;
        $postManager = new PostManager;
        $allPosts = $postManager->getAllPosts();

        if (isset($_POST['login']) && ($_POST['password'])) {
            $login = $_POST["login"];
            $password = $_POST["password"];

            if (!empty($login) && !empty($password)) {
                $user = $adminManager->adminConnexion($login);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }

            $checkedpassword = password_verify($password, $user['password']);
            if ($checkedpassword) {

                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['login'] = $user['login']; // pousser la super globale dans la view template pour la connexion + afficher login user une fois connecté
                header('Location: index.php?action=adminconnexion');
                exit();
            } else {
                throw new Exception('Mauvais login ou mot de passe');
            }

        }
        require('view/connexionView.php');
    }

    public function indexAdminView()
    {
        // afficher les articles et les commentaires dans la view admin 

        $postManager = new PostManager;
        $commentManager = new CommentManager;
        $posts = $postManager->getPostsAdmin();
        $allPosts = $postManager->getAllPosts(); // recup tous les posts dans la barre nav
        
        require('view/adminView.php');
    }

    public function displayReported()
    {
        $postManager = new PostManager;
        $commentManager = new CommentManager;
        $allPosts = $postManager->getAllPosts();
        $comments = $commentManager->displayReported();

        require('view/displayReportedView.php');
    }

    public function deletePostAdmin()
    {
        $postManager = new PostManager;
        $deletePost = $postManager->deletePost($_GET['id']);
        header('Location: index.php?action=adminconnexion');
    }

    public function deleteCommentAdmin()
    {
        $commentManager = new CommentManager;
        $deleteComment = $commentManager->deleteComment($_GET['id']);
        header('Location: index.php?action=adminconnexion');
    }

    public function deconnexion()
    {
        session_destroy();
        header('Location: index.php');
    }

    public function addPost($title, $content)
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $postManager = new PostManager;
            $affectedLines = $postManager->addPost($title, $content);
        } else {
            throw new Exception('Tous les champs ne sont pas remplis');
        }
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter l\'article');
        } else {
            header('Location: index.php?action=adminconnexion');
        }
    }

    public function addNewPost() // renvoie vers la page de redaction de l'article
    {
        $postManager = new PostManager;
        $allPosts = $postManager->getAllPosts();
        require('view/newPostView.php');
    }

    public function editPost($postId, $title, $content)
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {

            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $postManager = new PostManager;
                $postManager->modifyPost($postId, $title, $content);
            
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
                
            }
        }
        header('Location: index.php?action=adminconnexion');
    }


    public function modifyPost()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
        $postManager = new PostManager;
        $post = $postManager->getPost($_GET['id']);
    
        }
        else {
            // Autre exception
            throw new Exception('aucun identifiant d\'article envoyé');
        }
        require('view/editPostView.php');
    }

    

}
