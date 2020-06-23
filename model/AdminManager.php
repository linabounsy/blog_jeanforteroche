<?php

namespace Model;

require_once('model/database.php');

class AdminManager extends database
{
    public function adminConnexion($login) // se connecter à la base
    {
        $db = $this->dbConnect();
        $connexion = $db->prepare('SELECT * FROM user WHERE login = ?');
        $connexion->execute(array($login));
        $user = $connexion->fetch();
    
        return $user;
        
    }

  
}