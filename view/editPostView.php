<?php ob_start(); ?>



<script src="https://cdn.tiny.cloud/1/6bohqh7pqbv8wpu4q6e2l466rt3paa5rbh88c15p6zrbbds6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<script>
    tinymce.init({
        selector: '#mytextarea',
        forced_root_block: "",
        entity_encoding: "raw"

    });
</script>


<div><a href="index.php?action=indexadmin&indexadmin.php" class="btn btn-primary btn-md">Revenir à la page précédente

    </a>
</div>
<div id="form">

    <form action="index.php?action=editpost&id=<?= $post['id'] ?>" method="post" enctype="multipart/form-data" id="modifypost">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" />

        <textarea id="mytextarea" name="content"> <?= htmlspecialchars($post['content']) ?></textarea>


        <br />




    </form>
</div>

<div id="form_delete">
    <form action="index.php?action=deleteimg&id=<?= $post['id'] ?>" method="post" id="deleteimg"></form>
</div>


<div>
    <input form="modifypost" type="file" class="input-button" name="changeimg">
    <input form="deleteimg" type="submit" value="supprimer l'image" class="input-button-form" onclick="return window.confirm('Etes vous sûr de vouloir supprimer cette image ?')">
    <br />
    <img src="public/img/uploaded/<?= $post["img"] ?>" class="card-img-top" alt=""><br />
    <input form="modifypost" type="submit" class="input-button-form" />
</div>


<?php $content = ob_get_clean(); ?>

<?php
require('view/templateFront.php');
?>