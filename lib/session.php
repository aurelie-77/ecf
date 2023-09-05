<?php
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'domain' => '',
    'httponly' => true
]);


session_start();


function adminOnly() {
    if (!isset($_SESSION['user'])) {
        header('location: ../index.php');
    }else if($_SESSION['user']['role'] != 'admin') {
        // Rediriger vers la page de connexion
        header("Location: ../admin/index2.php");
        exit();
    }
}