<?php ob_start(); ?>



<!--Main Navigation-->

<!--Main layout-->
<main class="mt-5 pt-5">
<div class="container">

  <!--Section: Jumbotron-->
  <section class="card wow fadeIn" style="background-image: url(public/img/mbr-1920x1280.jpg);">

    <!-- Content -->
    <div class="card-body text-white text-center py-5 px-5 my-5">

      <h1 class="mb-4">
        <strong>Billet simple pour l'Alaska</strong>
      </h1>
      <p>
        <strong>Lorem ipsum dolor sit amet, eros pulvinar mi massa. </strong>
      </p>
      <p class="mb-4">
        <strong>Lorem ipsum dolor sit amet, eros pulvinar mi massa. Placerat fermentum, leo dolor qui faucibus wisi, curabitur vitae. Pellentesque nec cras ac at ultricies, nam sed nunc neque ligula ligula amet, viverra enim quis praesent, sed natoque quam diam, scelerisque orci aliquam volutpat molestie ac bibendum. Nunc nec, deserunt nullam sollicitudin at ligula</strong>
      </p>

    </div>
    <!-- Content -->
  </section>
  <!--Section: Jumbotron-->

  <hr class="my-5">

  <!--Section: Cards-->
  <section class="text-center">

    <!--Grid row-->
    <div class="row mb-4 wow fadeIn">

      <?php foreach ($posts as $post) { ?>
 
      <!--Grid column-->
      <div class="col-lg-4 col-md-6 mb-4">
      
        <!--Card-->
        <div class="card">

          <!--Card image-->
          <div id="containimg" class="view overlay">
          <img src="public/img/uploaded/<?=$post["img"]?>" class="card-img-top"
              alt="">
            <a href="#" target="_blank">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <!--Card content-->
          <div class="card-body">
            <!--Title-->
            <h4 class="card-title"><?= htmlspecialchars($post['title']) ?></h4>
            <!--Text-->
            <p class="card-text"><?= $post['content_cut'] ?></p>
            <a href="index.php?action=post&id=<?= $post['id'] ?>"
              class="btn btn-primary btn-md">Lire Plus
              <i class="fas fa-play ml-2"></i>
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

</div>
    </section>

<?php $content = ob_get_clean(); ?>

<?php
require ('view/templateFront.php');
?>