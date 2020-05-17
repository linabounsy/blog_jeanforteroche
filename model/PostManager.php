<?php

namespace Model;

require_once ('model/Database.php');

class PostManager extends Database

{
   /* public function getAllPosts() // recupere TOUS les posts
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title FROM posts ORDER BY id DESC LIMIT 0, 20');
        $allPosts = $req->fetchAll();
        return $allPosts;

    } */

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

    public function getPostsAdmin() // recupere les posts vue admin
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content FROM posts ORDER BY id DESC LIMIT 0, 15');
        $posts = $req->fetchAll();
        return $posts;

    }

    public function deletePost($postId) // supprime un post 
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM `posts` WHERE id = ?');
        $delete->execute(array($postId));

    }
}