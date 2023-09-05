<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__ . "/../lib/pdo.php";

require_once __DIR__ . "/../lib/users.php";

require_once __DIR__ . "/templates/header.php";





$users = getUsers($pdo);



?>

<h1 class="display-5 fw-bold text-body-emphasis">Employés</h1>
<div class="d-flex gap-2 justify-content-left py-5">
    <a class="btn btn-primary d-inline-flex align-items-left" href="ajout_modif_empl.php">
        Ajouter un employé
    </a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Mail</th>
            <th scope="col">Mot de passe</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($users as $user) { ?>
        <tr>
            <th scope="row"><?= $user["id"]; ?></th>
            <td><?= $user["email"]; ?></td>
            <td><?= $user["password"]; ?></td>
            <td><?= $user["first_name"]; ?></td>
            <td><?= $user["last_name"]; ?></td>
            <td><a href="ajout_modif_empl.php?id=<?= $user['id'] ?>">Modifier</a>
                <a href="employe_delete.php?id=<?= $user['id'] ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>