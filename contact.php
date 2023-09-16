<?php 
require_once __DIR__."/lib/config.php";

require_once __DIR__."/templates/header.php"; 






?>


<head>
    <title>Formulaire de Contact</title>
</head>

<body>
    <h1>Contactez-nous</h1>
    <form action="traitement.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message :</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Envoyer">
    </form>
</body>

</html>