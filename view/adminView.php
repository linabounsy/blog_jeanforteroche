<?php ob_start(); ?>

<section class="engine"><a href="https://mobirise.info/f">simple web creator</a></section>
<section class="mbr-section content5 cid-rXt9qQytno mbr-parallax-background" id="content5-i">





    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                    Bienvenue Admin</h2>


            </div>
        </div>
    </div>
</section>

<a href="index.php?action=addnewpost"><input type="button" value="ajouter un article"></a>

<div class="containeradmin">


    <?php

    foreach ($posts as $post) {
    ?>

        <div class="card p-3 col-12 col-md-6 col-lg-4">
            <div class="card-wrapper">
                <div class="card-img">
                    <img src="assets/images/mbr-676x380.jpg" alt="Mobirise" title="">
                </div>
                <div class="card-box">
                    <h4 class="card-title mbr-fonts-style display-7"><?= htmlspecialchars($post['title']) ?>
                        <div><br></div>
                    </h4>
                    <p class="mbr-text mbr-fonts-style display-7">
                        <?= $post['content'] ?></p>
                </div>
                <a href="index.php?action=post&id=<?= $post['id'] ?>"><input type="button" value="voir l'article"></a>
                <a href="index.php?action=modifypost&id=<?= $post['id'] ?>"><input type="button" value="modifier l'article"></a>
                <a href="index.php?action=delete&id=<?= $post['id'] ?>" onclick="return window.confirm('Etes vous sûr de vouloir supprimer cet article ?')"><input type="button" value="supprimer l'article"></a>
            </div>
        </div>




    <?php
    }
    ?>
</div>

<div id="reportcomments">
    <h3>Commentaires signalés</h3>

    <?php
    foreach ($comments as $comment) { // car on a appelé displayReported dans $comments au niveau du controller 

    ?>

      <div class="card p-3 col-12 col-md-6 col-lg-4">
            <div class="card-wrapper">
             
                <div class="card-box">
                    <p>Auteur : <?= htmlspecialchars($comment['author']) ?><br />
                    Commentaire : <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                    <a href="index.php?action=delete&id=<?= $comment['id'] ?>" onclick="return window.confirm('Etes vous sûr de vouloir supprimer ce commentaire ?')"><input type="button" value="supprimer ce commentaire"></a>
                </div>
        
            </div>
        </div>

    <?php
    }
    ?>
</div>

<div id="deconnexion">
    <a href="index.php?action=deconnexion"><input type="submit" value="deconnexion"></a>
</div>


<?php $content = ob_get_clean(); ?>

<?php
require('view/templateFront.php');
?>