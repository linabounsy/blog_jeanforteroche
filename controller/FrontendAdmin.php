<?php

namespace Controller;

use Exception;
use Model\AdminManager;

require_once('model/AdminManager.php');

class FrontendAdmin
{
    public function adminConnexion()
    {


        $adminManager = new AdminManager;
        if (isset($_POST['login']) && ($_POST['password'])) {
            $login = $_POST["login"];
            $password = $_POST["password"];

            if (!empty($login) && !empty($password)) {
                $user = $adminManager->adminConnexion($login);
                
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }

            $checkedpassword = password_verify($password, $user['password']);
            if ($checkedpassword) {

                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['login'] = $user['login']; // pousser la super globale dans la view template pour la connexion + afficher login user une fois connecté
                header('Location: index.php');
            } else {
                throw new Exception('Mauvais login ou mot de passe');
            }
        }

        require('view/connexionView.php');
    
    }

        
}