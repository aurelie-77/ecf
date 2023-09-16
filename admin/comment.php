<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/comment.php";
require_once __DIR__ . "/templates/header.php";

//pagination des annonces
if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
  } else {
    $page = 1;
  }

  $comments = getComments($pdo);
  $totalComments = getTotalComments($pdo);
 //ceil permet de faire un arrondi superieur 
  $totalPages = ceil($totalComments / _ADMIN_ITEM_PER_PAGE_);
  
  ?>



<h1 class="display-5 fw-bold text-body-emphasis">Commentaires</h1>
<div class="d-flex gap-2 justify-content-left py-5">
    <a class="btn btn-primary d-inline-flex align-items-left" href="ajout_modif_comment.php">
        Ajouter un commentaire
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment) { ?>
        <tr>
            <th scope="row"><?= $comment["id"]; ?></th>
            <td><?= $comment["name_Client"]; ?></td>
            <td><?= $comment["content"]; ?></td>
            <td><a href="ajout_modif_comment.php?id=<?= $comment['id'] ?>">Modifier</a>
                | <a href="comment_delete.php?id=<?= $comment['id'] ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer le commentaire ?')">Supprimer</a></td>
        </tr>
        <?php } ?>
    </tbody>

</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if ($totalPages > 1) { ?>
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
        <li class="page-item">
            <a class="page-link <?php if ($i == $page) { echo " active";} ?>" href="?page=<?php echo $i; ?>">
                <?php echo $i; ?>
            </a>
        </li>
        <?php } ?>
        <?php } ?>
    </ul>
</nav>

<?php require_once __DIR__ . "/templates/footer.php"; ?>





<?php require_once __DIR__ . "/templates/footer.php"; ?>