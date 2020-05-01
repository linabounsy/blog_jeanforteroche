<?php

use Controller\FrontendComment;
use Controller\FrontendPost;


require ('controller/FrontendPost.php');
require ('controller/FrontendComment.php');

$postController = new FrontendPost(); // instancier l'objet de la classe FrontendPost
$commentController = new FrontendComment();

try { // On essaie de faire des choses 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $postController->listPosts(); // on appelle la methode listPosts de la classe FrontendPost
        }
        if ($_GET['action'] == 'post') {
            $postController->post(); // on appelle la methode post de la classe FrontendPo
        }
        if ($_GET['action'] == "addComment") {
            $commentController->addComment($postId, $author, $comment);
        }
 

}else {
    $postController->listPosts();
}
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
