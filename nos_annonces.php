<?php 
require_once __DIR__."/lib/config.php";
require_once __DIR__."/lib/pdo.php";
require_once __DIR__."/lib/annonce.php";

require_once __DIR__.'/templates/header.php';



$annonces = getAnnonces($pdo);



?>



<h1>Nos annonces</h1>

<div class="search-form">
    <form method="post" action="recherche.php">
        <label for="mark">Marque :</label>
        <select name="mark" id="mark">
            <option value="Tous">Tous</option>
            <?php foreach ($annonces as $annonce) { ?>
            <option value="<?= $annonce['mark'] ?>"><?= $annonce['mark'] ?></option>
            <?php } ?>
        </select>

        <label for="title">Modèle :</label>
        <select name="title" id="title">
            <option value="Tous">Tous</option>
            <?php foreach ($annonces as $annonce) { ?>
            <option value="<?= $annonce['title'] ?>"><?= $annonce['title'] ?></option>
            <?php } ?>
        </select>

        <label for="priceMin">Prix minimum :</label>
        <input type="text" name="priceMin" id="priceMin">

        <label for="priceMax">Prix maximum :</label>
        <input type="text" name="priceMax" id="priceMax">

        <label for="km">Nombre de kilomètres :</label>
        <input type="radio" name="km" id="km_0_100000" value="0-100000">
        <label for="km_0_100000">0 - 100000 km</label>
        <input type="radio" name="km" id="km_100000_200000" value="100000-200000">
        <label for="km_100000_200000">100000 - 200000 km</label>
        <input type="radio" name="km" id="km_200000_plus" value="200000-plus">
        <label for="km_200000_plus">Plus de 200000 km</label>

        <label for="year">Année :</label>
        <input type="radio" name="year" id="year_1990_2000" value="1990_2000">
        <label for="year_1990_2000">1990 - 2000</label>
        <input type="radio" name="year" id="year_2000_2020" value="2000_2020">
        <label for="year_2000_2020">2000 -2020</label>
        <input type="radio" name="year" id="year_2020_plus" value="2020_plus">
        <label for="year_2020_plus">2020 et plus</label>

        <input type="submit" value="Rechercher">
    </form>

</div>




<?php
if(!empty($_POST)) { ?>

<div class="row">
    <?php 
    include("recherche.php");?> </div>

<?php } else { ?>

<div class=" row ">
    <?php foreach($annonces as $key =>$annonce) {

require __DIR__."/templates/annonce_part.php"; }?>

</div>
<?php  } ?>


<?php 
require_once('templates/footer.php');
?>