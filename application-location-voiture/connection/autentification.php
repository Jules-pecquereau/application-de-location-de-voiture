<?php
session_start();
require_once('../class/liaison.php');
    if (isset($_POST['nom_utilisateur'])&& isset($_POST['mot_de_passe'])){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nom_utilisateur = $_POST['nom_utilisateur'];
                $mot_de_passe = $_POST['mot_de_passe'];

                $bdd = new Bdd();
                $pdo = $bdd->getPDO();

                $sql = "SELECT * FROM utilisateur WHERE nom_utilisateur = :nom_utilisateur";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['nom_utilisateur' => $nom_utilisateur]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && $user['mot de passe'] === $mot_de_passe) { 
                    $_SESSION['nom_utilisateur'] = $user['nom_utilisateur'];
                    $_SESSION['admin'] = $user['admin']; 
                    $_SESSION['connection'] = 1 ;
                    header("Location: ../index.php");
                    exit;
                } else {
                    echo "Identifiants incorrects.";
                }
            }
        }
?>

<form method="POST">
    <input type="text" name="nom_utilisateur" placeholder="Nom d'utilisateur" required>
    <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>
