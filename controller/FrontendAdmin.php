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


            if ($user) {
                $checkedpassword = password_verify($password, $user['password']);
                if ($checkedpassword) {

                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['login'] = $user['login'];
                    // pousser la super globale dans la view template pour la connexion + afficher login user une fois connecté
                    header('Location: index.php?action=indexadmin');

                    exit();
                } else {
                    throw new Exception('Mauvais login ou mot de passe');
                }

                $_SESSION['id'] = $user['id'];
                $_SESSION['login'] = $user['login'];
                header('Location: index.php?action=indexadmin');

                exit();
            } else {
                throw new Exception('Mauvais login ou mot de passe');
            }
        }
        $pageTitle = "Page connexion";
        require('view/connexionView.php');
    }

    public function indexAdmin()

    {
        // afficher les articles et les commentaires dans la view admin 

        $postManager = new PostManager;
        $commentManager = new CommentManager;
        $posts = $postManager->getPostsAdmin();
        $allPosts = $postManager->getAllPosts(); // recup tous les posts dans la barre nav
        $pageTitle = "Admin";

        require('view/indexAdmin.php');
    }

    public function showDisplayReported()
    {
        $postManager = new PostManager;
        $commentManager = new CommentManager;
        $allPosts = $postManager->getAllPosts();
        $comments = $commentManager->displayReported();
        $pageTitle = "Commentaires signalés";
        require('view/displayReportedView.php');
    }

    public function deletePostAdmin()
    {
        $postManager = new PostManager;
        $deletePost = $postManager->deletePost($_GET['id']);
        header('Location: index.php?action=indexadmin');
    }

    public function deleteCommentAdmin()
    {
        $commentManager = new CommentManager;
        $deleteComment = $commentManager->deleteComment($_GET['id']);
        header('Location: index.php?action=indexadmin');
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
                $fileTemporyName = $_FILES['img']['tmp_name']; //nom du fichier temporaire
                $fileName = $_FILES['img']['name']; // on veut le nom du fichier
                $finalName = uniqid() . $fileName;
                $fileDest = 'public/img/uploaded/' . $finalName; // dossier final pour l'image
                $fileExtension = strrchr($finalName, "."); // isole le nouveau nom de l'image de l'extension
                $extensionAllowed = array('.jpg', '.JPG', '.jpeg', '.JPEG', '.png', '.PNG'); // extension autorisée
                $maxSize = 2000000;
                $size = ($_FILES['img']['size']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis');
            }

            if (in_array($fileExtension, $extensionAllowed) && $size < $maxSize && $size !== 0) { //separer l'extension et le format + max taille

                $movePath = move_uploaded_file($fileTemporyName, $fileDest); // deplacer dossier temporaire vers dossier final

                if ($movePath) {
                    $postManager = new PostManager;
                    $affectedLines = $postManager->addPost($_POST['title'], $_POST['content'], $finalName);

                    header('Location: index.php?action=indexadmin');
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
        $pageTitle = "Ajouter un article";
        require('view/newPostView.php');
    }



    public function deleteImg($postId)
    {
        $postManager = new PostManager;
        $post = $postManager->getPost($_GET['id']);
        if (!unlink("public/img/uploaded/" . $post["img"])) {
            echo 'error';
        } else {
            $postManager->deleteImg($_GET['id']);
            header('Location: index.php?action=modifypost&id=' . $postId);
        }
    }

    public function modifyPost()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $postManager = new PostManager;
            $post = $postManager->getPost($_GET['id']);
            $allPosts = $postManager->getAllPosts();
        } else {
            // Autre exception
            throw new Exception('aucun identifiant d\'article envoyé');
        }
        $pageTitle = "Modifier un article";
        require('view/editPostView.php');
    }

    public function editPost()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {


            if (!empty($_POST['title']) && !empty($_POST['content'])) {

                $currentImgTemp = $_FILES['changeimg']['tmp_name'];
                $currentImg = $_FILES['changeimg']['name'];
                $newName = uniqid() . $currentImg;
                $currentFile = 'public/img/uploaded/' . $newName;


                if ($currentImgTemp != "") { // modifier une image d'un post existant
                    move_uploaded_file($currentImgTemp, $currentFile);
                    $postManager = new PostManager;
                    $newImg = $postManager->modifyPost($_GET['id'], $_POST['title'], $_POST['content'], $newName);
                } else {
                    $postManager = new PostManager;
                    $postManager->modifyPostWithoutImg($_GET['id'], $_POST['title'], $_POST['content']);
                }
            }
            header('Location: index.php?action=indexadmin');
        }
    }
}
