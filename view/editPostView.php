<?php ob_start(); ?>



<script src="https://cdn.tiny.cloud/1/6bohqh7pqbv8wpu4q6e2l466rt3paa5rbh88c15p6zrbbds6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<script>
    tinymce.init({
        selector: '#mytextarea',
        forced_root_block:""

    });
</script>

<div>
    <form action="index.php?action=editpost&id=<?= $post['id'] ?>" method="post">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" />

        <textarea id="mytextarea" name="content"> <?= htmlspecialchars($post['content']) ?></textarea>

        <input type="submit" value="modifier" />
    </form>
</div>


<?php $content = ob_get_clean(); ?>

<?php
require('view/templateFront.php');
?>