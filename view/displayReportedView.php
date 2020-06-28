<?php ob_start(); ?>



<a href="index.php?action=indexadmin&indexadmin.php" class="btn btn-primary btn-md">Revenir à la page précédente

</a>
<h2>Commentaires signalés</h2>

<table class="table table-hover table-bordered">


  <thead>
    <tr>
      <th scope="col">Nbre signalements</th>
      <th scope="col">Auteur</th>
      <th scope="col">Commentaire</th>

      <th scope="col">Désignaler</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($comments as $comment) { // car on a appelé displayReported dans $comments au niveau du controller 

    ?>
      <tr>
        <th scope="row"><?= htmlspecialchars($comment['alert']) ?></th>
        <td><?= htmlspecialchars($comment['author']) ?></td>
        <td><span class="comments"><?= nl2br(htmlspecialchars($comment['comment'])) ?></span></td>

        <td><a href="index.php?action=unreportcomment&id=<?= $comment['id'] ?>" onclick="return window.confirm('Etes vous sûr de vouloir désignaler ce commentaire ?')" class="btn btn-warning btn-sm">oui</a></td>
        <td><a href="index.php?action=delete&id=<?= $comment['id'] ?>" onclick="return window.confirm('Etes vous sûr de vouloir supprimer ce commentaire ?')" class="btn btn-danger btn-sm">oui</a></td>
      </tr>

    <?php } ?>
  </tbody>

</table>




<?php $content = ob_get_clean(); ?>

<?php
require('view/templateFront.php');
?>