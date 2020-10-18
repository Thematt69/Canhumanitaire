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
        
	<title>Canhumanitaire | Enregistrement</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="images/logo.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <META NAME="TITLE" CONTENT="Canhumanitaire | Enregistrement">
    <META NAME="AUTHOR" CONTENT="Matthieu Devilliers">
    <META NAME="DESCRIPTION" CONTENT="Enregistrement du stock de l'association Canhumanitaire">
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
                                <div class="col-lg-12 d-flex">
                                    <form class="bg-light p-5 contact-form" method="POST" action="enregistrement.php">
                                        <?php
                                        include_once("access/bdd.php");
                                            // Si tout va bien, on peut continuer
                                            $req = $bdd->prepare('SELECT ID FROM stock_canu ORDER BY ID DESC LIMIT 1');
                                            $req->execute(array());
                                    
                                            // On affiche chaque entrée une à une
                                            while($donnees = $req->fetch())
                                            {
                                                $id = $donnees['ID']+1;
                                                ?>
                                                    <div class="form-group">
                                                        <p>Ce matériel portera l'identifiant : <?php echo $id ?></p>
                                                    </div>
                                                <?php
                                            }
                                            
                                            $req->closeCursor(); // Termine le traitement de la requête
                                            
                                            if(isset($_POST['type'])) {
                                                $req1 = $bdd->prepare('INSERT INTO stock_canu(date_arrive, types, etat, zone_stockage, commentaire, pseudo)
                                                                    VALUES(:date_arrive, :types, :etat, :zone_stockage, :commentaire, :pseudo)');
                                        
                                                $req1->execute(array(
                                                    'date_arrive' => htmlspecialchars($_POST['date']),
                                                    'types' => htmlspecialchars($_POST['type']),
                                                    'etat' => htmlspecialchars($_POST['etat']),
                                                    'zone_stockage' => htmlspecialchars($_POST['zone']),
                                                    'commentaire' => htmlspecialchars($_POST['commentaire']),
                                                    'pseudo' => htmlspecialchars($_SESSION['pseudo'])               
                                                    ));
                                    
                                                $req1->closeCursor(); // Termine le traitement de la requête
                                                ?>
                                                <script>
                                                    window.location.replace("http://canhumanitaire.fr/bdd/stock.php");
                                                </script>
                                                <?php
                                            }
                                        ?>
                                        <div class="form-group">
                                            <p>Date d'arrivée : </p><input type="date" name="date"/>
                                        </div>
                                        <div class="form-group">
                                            <p>Type : </p>
                                                <select name="type" id="type-select">
                                                    <option value="Fauteuil roulant">Fauteuil roulant</option>
                                                    <option value="Fauteuil electrique">Fauteuil roulant électrique</option>
                                                    <option value="Lit médical">Lit médical</option>
                                                    <option value="Béquille">Béquille</option>
                                                    <option value="Déambulateur">Déambulateur</option>
                                                    <option value="Autre">Autre, spécifié en commentaire</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <p>Etat : </p>
                                                <select name="etat" id="etat-select">
                                                    <option value="Reçu">Reçu</option>
                                                    <option value="En cours de réparation">En cours de réparation</option>
                                                    <option value="Réparée">Réparée</option>
                                                    <option value="Envoyé">Envoyé</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <p>Zone de stockage : </p>
                                                <select name="zone" id="etat-select">
                                                    <option value="Arrivage">Arrivage</option>
                                                    <option value="En cours de réparation">En cours de réparation</option>
                                                    <option value="Réparée">Réparée</option>
                                                    <option value="Parti">Parti</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <p>Commentaire : </p><textarea name="commentaire"></textarea>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="submit" value="Enregistrer"/>
                                        </div>
                                    </form>
                                </div>
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