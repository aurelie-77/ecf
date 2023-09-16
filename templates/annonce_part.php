<?php

$imagePath = getAnnonceImage($annonce['image']);

?>

<div class="col-md-4 my-2">
    <div class="card">
        <img src="<?=$imagePath?>" class="card-img-top" alt="<?=htmlentities($annonce["title"]) ?>">
        <div class="card-body">
            <h5 class="card-title"><?= htmlentities($annonce["mark"].' '.htmlentities($annonce["title"])) ?>
            </h5>
            <p class="card-text bold"><?= htmlentities(substr($annonce["price"], 0, 100)) ?></p>
            <p class="card-text"><?= htmlentities(substr($annonce["content"], 0, 100)) ?></p>
            <p class="card-text"><?= htmlentities(substr($annonce["km"], 0, 100)) ?></p>
            <a href="annonce.php?id=<?=$annonce["id"]?>" class="btn btn-primary">Lire la suite</a>
        </div>
    </div>
</div>