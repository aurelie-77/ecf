<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/service.php";
require_once __DIR__ . "/templates/header.php";

$services = getServices($pdo);
?>

<h1 class="display-5 fw-bold text-body-emphasis">Services</h1>
<div class="d-flex gap-2 justify-content-left py-5">
    <a class="btn btn-primary d-inline-flex align-items-left" href="ajout_modif_serv.php">
        Ajouter un service
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Service</th>
            <th scope="col">Prix</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($services as $service) { ?>
        <tr>
            <th scope="row"><?= $service["id"]; ?></th>
            <td><?= $service["name"]; ?></td>
            <td><?= $service["price"]; ?></td>
            <td><?= $service["text"]; ?></td>
            <td><a href="ajout_modif_serv.php?id=<?= $service['id'] ?>">Modifier</a>
                <a href="service_delete.php?id=<?= $service['id'] ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer le service ?')">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>