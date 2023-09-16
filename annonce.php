<?php 
require_once __DIR__ . "/lib/config.php"; 
require_once __DIR__ . "/lib/pdo.php"; 
require_once __DIR__ . "/lib/annonce.php";


// Vérifiez si une annonce a été trouvée
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $annonce = getAnnonceById($pdo, $id);

    if ($annonce !== null) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $nom = $_POST["nom"];
            $email = $_POST["email"];
            $telephone = $_POST["telephone"];
            $message = $_POST["message"];
            
            // Afficher les informations de contact
            echo "Nom : $nom<br>";
            echo "E-mail : $email<br>";
            echo "Téléphone : $telephone<br>";
            echo "Message : $message<br>";
        }
    } else {
        echo "L'identifiant de l'annonce n'est pas valide.";
    }
} else {
    echo "L'identifiant de l'annonce n'est pas présent dans l'URL.";
}


    
        
    

require_once __DIR__ . "/templates/header.php";
?>

<!-- l'affichage de l'annonce -->

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-4 col-sm-8 col-lg-6">
        <img src="<?=getAnnonceImage($annonce['image'])?>" class=" d-block mx-lg-auto img-fluid" width=" 300"
            height="300" loading="lazy">
    </div>
    <div class="col-4 col-sm-8 col-lg-6">
        <img src="<?=getAnnonceImage($annonce['image1'])?>" class="d-block mx-lg-auto img-fluid" width="300"
            height="300" loading="lazy">
    </div>
    <div class="col-4 col-sm-8 col-lg-6">
        <img src="<?=getAnnonceImage($annonce['image2'])?>" class="d-block mx-lg-auto img-fluid" width="300"
            height="300" loading="lazy">
    </div>
    <div class="col-4 col-sm-8 col-lg-6">
        <img src="<?=getAnnonceImage($annonce['image3'])?>" class="d-block mx-lg-auto img-fluid" width="300"
            height="300" loading="lazy">
    </div>
</div>


<div class="col-lg-6">

    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
        <?=$annonce['title']?>
    </h1>
    <p class=" lead"><?=$annonce['image'] ?></p>
    <p class=" lead"><?=$annonce['price'] ?></p>
    <p class=" lead"><?=$annonce['content'] ?></p>
    <p class=" lead"><?=$annonce['km'] ?></p>
    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="nos_annonces.php">Retour</a>
    </div>


    <?php require_once __DIR__ . "/templates/footer.php"; ?>