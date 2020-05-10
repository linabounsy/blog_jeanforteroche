<?php ob_start(); ?>

 <?php echo 'allooo' ?>


<?php $content = ob_get_clean(); ?>

<?php
require ('view/templateFront.php');
?>