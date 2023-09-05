<?php 

define("_ANNONCES_IMAGES_FOLDER_", "/uploads/annonces/");
define("_ASSETS_IMAGES_FOLDER_", "/assets/images/");
define("_DOMAIN_", "localhost");
define("_DB_SERVER_", "localhost");
define("_ADMIN_ITEM_PER_PAGE_", 10);
define("_DB_NAME_", "garage_parrot");
define("_DB_USER_", "root");
define("_DB_PASSWORD_", "");

define("_HOME_ANNONCES_LIMIT_", 6);




$adminMenu = [
    'index.php' => 'Accueil',
    'annonces.php' => 'Annonces',
    'employes.php'=> 'Employes',
    'services.php' => 'Services',
    'horaires.php' => 'horaires',
    'comment.php' => 'commentaires',
 ];
 
 $userMenu = [
    'index.php' => 'Accueil',
    'annonces.php' => 'Annonces',
    'comment.php' => 'commentaires',
  
 ];

 $jours = [
   'jour1' =>'lundi',
   'jour2' =>'Mardi',
   'jour3' =>'Mercredi',
   'jour4' =>'Jeudi',
   'jour5' =>'Vendredi',
   'jour6' =>'Samedi',
   'jour7' =>'Dimanche',

 ];
 $horaires_matin = [
   'heure_matin1' =>'8:00 12:00',
   'heure_matin2' =>'8:30 12:00',
   'heure_matin3' =>'9:00 12:00',
   'close' =>'fermé',
   
 ];

 $horaires_apm = [
   'heure_apm1' =>'14:00 17:00',
   'heure_apm2' =>'14:00 17:30',
   'heure_apm3' =>'14:00 18:00',
   'close' =>'fermé',
];

$notes = [
  'note5' => '5',
  'note4' => '4',
  'note3' => '3',
  'note2' => '2',
  'note1' => '1',
  'note0' => '0',
];