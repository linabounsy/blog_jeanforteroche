<?php

namespace Model;

require_once ('model/Database.php');

class Post extends Database

{
    public function getPosts() // recupere les derniers posts
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content FROM posts');
        return $req;
    }

}