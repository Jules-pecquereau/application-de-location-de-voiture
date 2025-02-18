<?php
    include('liaison.php');
    session_start();
    $sql='SELECT * FROM utilisateur ;' ;
                    
    $temp=$pdo->query($sql);
    while($resultats1=$temp->fetch()){
        if(isset($_POST['user'])){
        $_SESSION['mdp'] = $_POST['mdp'];
        $_SESSION['user'] = $_POST['user'];
    }
        if($_SESSION['user']==$resultats1['nom_utilisateur']&& $_SESSION['mdp']==$resultats1['mot de passe']){
            echo $_SESSION['mdp'] . $_SESSION['user'];
            $_SESSION['admin']=1;
    }       
    else {
        $_SESSION['admin']=0;
        echo $_SESSION['mdp'] . $_SESSION['user'];
    }
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>location voiture</title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <link rel="stylesheet" href="style.css">

</style>
    </head>
    <body>
        <table>
        <tr>
            <th>marque</th>
            <th>modèle</th>
            <th>immatriculation</th>
            <th>type</th>
            <th>état du véhicule</th>
            <th>prix a la journée</th>
            <th>déjà louer ou non</th>
        </tr>
        <?php
                    
                
                
                if($_SESSION['admin']==1){
                        
                        if(isset($_GET['type'])){
                            $type=$_GET['type'];
                        if($type=='ajouter'){
                            $marque=$_GET['marque'];
                            $modèle=$_GET['modele'];
                            $immatriculation=$_GET['immatriculation'];
                            $type=$_GET['type_véhicule'];
                            $état=$_GET['état'];
                            $prix_journalier=$_GET['prix_journalier'];
                            $en_location=$_GET['en_location'];
                            $sql="INSERT INTO `voitures`(`id`, `marque`, `modèle`, `immatriculation`, `type`, `état`, `prix-journalier`, `en-location`) VALUES (NULL,'$marque','$modèle','$immatriculation','$type','$état','$prix_journalier','$en_location')";
                            $nbligne=$pdo->exec($sql);//ajoute les résulat au tableau
                            

                            $sql='SELECT * FROM voitures ;' ;
                            
                            $temp=$pdo->query($sql);
                            while($resultats=$temp->fetch()){
                                echo "<tr><td>".$resultats['marque']."</td><td>".$resultats['modèle']."</td><td>".$resultats['immatriculation']."</td><td>".$resultats['type']."</td><td>".$resultats['état']."</td><td>".$resultats['prix-journalier']."</td><td>".$resultats['en-location']."</td><td><a href='voitures.php?type=supprimer&id=".$resultats['id']."'>supprimer</a></td><td><a href='modifier_voitures.php'>modifier</a></td></tr>";
                            }
                        }
                    }
                    else{
                        $sql='SELECT * FROM voitures ;' ;
                            
                        $temp=$pdo->query($sql);
                        while($resultats=$temp->fetch()){
                            echo "<tr><td>".$resultats['marque']."</td><td>".$resultats['modèle']."</td><td>".$resultats['immatriculation']."</td><td>".$resultats['type']."</td><td>".$resultats['état']."</td><td>".$resultats['prix-journalier']."</td><td>".$resultats['en-location']."</td><td><a href='voitures.php?type=supprimer&id=".$resultats['id']."'>supprimer</a></td><td><a href='modifier_voiture.php'>modifier</a></td></tr>";
                        }
                    }
                if(isset($_GET['type'])){
                if($type=='supprimer'){
                    $id=$_GET['id'];
                    $sql= "DELETE FROM voitures WHERE id = $id ;";
                    $nbligne=$pdo->exec($sql);
                    $sql='SELECT * FROM voitures ;' ;
                            
                        $temp=$pdo->query($sql);
                        while($resultats=$temp->fetch()){
                            echo "<tr><td>".$resultats['marque']."</td><td>".$resultats['modèle']."</td><td>".$resultats['immatriculation']."</td><td>".$resultats['type']."</td><td>".$resultats['état']."</td><td>".$resultats['prix-journalier']."</td><td>".$resultats['en-location']."</td><td><a href='voitures.php?type=supprimer&id=".$resultats['id']."'>supprimer</a></td><td><a href='modifier_voiture.php'>modifier</a></td></tr>";
                            }
                        }
                    }
                }
        ?>
        </table>
        <?php

        if($_SESSION['admin']==1){
            echo "<form action='voitures.php'>

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
            
            <input type='submit' value='ajouter'  name='type'>
        </form>";
        
        
        
        }
        else{

        }
        ?>
        <a href="autentification.php">se déconnecter</a>
    </body>
    </html>