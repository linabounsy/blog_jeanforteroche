<?php
session_start();
?>

<?php

use Controller\FrontendComment;
use Controller\FrontendPost;
use Controller\FrontendAdmin;

require('controller/FrontendPost.php');
require('controller/FrontendComment.php');
require('controller/FrontendAdmin.php');

$postController = new FrontendPost(); // instancier l'objet de la classe FrontendPost
$commentController = new FrontendComment();
$connexionController = new FrontendAdmin();

try { // On essaie de faire des choses 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $postController->listPosts(); // on appelle la methode listPosts de la classe FrontendPost
        }
        if ($_GET['action'] == 'post') {
            $postController->post(); // on appelle la methode post de la classe FrontendPost
        }
        if ($_GET['action'] == 'addComment') {
            $commentController->addComment($_GET['id']); //get  l'id et recupere en post l'auteur et le commentaire
        }
        if ($_GET['action'] == 'connexion') {
            $connexionController->adminConnexion();
        }
        if ($_GET['action'] == 'indexadmin' && $_SESSION) {
            $connexionController->indexAdmin();
        }
        if ($_GET['action'] == 'indexadmin' && $_SESSION['id'] == 0) {
            $postController->listPosts();
        }
        if ($_GET['action'] == 'deconnexion') {
            $connexionController->deconnexion();
        }
        if ($_GET['action'] == 'delete') {
            $connexionController->deletePostAdmin();
        }
        if ($_GET['action'] == 'reportcomment') {
            $commentController->reportComment($_GET['id']);
        }
        if ($_GET['action'] == 'unreportcomment') {
            $commentController->confirmUnreportComment($_GET['id']);
        }
        if ($_GET['action'] == 'reportedcomments') {
            $connexionController->showDisplayReported();
        }
        if ($_GET['action'] == 'delete') {
            $connexionController->deleteCommentAdmin();
        }
        if ($_GET['action'] == 'addnewpost') {
            $connexionController->addNewPost();
        }
        if ($_GET['action'] == 'sendpost') {
            $connexionController->sendPost();
        }
        if ($_GET['action'] == 'modifypost') {
            $connexionController->modifyPost();
        }
        if ($_GET['action'] == 'editpost') {
            $connexionController->editPost();
        }
        if ($_GET['action'] == 'deleteimg') {
            $connexionController->deleteImg($_GET['id']);
        }
    } else {
        $postController->listPosts();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
