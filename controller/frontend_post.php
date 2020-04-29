<?php

use Model\Post;
use Model\PostManager;

require_once('model/PostManager.php');

function listPosts()
{
    $postManager = new model; // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    return $posts;

    require('view/index.html.php');
}