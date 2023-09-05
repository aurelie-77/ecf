<?php 
require_once __DIR__."/lib/config.php";

require_once __DIR__."/templates/header.php"; 


session_start();

    if (isset($_POST["sendContact"])) {
        //extraction des variables
        extract($_POST);
        //verifiez si les variables existent et non vides
        if(isset($email) && $email != "" &&
        isset($name) && $name != "" &&
        isset($message) && $message != "" ){
            //envoyé l'email
            //destinataire votre adressemail (en exemple la mienne)
$to = "laulouann@gmail.com";
//objet du mail
$subject = "vous avez reçu un message de : " .$email;

$message = "<p>Vous avez reçu un message de <strong> " .$email."</strong></p>;
<p><strong>Nom :</strong>".$name."</p>
<p><strong>Message :</strong>".$message."</p> ";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$email.'>' . "\r\n";

//envoi du mail
$send = mail($to,$subject,$message,$headers);
//vérification de l'envoi
if($send) {
   $_SESSION['succes_message'] = "message envoyé";
    
}else {
    $info = "message non envoyé";
    
}


}else {
//si elles sont vides
$info = "veuillez remplir tous les champs";

}
}

//afficher le message d'erreur
if(isset($info)) { ?>
<p class="request_message" style="color:red"><?=$info?> </p>
<?php }?>

<?php 
//afficher le message réussi
if(isset($_SESSION['succes_message'])) { ?>
<p class="request_message" style="color:green"><?=$_SESSION['succes_message']?> </p>
<?php }?>

<h1>Contact</h1>


<form method=" POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="name" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="8"></textarea>
    </div>

    <input type="submit" name="sendContact" class="btn btn-primary" value="Envoyer">

</form>