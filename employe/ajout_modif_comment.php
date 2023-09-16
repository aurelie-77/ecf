<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";


require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/users.php";
require_once __DIR__ . "/../lib/tools.php";
require_once __DIR__ . "/../lib/comment.php";

require_once __DIR__ ."/template/header2.php";


$errors = [];
$messages = [];
$comment = [
    'name_Client' =>'',
    'content' =>'',
    'note' =>'',
   
];

if (isset($_GET['id'])) {
    //requête pour récupérer les données en cas de modification
    $comment = getCommentById($pdo, $_GET['id']);
    if ($comment === false) {
        $errors[] = "L'employé n'existe pas";
    }
    $pageTitle = "Formulaire modification d'un commentaire";
} else {
    $pageTitle = "Formulaire ajout d'un commentaire";
}

if (isset($_POST['saveComments'])) {

    $comment = [
        'name_Client' => $_POST["name_Client"],
        'content' => $_POST["content"],
        'note'=> $_POST["note"],
        
    ];
    if(!$errors) {
        if (isset($_GET["id"])) {
            // Avec (int) on s'assure que la valeur stockée sera de type int
            $id = (int)$_GET["id"];
        } else {
            $id = null;
        }
    
    
    $res = saveComments($pdo, $_POST["name_Client"], $_POST["content"],$_POST["note"], $id);
    if ($res) {
        $messages[] = 'Commentaire enregistré';
        
        if (!isset($_GET["id"])) {
            $comment = [
                'name_Client' =>'',
                'content' =>'',
                'note' =>'',
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
<?php if ($comment !== false) { ?>

<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="" class="form-label">name_Client</label>
            <input type="text" class="form-control" name="name_Client" value="<?= $comment['name_Client']; ?>">
        </div>
        <div class=" mb-3">
            <label for="" class="form-label">Commentaire</label>
            <textarea name="content" id="content" cols="30" rows="3"
                class="form-control"><?=$comment['content'];?></textarea>
        </div>
        <div class="mb-3">
            <label for="note">Note</label>
            <select name="note" id="note" class="form-select">
                <?php foreach ($notes as $note) { ?>
                <option value="<?=$note; ?>"><?=$note; ?> étoiles</option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name="saveComments" class="btn btn-primary" value="Enregistrer">Enregistrer</button>
        <a href="comment.php">Retour</a>

    </form>
    <?php } ?>
</body>