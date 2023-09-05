<?php

require_once __DIR__."/lib/config.php";
require_once __DIR__."/lib/pdo.php";
require_once __DIR__."/lib/service.php";


require_once('templates/header.php');

  $services = getServices($pdo);
?>

<h1 class="text-center">Nos Services et ateliers</h1>

<div class="row text-center">
    <?php foreach($services as $key =>$service) {
    require __DIR__."/templates/service_part.php";

} ?>



</div>