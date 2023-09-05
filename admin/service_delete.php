<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/tools.php";
require_once __DIR__ . "/../lib/service.php";
require_once __DIR__ . "/templates/header.php";

$service = false;
$errors = [];
$messages = [];
if(isset($_GET['id'])) {
    $service = getServiceById($pdo, (int)$_GET['id']);
}
if($service) {
    if(deleteService($pdo, $_GET["id"])) {
        $messages[] = "le service a bien été supprmé";
    } else {
        $errors[] = "une erreur est survenue";
    }
} else {
    $errors[] = "le service n'existe pas";
}
?>
<div class="row text-center my-5">
    <h1>Supression service</h1>
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