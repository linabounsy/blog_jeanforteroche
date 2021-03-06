<?php ob_start(); ?>


<div class="container">
  <section class="card wow fadeIn" style="background-image: url(public/img/mbr-1920x1280.jpg);">

    <!-- Content -->
    <div class="card-body text-white text-center py-5 px-5 my-5">

      <h1 class="mb-4">
        <strong>Bienvenue Admin</strong>
      </h1>


    </div>
    <!-- Content -->
  </section>

  <section class="text-center">

    <a href="index.php?action=addnewpost" class="btn btn-primary btn-md">Ajouter un article

    </a>

    <a href="index.php?action=reportedcomments" class="btn btn-primary btn-md">Commentaires Signalés

    </a>

    <a href="index.php?action=deconnexion" class="btn btn-primary btn-md">Se déconnecter

    </a>

    <!--Grid row-->
    <div class="row mb-4 wow fadeIn">

      <?php foreach ($posts as $post) { ?>

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card image-->
            <div class="view overlay">

              <img src="public/img/uploaded/<?= $post["img"] ?>" class="card-img-top" alt="">


              <div class="mask rgba-white-slight"></div>

            </div>

            <!--Card content-->
            <div class="card-body">
              <!--Title-->
              <h4 class="card-title"><?= htmlspecialchars($post['title']) ?></h4>
              <!--Text-->
              <p class="card-text"><?= $post['content_cut'] ?></p>
              <a href="index.php?action=post&id=<?= $post['id'] ?>" class="btn btn-primary btn-md">Voir l'article
              </a>
              <a href="index.php?action=modifypost&id=<?= $post['id'] ?>" class="btn btn-primary btn-md">Modifier l'article
              </a>
              <a href="index.php?action=delete&id=<?= $post['id'] ?>" onclick="return window.confirm('Etes vous sûr de vouloir supprimer cet article ?')" class="btn btn-primary btn-md">Supprimer l'article
              </a>
            </div>

          </div>
          <!--/.Card-->
        </div>
      <?php
      }
      ?>
    </div>
    <!--Grid column-->

  </section>
</div>





<?php $content = ob_get_clean(); ?>

<?php
require('view/templateFront.php');
?>