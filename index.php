<?php

use Controller\FrontendPost;

require ('controller/FrontendPost.php');

$postController = new FrontendPost(); // instancier l'objet de la classe FrontendPost

try { // On essaie de faire des choses 
    if (isset($_GET['action'])) { 
        if ($_GET['action'] == 'listPosts') {
            $postController->listPosts(); // on appelle la methode listPosts de la classe FrontendPost
        }
        if ($_GET['action'] == 'post') {
            $postController->post(); // on appelle la methode post de la classe FrontendPost
            }
}
else {
    $postController->listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}