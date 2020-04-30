<?php ob_start(); ?>


<section class="engine"><a href="https://mobirise.info/f">simple web creator</a></section><section class="mbr-section content5 cid-rXt9qQytno mbr-parallax-background" id="content5-i">

    

    

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
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-7"><?= nl2br(htmlspecialchars($post['content'])) ?></h3>
                
            </div>
        </div>
    </div>
</section>


<?php $content = ob_get_clean(); ?>

<?php
require ('view/templateFront.php')
?>
