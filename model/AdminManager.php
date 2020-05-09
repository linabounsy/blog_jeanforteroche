<?php

namespace Model;

require_once ('model/Database.php');

class AdminManager extends Database
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
