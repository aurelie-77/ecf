<?php
require_once __DIR__ ."/../lib/config.php";
require_once __DIR__ ."/../lib/session.php" ;


require_once __DIR__ ."/../lib/pdo.php";
require_once __DIR__ ."/../lib/tools.php" ;
require_once __DIR__ ."/../lib/annonce.php";
require_once __DIR__ ."/templates/header.php";


$errors = [];
$messages = [];
$annonce = [
    'mark'=> '',
    'title'=> '',
    'price'=> '',
    'km'=> '',
    'year'=> '',
    'content'=> ''
];

if (isset($_GET['id'])) {
    //requête pour récupérer les données de l'annonce en cas de modification
    $annonce = getAnnonceById($pdo, $_GET['id']);
    if ($annonce === false) {
        $errors[] = "L'annonce n'existe pas";
    }
    $pageTitle = "Formulaire modification annonce";
} else {
    $pageTitle = "Formulaire ajout annonce";
}


if (isset($_POST['saveAnnonce'])) { //Affichage du formulaire si il est plein sinon rien
    $fileName = null;
    $fileName1 = null;
    $fileName2 = null;
    $fileName3 = null;
    //Si un fichier a été envoye tmp est un emplacement temporaire sur le serveur
    if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
        //La méthode getimagesize retourne false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if($checkImage !== false) {
            //Si c'est une image on traite
            //la méthode move_uploaded_files permet de déplacer une image vers un dossier.
            $fileName = slugify(basename($_FILES["file"]["name"]));
            $fileName = uniqid().'-'. $fileName;// Uniqid permet de créer un nom unique pour chaque fichier

            if (move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_ . $fileName)) {
                if (isset($_POST['image'])) {
                    //On supprime l'ancienne image si on poste une nouvelle
                    unlink(dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_.$_POST['image']);
                }
            } else {
                $errors[] = "Le fichier n'a pas été uploadé";
            }
        } else {
            //Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit etre une image';
        }
    } else {
        //Si aucun fichier n'a été envoyé
        if (isset($_GET['id'])) {
            if (isset($_POST['delete_image'])) {
                //Si on a coché la case de suppression d'image, on supprime l'image
                unlink(dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_.$_POST['image']);
            } else {
                $fileName = $_POST['image'];
            }
        }
    }

    if(isset($_FILES['file1']['tmp_name']) && $_FILES['file1']['tmp_name'] != '') {
        //La méthode getimagesize retourne false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file1']['tmp_name']);
        if($checkImage !== false) {
            //Si c'est une image on traite
            //la méthode move_uploaded_files permet de déplacer une image vers un dossier.
            $fileName1 = slugify(basename($_FILES["file1"]["name"]));
            $fileName1 = uniqid().'-'. $fileName1;// Uniqid permet de créer un nom unique pour chaque fichier

            if (move_uploaded_file($_FILES["file1"]["tmp_name"], dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_ . $fileName1)) {
                if (isset($_POST['image1'])) {
                    //On supprime l'ancienne image si on poste une nouvelle
                    unlink(dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_.$_POST['image1']);
                }
            } else {
                $errors[] = "Le fichier n'a pas été uploadé";
            }
        } else {
            //Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit etre une image';
        }
    } else {
        //Si aucun fichier n'a été envoyé
        if (isset($_GET['id'])) {
            if (isset($_POST['delete_image1'])) {
                //Si on a coché la case de suppression d'image, on supprime l'image
                unlink(dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_.$_POST['image1']);
            } else {
                $fileName1 = $_POST['image1'];
            }
        }
    }

    if(isset($_FILES['file2']['tmp_name']) && $_FILES['file2']['tmp_name'] != '') {
        //La méthode getimagesize retourne false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file2']['tmp_name']);
        if($checkImage !== false) {
            //Si c'est une image on traite
            //la méthode move_uploaded_files permet de déplacer une image vers un dossier.
            $fileName2 = slugify(basename($_FILES["file2"]["name"]));
            $fileName2 = uniqid().'-'. $fileName2;// Uniqid permet de créer un nom unique pour chaque fichier

            if (move_uploaded_file($_FILES["file2"]["tmp_name"], dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_ . $fileName2)) {
                if (isset($_POST['image2'])) {
                    //On supprime l'ancienne image si on poste une nouvelle
                    unlink(dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_.$_POST['image2']);
                }
            } else {
                $errors[] = "Le fichier n'a pas été uploadé";
            }
        } else {
            //Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit etre une image';
        }
    } else {
        //Si aucun fichier n'a été envoyé
        if (isset($_GET['id'])) {
            if (isset($_POST['delete_image2'])) {
                //Si on a coché la case de suppression d'image, on supprime l'image
                unlink(dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_.$_POST['image2']);
            } else {
                $fileName2 = $_POST['image2'];
            }
        }
    }

    if(isset($_FILES['file3']['tmp_name']) && $_FILES['file3']['tmp_name'] != '') {
        //La méthode getimagesize retourne false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file3']['tmp_name']);
        if($checkImage !== false) {
            //Si c'est une image on traite
            //la méthode move_uploaded_files permet de déplacer une image vers un dossier.
            $fileName3 = slugify(basename($_FILES["file3"]["name"]));
            $fileName3 = uniqid().'-'. $fileName3;// Uniqid permet de créer un nom unique pour chaque fichier

            if (move_uploaded_file($_FILES["file3"]["tmp_name"], dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_ . $fileName3)) {
                if (isset($_POST['image3'])) {
                    //On supprime l'ancienne image si on poste une nouvelle
                    unlink(dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_.$_POST['image3']);
                }
            } else {
                $errors[] = "Le fichier n'a pas été uploadé";
            }
        } else {
            //Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit etre une image';
        }
    } else {
        //Si aucun fichier n'a été envoyé
        if (isset($_GET['id'])) {
            if (isset($_POST['delete_image3'])) {
                //Si on a coché la case de suppression d'image, on supprime l'image
                unlink(dirname(__DIR__)._ANNONCES_IMAGES_FOLDER_.$_POST['image3']);
            } else {
                $fileName3 = $_POST['image3'];
            }
        }
    }
    $annonce = [
        'mark' => $_POST['mark'],
        'title' => $_POST['title'],
        'year' => $_POST['year'],
        'km' => $_POST['km'],
        'price' => $_POST['price'],
        'content' => $_POST['content'],
        'image' => $fileName,
        'image1' => $fileName1,
        'image2' => $fileName2,
        'image3' => $fileName3
    ];
    // S'il n' y a pas d'erreur, on sauvegarde
    if (!$errors) {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];
        } else {
            $id = null;
        }
        //On passe toutes les données à la fonction getService
        $res = saveAnnonce($pdo, $_POST['mark'], $_POST['title'], $_POST['year'], $_POST['km'], $_POST['price'], $_POST['content'], $fileName, $fileName1, $fileName2, $fileName3, $id);
    
        if ($res) {
            $messages[] = "L'annonce a bien été sauvegardée";
            //On vide le tableau pour avoir les champs du formulaire vides
            if (!isset($_GET["id"])) {
                $annonce = [
                    'mark' => '',
                    'title' => '',
                    'year' => '',
                    'km' => '',
                    'price' => '',
                    'content' => '',
                ];
            }
        } else {
            $errors[] = "L'annonce n\'a pas été sauvegardée";
        }
    }
}
?>





<h1><?= $pageTitle; ?></h1>

<?php foreach ($messages as $message) { ?>
<div class="alert alert-success" role="alert">
    <?= $message; ?>
</div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
<div class="alert alert-danger" role="alert">
    <?= $error; ?>
</div>
<?php } ?>
<?php if ($annonce !== false) { ?>



<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Marque</label>
        <input type=" text" class="form-control" name="mark" id="mark" value="<?= $annonce['mark']; ?>">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Modèle</label>
        <textarea class="form-control" name="title" id="title" rows="8"><?= $annonce['title']; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prix</label>
        <textarea class="form-control" name="price" id="price" rows="8"><?= $annonce['price']; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="km" class="form-label">Kilomètres</label>
        <textarea class="form-control" name="km" id="km" rows="8"><?= $annonce['km']; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Année</label>
        <textarea class="form-control" name="year" id="year" rows="8"><?= $annonce['year']; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Description</label>
        <textarea class="form-control" name="content" id="content" rows="8"><?= $annonce['content']; ?></textarea>
    </div>


    <?php if (isset($_GET['id']) && isset($annonce['image'])) { ?>
    <p>
        <img src="<?= _ANNONCES_IMAGES_FOLDER_ . $annonce['image'] ?>" width="100">
        <label for="delete_image">Supprimer l'image</label>
        <input type="checkbox" name="delete_image" id="delete_image">
        <input type="hidden" name="image" value="<?= $annonce['image']; ?>">
    </p>

    <?php } ?>
    <p>
        <input type="file" name="file" id="file">
    </p>

    <?php if (isset($_GET['id']) && isset($annonce['image1'])) { ?>
    <p>
        <img src="<?= _ANNONCES_IMAGES_FOLDER_ . $annonce['image1'] ?>" width=" 100">
        <label for="delete_image1">Supprimer l'image</label>
        <input type="checkbox" name="delete_image1" id="delete_image1">
        <input type="hidden" name="image1" value="<?= $annonce['image1']; ?>">
    </p>

    <?php } ?>
    <p>
        <input type="file" name="file1" id="file1">
    </p>


    <?php if (isset($_GET['id']) && isset($annonce['image2'])) { ?>
    <p>
        <img src="<?=_ANNONCES_IMAGES_FOLDER_ . $annonce['image2'] ?>" width="100">
        <label for="delete_image2">Supprimer l'image</label>
        <input type="checkbox" name="delete_image2" id="delete_image2">
        <input type="hidden" name="image1" value="<?= $annonce['image2']; ?>">
    </p>
    <?php } ?>
    <p>
        <input type="file" name="file2" id="file2">
    </p>

    <?php if (isset($_GET['id']) && isset($annonce['image3'])) { ?>
    <p>
        <img src="<?= _ANNONCES_IMAGES_FOLDER_ . $annonce['image3'] ?>" width="100">
        <label for="delete_image3">Supprimer l'image</label>
        <input type="checkbox" name="delete_image3" id="delete_image3">
        <input type="hidden" name="image3" value="<?= $annonce['image3']; ?>">
    </p>
    <?php } ?>
    <p>
        <input type="file" name="file3" id="file3">
    </p>

    <input type="submit" value="Enregistrer" name="saveAnnonce" class="btn btn-primary">
    <a href="annonces.php">Retour</a>

</form>

<?php } ?>