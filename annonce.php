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
        <!-- Bouton pour afficher le formulaire de contact -->
        <button class="btn btn-primary btn-lg px-4 me-md-2" id="contactButton<?=$annonce['id']?>">Contacter un
            vendeur</button>
        <a href="nos_annonces.php">Retour</a>
    </div>

    <!-- Formulaire de contact  -->
    <form class="formulaire-contact" id="contactForm<?=$annonce['id']?>" style="display: none;">
        <h2>Contactez le vendeur</h2>
        <input type="hidden" name="annonce_id" value="<?=$annonce['id']?>">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required><br>
        <label for="telephone">Téléphone :</label>
        <input type="text" id="telephone" name="telephone"><br>
        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="4" required></textarea><br>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

</div>

<!-- Script JavaScript pour afficher le formulaire de contact -->
<script>
document.getElementById("contactButton<?=$annonce['id']?>").addEventListener("click", function(event) {
    event.preventDefault();
    var contactForm = document.getElementById("contactForm<?=$annonce['id']?>");
    contactForm.style.display = "block";

});
</script>
<?php require_once __DIR__ . "/templates/footer.php"; ?>