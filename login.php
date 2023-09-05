<?php 
require_once 'lib/config.php';
require_once 'lib/session.php';
require_once 'lib/pdo.php';
require_once 'lib/user.php';

require_once 'templates/header.php';


$errors = [];
$messages = [];


if (isset($_POST['loginUser'])) {

    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);

    if ($user) {
        session_regenerate_id(true);
        $_SESSION['user'] = $user;
        if ($user['role'] === 'admin') {
            header('location: admin/index.php');
        } else {
            header('location: admin/annonces.php');
        }
    } else {
        $errors[] = 'Email ou mot de passe incorrect';
    }

}

?>


<h1>Connexion</h1>

<?php foreach ($messages as $message) { ?>
<div class="alert alert-success" role="alert">
    <?= $message; ?>
</div>
<?php }?>

<?php foreach ($errors as $error) { ?>
<div class="alert alert-danger" role="alert">
    <?= $error; ?>
</div>
<?php } ?>

<form method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type=" email" name="email" id="email" class="form-control">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type=" password" name="password" id="password" class="form-control">
    </div>

    <input type="submit" value="Connexion" name="loginUser" class="btn btn-primary">


</form>

<?php 
require_once __DIR__ . "/templates/footer.php";
?>