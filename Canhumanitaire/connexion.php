<?php

// On démarre la session AVANT d'écrire du code HTML
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
        
    <?php 
        header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)
        include_once("bdd/access/google_analytics.php");
    ?>
        
    <title>Canhumanitaire | Connexion</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style_connexion.css">

    <META NAME="TITLE" CONTENT="Canhumanitaire | Connexion">
    <META NAME="AUTHOR" CONTENT="Matthieu Devilliers">
    <META NAME="DESCRIPTION" CONTENT="Page de connexion de l'association Canhumanitaire">
    <META NAME="KEYWORDS" CONTENT="association, canhumanitaire, réparation, fauteuil, organisation à but non lucratif, cité scolaire sembat seguin, lycée marcel sembat, lycée professionelle marc seguin">
    <META NAME="OWNER" CONTENT="Canhumanitaire">
    <META NAME="ROBOTS" CONTENT="noindex">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h1>Bienvenue à vous</h1>
            
            <form class="form" method="POST" action="connexion.php">
                <input name="pseudo" type="text" placeholder="Utilisateur">
                <input name="mdp" type="password" placeholder="Mot de passe">
                <button type="submit" id="login-button">Connexion</button>
            </form>
            
            <?php
                if(isset($_POST['pseudo']))
                {
                    include('bdd/access/bdd.php');
        
                    // Si tout va bien, on peut continuer
                    $reponse = $bdd->prepare('SELECT * FROM compte_canu WHERE pseudo = ?');
                    $reponse->execute(array(htmlspecialchars($_POST['pseudo'])));
        
                    // On affiche chaque entrée une à une
                    while ($donnees = $reponse->fetch())
                    {
                        if($_POST['mdp']==$donnees['mdp'])
                        {
                            $_SESSION['pseudo'] = $_POST['pseudo'];
                            ?>
                            <script>
                                window.location.replace("http://canhumanitaire.fr/bdd/stock.php");
                            </script>
                            <?php
                        }
                        else
                        {
                            ?>
                                <p style="color:red;font-weight:bold;font-size:32px;">Mot de passe incorrect !</p>
                            <?php
                        }
                    }
                    $reponse->closeCursor(); // Termine le traitement de la requête
                }
            ?>
        </div>
    </div>
</body>

</html>
