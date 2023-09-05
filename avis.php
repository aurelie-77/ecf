<?php 
require_once __DIR__."/lib/config.php";
require_once __DIR__."/lib/pdo.php";

require_once __DIR__."/lib/comment.php";
require_once __DIR__."/templates/header.php"; 


$errors = [];
$messages = [];
$comment = [
    'name_Client' =>'',
    'content' =>'',
    'note' =>'',
    
];

if (isset($_POST['saveComments'])) {

    if (!$errors) {
        $res = saveComments($pdo, $_POST['name_Client'], $_POST['content'], $_POST['note']);

        if ($res) {
            $messages[] = 'Le commentaire a bien été sauvegardé';
        } else {
            $errors[] = "Le commentaire n'a pas été sauvegardé";
        }
    }
    $comment = [
        'name_Client' => $_POST["name_Client"],
        'content' => $_POST["content"],
        'note'=> $_POST["note"],
    ];
}

    
?>





<h2>Laissez un commentaire</h2>

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
        <a href="index.php">Retour</a>

    </form>

</body>