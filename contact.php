<?php
require_once('templates/header.php');
require_once('lib/annonce.php');
require_once('lib/config.php');
require_once('lib/pdo.php');

$annonces = getAnnonces($pdo);

if (isset($_POST['sendMail'])) {
    // Extraction des variables
    extract($_POST);

    if (!empty($name) && !empty($firstname) && !empty($email) && !empty($message)) {
        $destinataire = 'aureliedev24@gmail.com';
        $expediteur = $_POST['email'];
        $objet = $_POST['vehicules'];
        $headers = "Content-Type: text/plain; charset=utf-8\r\n";
        $headers .= 'From: ' . $_POST['name'] . ' ' . $_POST['firstname'] . "\r\n";
        $message = $_POST['message'];

        if (mail($destinataire, $objet, $message, $headers)) {
            echo 'Votre message a bien été envoyé';
        } else {
            echo 'Votre message n\'a pas été envoyé';
        }
    } else {
        echo 'Tous les champs sont obligatoires.';
    }
}
?>

<head>
    <title>Formulaire de Contact</title>
</head>

<h1 class="text-center mb-3">Contactez nous</h1>

<form method="POST" class="form-contact">
    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" class="mb-2 ms-2 form-control" required>
    </div>
    <div>
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname" class="mb-2 ms-2 form-control" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="mb-2 ms-2 form-control" required>
    </div>
    <div>
        <label for="vehicules">Sélectionnez le véhicule</label>
        <select name="vehicules" id="vehicules" class="mb-2 ms-2 form-select list-vehicules">
            <?php foreach ($annonces as $annonce) { ?>
            <option value="<?= $annonce['mark'] . ' ' . $annonce['title'] ?>">
                <?= $annonce['mark'] . ' ' . $annonce['title']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label for="message">Votre message</label>
        <textarea name="message" id="message" cols="30" rows="3" class="form-control form-text" required></textarea>
    </div>
    <input type="submit" value="Envoyer" name="sendMail" class="btn btn-outline-primary me-2 mt-3">
</form>

<?php
require_once('templates/footer.php');
?>