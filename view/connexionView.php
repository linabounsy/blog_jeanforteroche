<?php ob_start(); ?>


<section id="connexion">

    <div id="container">

        <form class="text-center border border-light p-5" action="index.php?action=connexion" method="post">
            <p class="h4 mb-4">Se connecter</p>

            <input type="text" class="form-control mb-4" placeholder="Login" name="login" required>
            <input type="password" class="form-control mb-4" placeholder="Mot de passe" name="password" required>
            <br /><br />

            <input class="btn btn-info btn-block my-4" type="submit" value="se connecter">
            <br /><br />

        </form>
    </div>



</section>
<?php $content = ob_get_clean(); ?>

<?php
require('view/templateFront.php');
?>