<?php ob_start(); ?>



<section id="connexion">

    <div id="container">

        <form action="index.php?action=connexion" method="post">
            <h2>Connexion</h2>
            <label for="login">Login</label><br />
            <input type="text" placeholder="entrez votre login" name="login" required><br />
            <label for="password">Mot de passe</label><br />
            <input type="password" placeholder="entrez votre mot de passe" name="password" required>
            <br /><br />
            <input type="submit">
            <br /><br />
            
        </form>
    </div>

    

</section>
<?php $content = ob_get_clean(); ?>

<?php
require('view/templateFront.php');
?>