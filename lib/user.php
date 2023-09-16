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

//ajout d'un compte employé
function addUser(PDO $pdo,  string $email, string $password, string $first_name, string $last_name, $role = 'user') {
    $sql = "INSERT INTO `users2` (`email`, `password`,`first_name`, `last_name`, `role`) VALUES (:first_name, :last_name, :email, :password, :role);";
    $query = $pdo->prepare($sql);

    $password = password_hash($password, PASSWORD_DEFAULT);//mot de passe stocké en bdd de maniere securisée//
    
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    
    return $query->execute();
}