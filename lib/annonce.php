<?php 
//nb d'annonces limit à afficher
function getAnnonces(PDO $pdo, int $limit = null, int $page = null ):array|bool
{
    $sql = "SELECT * FROM vehicules";
    if ($limit && !$page) {
        $sql .= " LIMIT  :limit";
    }
    if ($limit && $page) {
        $sql .= " LIMIT :offest, :limit";
    }

    $query = $pdo->prepare($sql);

    if ($limit) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    if ($page) {
        $offset = ($page - 1) * $limit;
        $query->bindValue(":offest", $offset, PDO::PARAM_INT);
    }
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function getAnnonceById(PDO $pdo, int $id):array|bool
{
    $query = $pdo->prepare("SELECT * FROM vehicules WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function getAnnonceImage(string|null $image)
{
    if($image === null){
        return _ASSETS_IMAGES_FOLDER_."annonce_default.jpg";
            
        } else {
            return _ANNONCES_IMAGES_FOLDER_.$image;
        }
}
//connaitre le nb total d'annonces
function getTotalAnnonces(PDO $pdo):int|bool
{
    $sql = "SELECT COUNT(*) as total FROM vehicules";
    $query = $pdo->prepare($sql);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

//enregistrer une annonce, saveAnnonce gère l'insertion et la modif(update)
function saveAnnonce(PDO $pdo, string $mark, string $title, string $price, string $km, string $year, string $content, string|null $image, string|null $image1, string|null $image2, string|null $image3, int $id = null):bool
{
    if ($id === null) {
    
        $query = $pdo->prepare("INSERT INTO vehicules (mark, title, price, km, year, content, image, image1, image2, image3) "
        ."VALUES (:mark, :title, :price, :km, :year, :content, :image, :image1, :image2, :image3);");
    } else {
        $query = $pdo->prepare("UPDATE `vehicules` SET `mark`= :mark, "
        ."`title`= :title, "
        ."`price`= :price, "
        ."`km`= :km, "
        ."`year`= :year, "
        ."`content`= :content,"
        ."`image` = :image,"
        ."`image1` = :image1,"
        ."`image2` = :image2,"
        ."`image3` = :image3  WHERE `id` = :id;"); 

    
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
    }
        
        $query->bindValue(':mark', $mark, $pdo::PARAM_STR);
        $query->bindValue(':title', $title, $pdo::PARAM_STR);
        $query->bindValue(':price', $price, $pdo::PARAM_STR);
        $query->bindValue(':km', $km, $pdo::PARAM_STR);
        $query->bindValue(':year', $year, $pdo::PARAM_STR);
        $query->bindValue(':content', $content, $pdo::PARAM_STR);
        $query->bindValue(':image', $image, $pdo::PARAM_STR);
        $query->bindValue(':image1', $image1, $pdo::PARAM_STR);
        $query->bindValue(':image2', $image2, $pdo::PARAM_STR);
        $query->bindValue(':image3', $image3, $pdo::PARAM_STR);
        return $query->execute(); 
}


//sup une annonce
function deleteAnnonce(PDO $pdo, int $id):bool
{
    $query = $pdo->prepare("DELETE FROM vehicules WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);

    $query->execute();
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}