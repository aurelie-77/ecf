<?php 
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/session.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/comment.php";

require_once __DIR__ . "/templates/header.php";




$comments = getComments($pdo, 3);

?>



<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="assets/images/logo.png" class="d-block mx-lg-auto img-fluid" alt="logo" width="500" height="500"
            loading="lazy">
    </div>
    <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Bienvenue dans votre garage Parrot !
        </h1>
        <p class="lead">Votre garage à votre écoute
            Vincent Parrot, fort de ses 15 années d'expérience dans la réparation automobile, a ouvert
            son propre garage à Toulouse en 2021.
            Depuis 2 ans, il propose une large gamme de services: réparation de la carrosserie et de la
            mécanique des voitures ainsi que leur entretien régulier pour garantir leur performance et
            leur sécurité. De plus, le Garage V. Parrot met en vente des véhicules d'occasion afin
            d'accroître son chiffre d'affaires.
            Vincent Parrot considère son atelier comme un véritable lieu de confiance pour ses clients et
            leurs voitures doivent, selon lui, à tout prix être entre de bonnes mains.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        </div>
    </div>
</div>

<div class="row text-center">
    <?php foreach ($comments as $key => $comment) {
        include("templates/comment_part.php");
    } ?>
    <a href="avis.php">Laissez un commentaire</a>
</div>


</div>
</div>
</div>


<?php require_once __DIR__ . "/templates/footer.php"; ?>