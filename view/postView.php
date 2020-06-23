<?php ob_start(); ?>



<div class="container">
    <section>

        <!--Featured Image-->

        <div id="containerimgpost" class="card mb-4 wow fadeIn">

            <img src="public/img/uploaded/<?= $post['img'] ?>" class="img-fluid" alt="">


        </div>
        <!--/.Featured Image-->


        <!--Card-->
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body">

                <p class="h5 my-4"><?= htmlspecialchars($post['title']) ?></p>

                <p><?= $post['content'] ?></p>

            </div>

        </div>

        <!--/.Card-->

    </section>
    <section id="comments">

        <!--Comments-->
        <div class="card card-comments mb-3 wow fadeIn">
            <div class="card-header font-weight-bold">Commentaires</div>
            <div class="card-body">
                <?php foreach ($comments as $comment) { ?>


                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                        <h5 class="mt-0 font-weight-bold"><?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?>
                        </h5>
                        <?= nl2br(htmlspecialchars($comment['comment'])) ?><br />
                        <a href="index.php?action=reportcomment&id=<?= $comment['id'] ?>" class="report" onclick="return window.confirm('Votre commentaire a bien été signalé')">Signaler</a>

                    </div>
                <?php } ?>

            </div>

        </div>

        <!--/.Comments-->

        <div class="card card-comments mb-3 wow fadeIn">
            <div class="card-header font-weight-bold">Ajouter un commentaire</div>
            <div class="card-body">
                <form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
                    <div>

                        <input type="text" class="form-control" id="author" placeholder="auteur" name="author" /><br />
                    </div>

                    <br />
                    <textarea class="form-control" id="quickReplyFormComment" placeholder="votre commentaire" name="comment" rows="5"></textarea>

                    <div class="text-center">
                        <button class="btn btn-info btn-sm" type="submit">Ajouter</button>
                    </div>
                </form>


            </div>
        </div>
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php
require('view/templateFront.php');
?>