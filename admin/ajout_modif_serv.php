<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/users.php";
require_once __DIR__ . "/../lib/tools.php";
require_once __DIR__ . "/../lib/service.php";


require_once __DIR__ . "/templates/header.php";

$errors = [];
$messages = [];
$service = [
    'name' =>'',
    'price'=>'',
    'text' =>'',
];

if (isset($_POST['id'])) {

    $service = getServiceById($pdo, $_POST["id"]);
    if ($service === false) {
        $errors[] = 'Service introuvable';
    } 
    $pageTitle = "Formulaire modification d'un service"; 
    }else {
        $pageTitle = "Formulaire ajout d'un service";
    }
    

if (isset($_POST['saveService'])) {

    $service = [
        'name' => $_POST["name"],
        'price'=> $_POST["price"],
        'text' => $_POST["text"], 
    ];
    // Si il n'y a pas d'erreur on peut faire la sauvegarde
    if(!$errors) {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];
        } else {
            $id = null;
        }
        // On passe toutes les données à la fonction saveService
        $res = saveService($pdo, $_POST["name"], $_POST["price"], $_POST["text"], $id);
        if($res) {
            $messages[] = 'Service enregistré';
            
            if (!isset($_GET["id"])) {
                $service = [
                    'name' =>'',
                    'price'=>'',
                    'text' =>'',
                ]; 
    } else {
            $errors[] = 'Une erreur s\'est produite';
        }
    }
}
}


?>

<h1><?= $pageTitle; ?></h1>
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
<?php if ($service !== false) { ?>

<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="" class="form-label">Nom du service</label>
            <input type="text" class="form-control" name="name" value="<?= $service['name']; ?>">
        </div>
        <div class=" mb-3">
            <label for="" class="form-label">Prix</label>
            <input type=" text" class="form-control" name="price" value="<?= $service['price']; ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input type="text" class="form-control" name="text" value="<?= $service['text']; ?>">
        </div>

        <button type="submit" name="saveService" class="btn btn-primary" value="Enregistrer">Enregistrer</button>
        <a href="services.php">Retour</a>
    </form>
</body>
<?php }?>