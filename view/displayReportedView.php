<?php ob_start(); ?>

<!--Main layout-->
<main class="mt-5 pt-5">

<a href="index.php?action=adminconnexion&adminview.php" class="btn btn-primary btn-md">Revenir à la page précédente

      </a>
<table class="table table-hover table-bordered">
        <h2>Commentaires signalés</h>

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
                <td><a href="index.php?action=unreportcomment&id=<?= $comment['id'] ?>" onclick="return window.confirm('Etes vous sûr de vouloir désignaler ce commentaire ?')" class="btn btn-success btn-sm">oui</td>
                <td><a href="index.php?action=delete&id=<?= $comment['id'] ?>" onclick="return window.confirm('Etes vous sûr de vouloir supprimer ce commentaire ?')" class="btn btn-success btn-sm">oui</td>
              </tr>

            <?php } ?>
          </tbody>
      </table>




  <?php $content = ob_get_clean(); ?>

  <?php
  require('view/templateFront.php');
  ?>