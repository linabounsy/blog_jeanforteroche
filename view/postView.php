<?php ob_start(); ?>


<section class="engine"><a href="https://mobirise.info/f">simple web creator</a></section>
<section class="mbr-section content5 cid-rXt9qQytno mbr-parallax-background" id="content5-i">





    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                    <?= htmlspecialchars($post['title']) ?>&nbsp;</h2>



            </div>
        </div>
    </div>
</section>

<section class="mbr-section content4 cid-rXtbrrz3Eq" id="content4-w">



    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2">

                </h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-7"><?= $post['content'] ?></h3>

            </div>
        </div>
    </div>
</section>

<section id="comments">

    <div id="allcomment">

        <h2>commentaires</h2>

        <?php foreach ($comments as $comment) { ?>
            <div class="comment">


                <?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?>
                <div><br></div>

                <p>
                    <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                    <a href="index.php?action=reportcomment&id=<?= $comment['id'] ?>"><input type="button" value="signaler" onclick="return window.confirm('Votre signalement a bien été pris en compte')"></a>
                </p>

            </div>
        <?php } ?>

        <h2>ajouter un commentaire</h2>
        <form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="author">Auteur</label><br/>
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br/>
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit">
                
            </div>

        
        </form>
    </div>

    

</section>
<?php $content = ob_get_clean(); ?>

<?php
require('view/templateFront.php');
?>