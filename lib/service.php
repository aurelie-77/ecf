<?php 
//recuperer les donnees ds la bdd
function getServices(PDO $pdo) {
    $sql = 'SELECT * FROM services';
    $query = $pdo->prepare($sql);
    $query->execute();
    $services = $query->fetchAll(PDO::FETCH_ASSOC);
    return $services;
}

function getServiceById(PDO $pdo, int $id):array|bool
{
    $query = $pdo->prepare("SELECT * FROM services WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}



//ajout modif services

function saveService(PDO $pdo, string $name, string $price, string $text, int $id = null):bool
{
    if ($id === null) {
        $query = $pdo->prepare("INSERT INTO services (name, price, text) "
       ."VALUES(:name, :price, :text)");
    } else {
        $query = $pdo->prepare("UPDATE `services`SET `name`= :name, `price`= :price, `text`= :text ");
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
    }

    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);
    $query->bindParam(':text', $text, PDO::PARAM_STR);
   return $query->execute();
}


function deleteService(PDO $pdo, int $id) {
    $query = $pdo->prepare("DELETE FROM services WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);
    $query->execute();
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}