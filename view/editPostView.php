<?php ob_start(); ?>



<script src="https://cdn.tiny.cloud/1/6bohqh7pqbv8wpu4q6e2l466rt3paa5rbh88c15p6zrbbds6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<script>
    tinymce.init({
        selector: '#mytextarea',
        forced_root_block:"",
        entity_encoding : "raw"

    });
</script>

<!--Main layout-->
<main class="mt-5 pt-5">

<a href="index.php?action=adminconnexion&adminview.php" class="btn btn-primary btn-md">Revenir à la page précédente

      </a>
<div>
    <form action="index.php?action=editpost&id=<?= $post['id'] ?>" method="post">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" />

        <textarea id="mytextarea" name="content"> <?= htmlspecialchars($post['content']) ?></textarea>

        <input type="submit" value="modifier" class="btn btn-light" />
    </form>
</div>




<?php $content = ob_get_clean(); ?>

<?php
require('view/templateFront.php');
?>