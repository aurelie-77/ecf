<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/tools.php";
require_once __DIR__ . "/../lib/annonce.php";
require_once __DIR__ . "/template/header2.php";

$annonce = false;
$errors = [];
$messages = [];

if (isset($_GET["id"])) {
    $annonce =  getAnnonceById($pdo, (int)$_GET["id"]);
}
if ($annonce) {
    if (deleteAnnonce($pdo, $_GET["id"])) {
        $messages[] = "L'annonce a bien été supprimée";
    } else {
        $errors[] = "Une erreur s'est produite lors de la suppression";
    }
} else {
    $errors[] = "L'annonce n'existe pas";
}


?>

<div class="row text-center my-5">
    <h1>Supression annonce</h1>
    <?php foreach ($messages as $message) { ?>
    <div class="alert alert-success" role="alert">
        <?= $message; ?>
    </div>
    <?php } ?>
    <?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
    <?php } ?>
</div>
<a href="annonces.php">Retour</a>
<?php
require_once __DIR__ ."/template/footer.php";