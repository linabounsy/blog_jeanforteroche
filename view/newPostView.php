<?php ob_start(); ?>

  
<script src="https://cdn.tiny.cloud/1/6bohqh7pqbv8wpu4q6e2l466rt3paa5rbh88c15p6zrbbds6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<script>
    tinymce.init({
        selector: '#mytextarea',
        forced_root_block:""

    });
</script>


<a href="index.php?action=indexadmin&indexadmin.php" class="btn btn-primary btn-md">Revenir à la page précédente

</a>



<div>
    <form action="index.php?action=sendpost" method="post" enctype="multipart/form-data">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" />
        

        <textarea id="mytextarea" name="content"></textarea>
        <br />
        <input type="file" name="img"><br />
   
        <br />
        <input type="submit" class="btn btn-light">
    </form>
</div>




<?php $content = ob_get_clean(); ?>

<?php
require('view/templateFront.php');
?>