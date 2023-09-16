<?php

require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";

// Récupérez les valeurs des filtres
$priceMin = isset($_POST['priceMin']) ? $_POST['priceMin'] : null;
$priceMax = isset($_POST['priceMax']) ? $_POST['priceMax'] : null;
$kms_range = isset($_POST['km']) ? $_POST['km'] : null;
$year_range = isset($_POST['year']) ? $_POST['year'] : null;

// Construisez la requête SQL de base
$sql = "SELECT id, mark, title, year, price, km, content, image FROM vehicules WHERE price BETWEEN :priceMin AND :priceMax";


// Ajoutez des clauses WHERE en fonction des filtres sélectionnés

if (!empty($kms_range)) {
    switch ($kms_range) {
        case '0-100000':
            $sql .= " OR km <= 100000";
            break;
        case '100000-200000':
            $sql .= " OR km BETWEEN 100000 AND 200000";
            break;
        case '200000-plus':
            $sql .= " OR km > 200000";
            break;
    }
}

if (!empty($year_range)) {
    switch ($year_range) {
        case '1990_2000':
            $sql .= " OR year BETWEEN 1990 AND 2000";
            break;
        case '2000_2020':
            $sql .= " OR year BETWEEN 2000 AND 2020";
            break;
        case '2020-plus':
            $sql .= " OR year >= 2020";
            break;
    }
}

$result = $pdo->prepare($sql);
$result->bindParam(':priceMin', $priceMin, PDO::PARAM_INT);
$result->bindParam(':priceMax', $priceMax, PDO::PARAM_INT);
$result->execute();

// Afficher les résultats
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        include("templates/annonces_rech.php");
    }
} else {
    echo "Aucun véhicule trouvé pour les critères de recherche spécifiés.";
}
?>