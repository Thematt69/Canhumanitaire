<?php

// On démarre la session AVANT d'écrire du code HTML
session_start();

if($_SESSION['pseudo']==NULL){
	?>
		<script>
        window.location.replace("http://canhumanitaire.fr/connexion.php");
		</script>
	<?php
}

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
        
    <?php 
        header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)
        include_once("bdd/access/google_analytics.php");
    ?>
        
	<title>Canhumanitaire | Modification</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="images/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <META NAME="TITLE" CONTENT="Canhumanitair | Modificatione">
    <META NAME="AUTHOR" CONTENT="Matthieu Devilliers">
    <META NAME="DESCRIPTION" CONTENT="Modification du stock de l'association Canhumanitaire">
    <META NAME="KEYWORDS" CONTENT="association, canhumanitaire, réparation, fauteuil, organisation à but non lucratif, cité scolaire sembat seguin, lycée marcel sembat, lycée professionelle marc seguin">
    <META NAME="OWNER" CONTENT="Canhumanitaire">
	<META NAME="ROBOTS" CONTENT="noindex">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

	<div id="colorlib-page">

		<?php include_once("header.php"); ?>

		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
				<div class="container">
					<div class="row d-flex">
						<div class="col-xl-12 py-12 px-md-12">
							<div class="row pt-md-12">
								<?php
                                include_once("access/bdd.php");
                                if(isset($_POST['ID'])) {
                                    // Si tout va bien, on peut continuer
                                    $req1 = $bdd->prepare('SELECT * FROM stock_canu WHERE ID = ?');
                                    $req1->execute(array($_POST['ID']));

                                    // On affiche chaque entrée une à une
                                    while($donnees = $req1->fetch())
                                    {
                                    ?>
                                        <form class="form" method="POST" action="modification.php" class="bg-light p-5 contact-form">
                                            <br>
                                            <div class="form-group">
                                                <p>ID : <?php echo $donnees['ID'] ?></p>
                                                <?php $_SESSION['ID'] = $donnees['ID'] ?>
                                            </div>
                                            <div class="form-group">
                                                <p>Date d'arrivée : <?php echo $donnees['date_arrive'] ?></p>
                                            </div>
                                            <div class="form-group">
                                                <p>Type : <?php echo $donnees['types'] ?></p>
                                            </div>
                                            <div class="form-group">
                                                <p>Etat actuel : <?php echo $donnees['etat'] ?></p>
                                                <p>Etat : <select name="etat" id="etat-select" class="form-control" required>
                                                                <?php 
                                                                    if($donnees['etat']=='Reçu') {
                                                                        ?><option selected value="Reçu">Reçu</option>
                                                                        <option value="En cours de réparation">En cours de réparation</option>
                                                                        <option value="Réparée">Réparée</option>
                                                                        <option value="Envoyé">Envoyé</option><?php
                                                                    } 
                                                                    else if($donnees['etat']=='En cours de réparation') {
                                                                        ?><option value="Reçu">Reçu</option>
                                                                        <option selected value="En cours de réparation">En cours de réparation</option>
                                                                        <option value="Réparée">Réparée</option>
                                                                        <option value="Envoyé">Envoyé</option><?php
                                                                    }
                                                                    else if($donnees['etat']=='Réparée') {
                                                                        ?><option value="Reçu">Reçu</option>
                                                                        <option value="En cours de réparation">En cours de réparation</option>
                                                                        <option selected value="Réparée">Réparée</option>
                                                                        <option value="Envoyé">Envoyé</option><?php
                                                                    } 
                                                                    else {
                                                                        ?><option value="Reçu">Reçu</option>
                                                                        <option value="En cours de réparation">En cours de réparation</option>
                                                                        <option value="Réparée">Réparée</option>
                                                                        <option selected value="Envoyé">Envoyé</option><?php
                                                                    }
                                                                ?>
                                                            </select></p>
                                            </div>
                                            <div class="form-group">
                                                <p>Zone de stockage actuel : <?php echo $donnees['zone_stockage'] ?></p>
                                                <p>Zone de stockage : <select name="zone_stockage" id="zone-select" class="form-control" required>
                                                                <?php 
                                                                    if($donnees['zone_stockage']=='Arrivage') {
                                                                        ?><option selected value="Arrivage">Arrivage</option>
                                                                        <option value="En cours de réparation">En cours de réparation</option>
                                                                        <option value="Réparée">Réparée</option>
                                                                        <option value="Parti">Parti</option><?php
                                                                    } 
                                                                    else if($donnees['zone_stockage']=='En cours de réparation') {
                                                                        ?><option value="Arrivage">Arrivage</option>
                                                                        <option selected value="En cours de réparation">En cours de réparation</option>
                                                                        <option value="Réparée">Réparée</option>
                                                                        <option value="Parti">Parti</option><?php
                                                                    }
                                                                    else if($donnees['zone_stockage']=='Réparée') {
                                                                        ?><option value="Arrivage">Arrivage</option>
                                                                        <option value="En cours de réparation">En cours de réparation</option>
                                                                        <option selected value="Réparée">Réparée</option>
                                                                        <option value="Parti">Parti</option><?php
                                                                    } 
                                                                    else {
                                                                        ?><option value="Arrivage">Arrivage</option>
                                                                        <option value="En cours de réparation">En cours de réparation</option>
                                                                        <option value="Réparée">Réparée</option>
                                                                        <option selected value="Parti">Parti</option><?php
                                                                    }
                                                                ?>
                                                            </select></p>
                                            </div>
                                            <div class="form-group">
                                                <p>Commentaire actuel : <?php echo $donnees['commentaire'] ?></p>
                                                <p>Commentaire : <textarea name="commentaire" class="form-control" required></textarea></p><br><br>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Modifier" class="btn btn-primary py-3 px-5">
                                            </div>
                                        </form>
                                    <?php
                                    }
                                    $req1->closeCursor(); // Termine le traitement de la requête
                                }
                                else if(isset($_POST['etat'])) {
                                    $req2 = $bdd->prepare('UPDATE stock_canu SET etat = :etat, zone_stockage = :zone_stockage, commentaire = :commentaire, pseudo = :pseudo WHERE ID = :cible');
                                                                    
                                    $req2->execute(array(
                                        'etat' => htmlspecialchars($_POST['etat']),
                                        'zone_stockage' => htmlspecialchars($_POST['zone_stockage']),
                                        'commentaire' => htmlspecialchars($_POST['commentaire']),
                                        'pseudo' => htmlspecialchars($_SESSION['pseudo']),
                                        'cible' => htmlspecialchars($_SESSION['ID']),
                                        ));
                                    $req2->closeCursor(); // Termine le traitement de la requête
                                    ?>
                                    <script>
                                        window.location.replace("http://canhumanitaire.fr/bdd/stock.php");
                                    </script>
                                    <?php
                                }
                                else {
                                    ?>
                                        <form method="POST" action="modification.php" class="bg-light p-5 contact-form">
                                            <h3 class="mb-2">Sélectionner le matériel à modifier : </h3>
                                                <br>
                                                <div class="row block-12">
                                                    <div class="col-lg-12 d-flex">
                                                        <select name="ID" id="materiel-select">
                                                            <?php
                                                            // Si tout va bien, on peut continuer
                                                            $req3 = $bdd->prepare('SELECT * FROM stock_canu');
                                                            $req3->execute();
                        
                                                            // On affiche chaque entrée une à une
                                                            while($donnees = $req3->fetch())
                                                            {
                                                                ?>
                                                                <div class="form-group">
                                                                    <option value="<?php echo $donnees['ID']; ?>" class="form-control"><?php echo $donnees['ID']; echo ' - '; echo $donnees['types']; echo ', stocké en zone '; echo $donnees['zone_stockage'];?></option>
                                                                </div>
                                                                <?php
                                                            }
                                                            $req3->closeCursor(); // Termine le traitement de la requête
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br><br>
                                            <input type="submit" value="Modifier le matériel sélectionné" class="btn btn-primary py-3 px-5">
                                        </form>
                                    <?php
                                }
                                ?>
							</div>
						</div>
					</div>
				</div>
	    	</section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>
    
  </body>
</html> 