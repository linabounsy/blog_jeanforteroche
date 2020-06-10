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
    public function connexion()
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
                $_SESSION['login'] = $user['login'];
                 // pousser la super globale dans la view template pour la connexion + afficher login user une fois connecté
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

    public function showDisplayReported()
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

    public function sendPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_FILES) && !empty($_POST['title']) && !empty($_POST['content'])) {
                $fileTemporyName = $_FILES['img'] ['tmp_name']; //nom du fichier temporaire
                $fileName = $_FILES['img'] ['name']; // on veut le nom du fichier

                $temp = explode(".", $fileName); // isoler le "." et le nom du fichier
                $newName = round(microtime(true)) . '.' . end($temp); // renommer le fichier de manière aléatoire
                $fileDest = 'img/uploaded/' .$fileName; // dossier final pour l'image
                $fileExtension = strrchr($newName, "."); // isole le nouveau nom de l'image de l'extension
                $extensionAllowed = array('.jpg', '.JPG', '.jpeg', '.JPEG', '.png', '.PNG'); // extension autorisée

                $maxSize = 2000000;
                $size = ($_FILES['img']['size']);

            } else {
                throw new Exception('Tous les champs ne sont pas remplis');
            }

            if (in_array($fileExtension, $extensionAllowed) && $size < $maxSize && $size !== 0) { //separer l'extension et le format + max taille
                $movePath = move_uploaded_file( $fileTemporyName, $fileDest); // deplacer dossier temporaire vers dossier final
                if ($movePath) {
                    $postManager = new PostManager;
                    $affectedLines = $postManager->addPost($_POST['title'], $_POST['content'], $_FILES['img']['name']);

                    header('Location: index.php?action=adminconnexion');
                } else {
                    throw new Exception('Image trop lourde ou format non conforme');
                    
                }
            } else {
                throw new Exception('vous n\'avez pas chargé d\'image');
            }

        
        } else {
            throw new Exception('Tous les champs ne sont pas remplis');
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
