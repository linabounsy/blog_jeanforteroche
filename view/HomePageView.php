<?php ob_start(); ?>

<section class="engine"><a href="https://mobirise.info/w">free html5 templates</a></section>
<section class="cid-qTkA127IK8 mbr-fullscreen mbr-parallax-background" id="header2-1">



    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                    Billet simple pour l'Alaska</h1>

                <p class="mbr-text pb-3 mbr-fonts-style display-5">
                    Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
                </p>
               
            </div>
        </div>
    </div>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>

<section class="features3 cid-rXt1IF1jbg" id="features3-e">


    <div class="container">
        <div class="media-container-row">
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
                        <div class="mbr-section-btn text-center"><a href="index.php?action=post&id=<?= $post['id'] ?>" class="btn btn-secondary-outline display-4">
                                Lire Plus</a></div>
                    </div>
                </div>




            <?php
            }
            ?>
        </div>
    </div>


</section>


<?php $content = ob_get_clean(); ?>

<?php
require ('view/templateFront.php');
?>