<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__ . "/../lib/pdo.php";

require_once __DIR__ . "/../lib/users.php";

require_once __DIR__ . "/templates/header.php";



?>
<h1>Horaires d'ouverture</h1>

<form method="POST">
    <?php foreach($jours as $jour) { ?>
    <div class="row">
        <div class="col">

            <div class="mb-3">
                <label for="day" class="form-label">Jours</label>
                <select name="day" class="form-select " id="day">
                    <?php foreach($jours as $jour) { ?>
                    <option value="<?=$jour;?>"><?=$jour;?></option>
                    <?php }?>
                </select>
            </div>
        </div>

        <div class="col">


            <div class="mb-3">
                <label for="hour_mat" class="form-label">Matin</label>
                <select name="hour_mat" class="form-select " id="hour_mat">
                    <?php foreach($horaires_matin as $horaire_matin) { ?>
                    <option value="<?=$horaire_matin;?>"><?=$horaire_matin;?></option>
                    <?php }?>
                </select>
            </div>

        </div>

        <div class="col">


            <div class="mb-3">
                <label for="hour_apm" class="form-label">Après-midi</label>
                <select name="hour_apm" class="form-select " id="hour_apm">
                    <?php foreach($horaires_apm as $horaire_apm) { ?>
                    <option value="<?=$horaire_apm;?>"><?=$horaire_apm;?></option>
                    <?php }?>
                </select>
            </div>

        </div>
    </div>
    <?php } ?>
    <input type="submit" name="enregistrer" value="Enregistrer">
</form>
<?php
$days_hours = array("day", "hour_mat", "hour_apm",);
$open = array ($days_hours, $_POST);



?>