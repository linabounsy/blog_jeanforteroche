<?php ob_start(); ?>



<!--Main layout-->
<main class="mt-5 pt-5">

    <div class="container">
        <section id="post">

            <!--Featured Image-->
            
            <div class="card mb-4 wow fadeIn">
            
            <img src="public/img/uploaded/<?=$post['img']?>" class="img-fluid" alt="">

           
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
                                <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                                <a href="index.php?action=reportcomment&id=<?= $comment['id'] ?>"><input type="button" class="btn btn-sm btn-deep-orange" value="signaler" onclick="return window.confirm('Votre signalement a bien été pris en compte')"></a>
                            
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
                            <label for="author">Auteur</label>
                            <input type="text" id="author" name="author" />
                        </div>


                        <textarea class="form-control" id="quickReplyFormComment" placeholder="votre commentaire" name="comment" rows="5"></textarea>

                        <div class="text-center">
                            <button class="btn btn-info btn-sm" type="submit">Ajouter</button>
                        </div>
                    </form>

                    
                    </div>
                    </div>

                

    <?php $content = ob_get_clean(); ?>

    <?php
    require('view/templateFront.php');
    ?>