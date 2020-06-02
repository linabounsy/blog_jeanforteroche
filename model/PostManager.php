<?php

namespace Model;

require_once ('model/Database.php');

class PostManager extends Database

{
    public function getAllPosts() // recupere TOUS les posts
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content FROM posts ORDER BY id DESC');;
        $allPosts = $req->fetchAll();
        return $allPosts;

    } 

    public function getPosts() // recupere les derniers posts
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, IF(CHAR_LENGTH(content) > 100, CONCAT(LEFT(content,100), "..."), content) AS content_cut FROM posts ORDER BY id DESC LIMIT 0, 3');
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
        $req = $db->query('SELECT id, title, IF(CHAR_LENGTH(content) > 100, CONCAT(LEFT(content,100), "..."), content) AS content_cut FROM posts ORDER BY id DESC');
        $posts = $req->fetchAll();
        return $posts;

    }

    public function deletePost($postId) // supprime un post 
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM posts WHERE id = ?');
        $delete->execute(array($postId));

    }

    public function addPost($title, $content)
    {
        $db = $this->dbconnect();
        $newPost = $db->prepare('INSERT INTO posts (title, content, creation_date) VALUES (?, ?, NOW())');
        $affectedLines = $newPost->execute(array($title, $content));

        return $affectedLines;
    }

    public function modifyPost($postId, $title, $content)

    {
        $db = $this->dbconnect();
        $editPost = $db->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :postId");
        $editPost->execute(array('postId' =>$postId, 'title'=>$title, 'content'=>$content));
    }
  

}