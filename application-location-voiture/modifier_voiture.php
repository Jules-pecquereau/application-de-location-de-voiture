<?php

include('liaison.php');
$id= $_GET['id'];
$sql='SELECT* FROM voitures WHERE id='.$id.' ';
$temp=$pdo->query($sql);
$resultats3=$temp->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Titre de la page</title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action='voitures.php'>
        
        <input type='text' name='marque' placeholder='marque'>
        <input type='text'  name='modele' placeholder='modele'>
        <input type='text' name='immatriculation' placeholder='type AA-111-AA'>
        <input type='text' name='type_véhicule' placeholder='type du véhicule'>
        <select name='état' >
            <option value='1'>en état d'ètre louer</option>
            <option value='0'>non apte a la location</option>
        </select>
        <input type='number' name='prix_journalier' step='0.01'>
        <select name='en_location'>
            <option value='1'>déjà louer</option>
            <option value='0'>pas encore louer</option>
        </select>
        
        <input type='submit' value='modifier'  name='type'>
        
    </body>
    </html>
