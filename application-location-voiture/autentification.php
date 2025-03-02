<?php
session_start();
    include('liaison.php');
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
        <form action="voitures.php" method="post">
        <input type="text"  placeholder="nom utilisateur" name="user">
        <input type="password"  placeholder='mot de passe ' name="mdp">
        <input type="submit" value="envoyé">
    </form>
    </body>
    </html>
    