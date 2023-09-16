<?php
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire de contact
    $annonceId = isset($_POST['annonce_id']) ? $_POST['annonce_id'] : null;
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Validation des données (vous pouvez ajouter des validations supplémentaires ici)

    // Traitement de la demande de contact
    if ($annonceId && $nom && $email && $message) {
        // Insérez ici le code pour traiter la demande de contact,
        // par exemple, envoyer un e-mail, enregistrer dans une base de données, etc.

        // Exemple : Envoi d'un e-mail
        $subject = "Demande de contact pour l'annonce #$annonceId";
        $messageBody = "Nom : $nom\n";
        $messageBody .= "E-mail : $email\n";
        $messageBody .= "Message :\n$message";
        $to = 'adresse_email_vendeur@example.com'; // Remplacez par l'adresse e-mail du vendeur
        $headers = "From: $email\r\n";

        if (mail($to, $subject, $messageBody, $headers)) {
            echo "Votre demande de contact a été envoyée avec succès.";
        } else {
            echo "Une erreur est survenue lors de l'envoi de votre demande de contact.";
        }
    } else {
        echo "Tous les champs du formulaire doivent être remplis.";
    }
} else {
    echo "Accès non autorisé.";
}