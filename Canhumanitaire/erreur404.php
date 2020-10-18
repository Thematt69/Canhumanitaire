<!DOCTYPE html>
<html lang="fr">
    <head>
        
        <?php 
            header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)
            include_once("bdd/access/google_analytics.php");
        ?>
        
        <title>Canhumanitaire | Erreur 404</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="images/logo.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <META NAME="TITLE" CONTENT="Canhumanitaire | Erreur 404">
        <META NAME="AUTHOR" CONTENT="Matthieu Devilliers">
        <META NAME="DESCRIPTION" CONTENT="Page Erreur 404">
        <META NAME="KEYWORDS" CONTENT="association, canhumanitaire, réparation, fauteuil, organisation à but non lucratif, cité scolaire sembat seguin, lycée marcel sembat, lycée professionelle marc seguin">
        <META NAME="OWNER" CONTENT="Canhumanitaire">
        <META NAME="ROBOTS" CONTENT="noindex">
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500|Gaegu:700" rel="stylesheet">
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
        <link rel="stylesheet" type="text/css" href="/fonts/business/font/flaticon.css">

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>

    <body>

        <?php include("header.php"); ?>
        
        <div class="block-31" style="position: relative;">
            <div class="owl-carousel loop-block-31 ">
                <div class="block-30 block-30-sm item" style="background-image: url('images/Street_Art_Canhumanitaire.jpg');" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-10 text-center">
                                <h2 class="heading">Erreur 404</h2>
                                <h3 class="heading">Cette page semble introuvable</h3>
                                <form action="http://canhumanitaire.fr">
                                    <input onclick="accueil()" type="submit" value="Revenir à la page d'accueil" class="btn btn-primary py-3 px-5">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <?php include("footer.php"); ?>
    
    </body>
</html>