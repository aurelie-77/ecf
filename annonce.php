<?php 
require_once __DIR__ . "/lib/config.php"; 
require_once __DIR__ . "/lib/pdo.php"; 
require_once __DIR__ . "/lib/annonce.php";




    $id = $_GET['id'];
    $annonce = getAnnonceById($pdo, $id);


require_once __DIR__ . "/templates/header.php";


?>

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
    <p class=" lead"><?=$annonce['price'] ?></p>
    <p class=" lead"><?=$annonce['content'] ?></p>
    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="#" class="btn btn-primary btn-lg px-4 me-md-2">contact</a>
        <a href="nos_annonces.php">Retour</a>
    </div>
</div>
</div>









<?php require_once __DIR__ . "/templates/footer.php"; ?>