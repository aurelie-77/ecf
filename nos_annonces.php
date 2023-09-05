<?php 

require_once __DIR__."/lib/config.php";
require_once __DIR__."/lib/pdo.php";
require_once __DIR__."/lib/annonce.php";


require_once('templates/header.php');


$annonces = getAnnonces($pdo);

?>



<h1>Nos annonces</h1>

<div class="row text-center">
    <?php foreach($annonces as $key =>$annonce) {

    require __DIR__."/templates/annonce_part.php";

} ?>





    <?php 
require_once('templates/footer.php');
?>