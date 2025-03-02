<?php
require "liaison.php"; 


$voitures = Voiture::getAllVoitures();

foreach ($voitures as $voiture) {
    $voiture->afficherInfos();
}
?>
