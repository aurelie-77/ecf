<?php 

$errors=[]; $messages=[]; $annonce=[ 'mark'=> '',
    'title' => '',
    'price' => '',
    'km' => '',
    'year' => '',
    'content' => '',
    'image' => ''
    ];

    if (isset($_GET['id'])) {
    //requête pour récupérer les données de l'annonce en cas de modification
    $annonce = getAnnonceById($pdo, $_GET['id']);
    if ($annonce === false) {
    $errors[] = "L'annonce n\'existe pas";
    }
    $pageTitle = "Formulaire modification annonce";
    } else {
    $pageTitle = "Formulaire ajout annonce";
    }
    if (isset($_POST['saveAnnonce'])) {
    //@todo gérer la gestion des erreurs sur les champs (champ vide etc.)

    $fileName = null;
    // Si un fichier est envoyé
    if (isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != '') {
    // la méthode getimagessize va retourner false si le fichier n'est pas une image
    $checkImage = getimagesize($_FILES["file"]["tmp_name"]);
    if ($checkImage !== false) {
    // Si c'est une image on traite, deplacer le fichier uplodé
    $fileName = slugify(basename($_FILES["file"]["name"]));
    $fileName = uniqid() . '-' . $fileName;


    /* On déplace le fichier uploadé dans notre dossier upload, dirname(__DIR__)
    permet de cibler le dossier parent car on se trouve dans admin
    */
    if (move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_. $fileName)) {
    if (isset($_POST['image'])) {
    // On supprime l'ancienne image si on a posté une nouvelle
    unlink(dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_ . $_POST['image']);
    }
    } else {
    $errors[] = 'Le fichier n\'a pas été uploadé';
    }
    } else {
    $errors[] = 'Le fichier doit être une image';
    }
    } else {
    // Si aucun fichier n'a été envoyé
    if (isset($_GET['id'])) {
    if (isset($_POST['delete_image'])) {
    // Si on a coché la case de suppression d'image, on supprime l'image
    unlink(dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_ . $_POST['image']);
    } else {
    $fileName = $_POST['image'];
    }
    }
    }
    /* On stocke toutes les données envoyés dans un tableau pour pouvoir afficher
    les informations dans les champs. C'est utile pas exemple si on upload un mauvais
    fichier et qu'on ne souhaite pas perdre les données qu'on avait saisit.
    */
    $annonce = [
    'mark' => $_POST['mark'],
    'title' => $_POST['title'],
    'price' => $_POST['price'],
    'km' => $_POST['km'],
    'year' => $_POST['year'],
    'content' => $_POST['content'],
    'image' => $fileName,
    ];
    // Si il n'y a pas d'erreur on peut faire la sauvegarde
    if (!$errors) {
    if (isset($_GET["id"])) {
    // Avec (int) on s'assure que la valeur stockée sera de type int
    $id = (int)$_GET["id"];
    } else {
    $id = null;
    }
    // On passe toutes les données à la fonction saveAnnonce
    $res = saveAnnonce($pdo, $_POST["mark"], $_POST["title"], $_POST["price"],$_POST["mk"], $_POST["year"],
    $_POST["content"], $fileName, );
    if ($res) {
    $messages[] = "L'annonce a bien été sauvegardée";
    //On vide le tableau annonce pour avoir les champs de formulaire vides
    if (!isset($_GET["id"])) {
    $annonce = [
    'mark' => '',
    'title' => '',
    'price' => '',
    'km' => '',
    'year' => '',
    'content' => '',
    'image' => ''
    ];
    }
    } else {
    $errors[] = "L'annonce n'a pas été sauvegardée";
    }
    }

    }

?>

<?php if (isset($_GET['id']) && isset($annonce['image'])) { ?>
<p>
    <img src="<?= _ANNONCES_IMAGES_FOLDER_ . $annonce['image'] ?>" alt="<?= $annonce['title'] ?>" width="100">
    <label for="delete_image">Supprimer l'image</label>
    <input type="checkbox" name="delete_image" id="delete_image">
    <input type="hidden" name="image" value="<?= $annonce['image']; ?>">

</p>
<?php } ?>




mdp: Lou-Ann2007@



<?php
$messages = [];
$errors = [];

if (isset($_POST["sendContact"])) {
if (!isset($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
$errors[] = "L'adresse e-mail n'est pas valide";
}
if (!isset($_POST["message"]) || $_POST["message"] == "") {
$errors[] = "Le message ne doit pas être vide";
}
if (!$errors) {
$to = _APP_EMAIL_;
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$subject = "[garage Parrot] Formulaire de contact";
$emailContent = "Email : $email<br>"
."Message : <br>".nl2br(htmlentities($_POST["message"]));
$headers = "From: "._APP_EMAIL_ . "\r\n" .
"MIME-Version: 1.0" . "\r\n" .
"Content-type: text/html; charset=utf-8";



if(mail($to, $subject, $emailContent, $headers)) {
$messages[] = "Votre email a bien été envoyé";

} else {
$errors[] = "Une erreur s'est produite durant l'envoi";
}
}

}
?>

<?php foreach($messages as $message) { ?>
<div class="alert alert-success">
    <?=$message; ?>
</div>
<?php } ?>

<?php foreach($errors as $error) { ?>
<div class="alert alert-success">
    <?=$error; ?>
</div>
<?php } ?>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
    </div>

    <input type="submit" name="sendContact" class="btn btn-primary" value="Envoyer">

</form>