<?php 
$mainMenu = [
    'index.php' => 'Accueil',
    'nos_annonces.php' => 'Nos annonces',
    'nos_services.php' => 'services',
    'contact.php' => 'Contact',
    
];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage V.Parrot</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/override-bootsrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="assets/images/logo.png" alt="logo" width="150">
                </a>
            </div>

            <ul class="nav nav-pills">
                <?php foreach ($mainMenu as $page => $titre) { ?>
                <li class="nav-item"><a href="<?= $page; ?>"
                        class="nav-link <?php if (basename($_SERVER['SCRIPT_NAME']) === $page) { echo 'active';} ?>"><?= $titre; ?></a>
                </li>
                <?php } ?>
            </ul>


            <div class="col-md-3 text-end">
                <?php if (isset($_SESSION['user'])) { ?>
                <a href="logout.php" class="btn btn-outline-primary me-2">Déconnexion</a>
                <?php } else { ?>
                <a href="login.php" class="btn btn-outline-primary me-2">Connexion</a>

                <?php } ?>
            </div>
        </header>



        <main>