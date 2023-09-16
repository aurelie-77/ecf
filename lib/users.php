<?php

//verif si mot de passe et user ok avec bdd//
function verifyUserLoginPassword(PDO $pdo, string $email, string $password):array|bool
{
    $query = $pdo->prepare("SELECT * FROM users2 WHERE email = :email");
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user["password"])) {
        return $user;
    } else {
        return false;
    }
}

function getUsers(PDO $pdo)
{
    $sql = "SELECT * FROM users2";
    $query = $pdo->prepare($sql);
    $query->execute();
    $users=$query->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function getUserById(PDO $pdo, int $id):array|bool
{
    $query = $pdo->prepare("SELECT * FROM users2 WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
//ajout ou modif d'un employé 
function saveUser (PDO $pdo, string $email, string $password, string $first_name, string $last_name, int $id = null):bool
{
    if($id === null) {
        $query = $pdo->prepare("INSERT INTO users2 (email, password, first_name, last_name) "
        ."VALUES(:email, :password, :first_name, :last_name)");
    } else {
        $query =$pdo->prepare("UPDATE `users2` SET `email` = :email,"
        ."`password` = :password, "
        ."first_name = :first_name, last_name = :last_name WHERE `id` = :id;");
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
}
$query->bindValue(':email', $email, $pdo::PARAM_STR);
$query->bindValue(':password', $password, $pdo::PARAM_STR);
$query->bindValue(':first_name', $first_name, $pdo::PARAM_STR);
$query->bindValue(':last_name', $last_name, $pdo::PARAM_STR);
return $query->execute();  
}


//sup un employé
function deleteUser(PDO $pdo, int $id):bool
{
    $query = $pdo->prepare("DELETE FROM users2 WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);

    $query->execute();
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}