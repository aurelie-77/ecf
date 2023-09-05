<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";


require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/annonce.php";
require_once __DIR__ . "/templates/header.php";

//pagination des annonces
if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
  } else {
    $page = 1;
  }
  $annonces = getAnnonces($pdo, _ADMIN_ITEM_PER_PAGE_, $page);
  
  $totalAnnonces = getTotalAnnonces($pdo);
 //ceil permet de faire un arrondi superieur 
  $totalPages = ceil($totalAnnonces / _ADMIN_ITEM_PER_PAGE_);
  
  ?>



<h1 class="display-5 fw-bold text-body-emphasis">Annonces</h1>
<div class="d-flex gap-2 justify-content-left py-5">
    <a class="btn btn-primary d-inline-flex align-items-left" href="ajout_modif_ann.php">
        Ajouter une annonce
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
        <?php foreach ($annonces as $annonce) { ?>
        <tr>
            <th scope="row"><?= $annonce["id"]; ?></th>
            <td><?= $annonce["title"]; ?></td>
            <td><?= $annonce["content"]; ?></td>
            <td><a href="ajout_modif_ann.php?id=<?= $annonce['id'] ?>">Modifier</a>
                | <a href="annonce_delete.php?id=<?= $annonce['id'] ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">Supprimer</a></td>
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