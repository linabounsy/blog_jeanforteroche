<?php

namespace Model;

require_once ('model/Database.php');

class PostManager extends Database

{
    public function getPosts() // recupere les derniers posts
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content FROM posts ORDER BY id DESC LIMIT 0, 3');
        $posts = $req->fetchAll();
        return $posts;

    }

    public function getPost($postId) // recupere un post grace à l'id
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    } 

}