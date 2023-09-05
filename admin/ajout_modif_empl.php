<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/users.php";
require_once __DIR__ . "/../lib/tools.php";
require_once __DIR__ . "/../lib/user.php";

require_once __DIR__ . "/templates/header.php";


$errors = [];
$messages = [];
$user = [
    'email' =>'',
    'password' =>'',
    'first_name' =>'',
    'last_name'=>'',
];

if (isset($_GET['id'])) {
    //requête pour récupérer les données en cas de modification
    $user = getUserById($pdo, $_GET['id']);
    if ($user === false) {
        $errors[] = "L'employé n'existe pas";
    }
    $pageTitle = "Formulaire modification d'un employé";
} else {
    $pageTitle = "Formulaire ajout d'un employé";
}

if (isset($_POST['saveUser'])) {

    $user = [
        'email' => $_POST["email"],
        'password' => $_POST["password"],
        'first_name'=> $_POST["first_name"],
        'last_name'=> $_POST["last_name"],
    ];
    if(!$errors) {
        if (isset($_GET["id"])) {
            // Avec (int) on s'assure que la valeur stockée sera de type int
            $id = (int)$_GET["id"];
        } else {
            $id = null;
        }
    
    
    $res = saveUser($pdo, $_POST["email"], $_POST["password"],$_POST["first_name"], $_POST["last_name"], $id);
    if ($res) {
        $messages[] = 'Employé enregistré';
        
        if (!isset($_GET["id"])) {
            $user = [
                'email' =>'',
                'password' =>'',
                'first_name' =>'',
                'last_name'=>'',
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
<?php if ($user !== false) { ?>

<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="" class="form-label">email</label>
            <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>">
        </div>
        <div class=" mb-3">
            <label for="" class="form-label">mot de passe</label>
            <input type=" text" class="form-control" name="password" value="<?= $user['password']; ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nom</label>
            <input type="text" class="form-control" name="first_name" value="<?= $user['first_name']; ?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Prenom</label>
            <input type="text" class="form-control" name="last_name" value="<?= $user['last_name']; ?>">
        </div>
        <button type="submit" name="saveUser" class="btn btn-primary" value="Enregistrer">Enregistrer</button>
        <a href="employes.php">Retour</a>

    </form>
    <?php } ?>
</body>