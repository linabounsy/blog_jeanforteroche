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

<input type="button" value ="ajouter un article">
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
                            <?= nl2br(htmlspecialchars($post['content'])) ?></p>
                    </div>
                    <a href="index.php?action=post&id=<?= $post['id'] ?>"><input type="button" value="voir l'article"></a>
                    <input type="button" value="modifier l'article">
                    <a href="index.php?action=delete&id=<?= $post['id'] ?>" onclick="return window.confirm('Etes vous sûr de vouloir supprimer cet article ?')"><input type="button" value="supprimer l'article"></a>
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