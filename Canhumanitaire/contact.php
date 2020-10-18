<!DOCTYPE html>
<html lang="fr">
  <head>
        
    <?php 
      header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)
      include_once("bdd/access/google_analytics.php");
    ?>
        
    <title>Canhumanitaire | Contact</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <META NAME="TITLE" CONTENT="Canhumanitaire | Contact">
    <META NAME="AUTHOR" CONTENT="Matthieu Devilliers">
    <META NAME="DESCRIPTION" CONTENT="Formulaire de contact de l'association Canhumanitaire">
    <META NAME="KEYWORDS" CONTENT="association, canhumanitaire, réparation, fauteuil, organisation à but non lucratif, cité scolaire sembat seguin, lycée marcel sembat, lycée professionelle marc seguin">
    <META NAME="OWNER" CONTENT="Canhumanitaire">
    <META NAME="ROBOTS" CONTENT="index,all">
    
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
      <div class="block-30 block-30-sm item" style="background-image: url('images/999997.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="heading">Nous contacter</h2>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row block-9">
        <div class="col-md-12 pr-md-5">
            <?php
                if($_POST['g-recaptcha-response']==true) {
                  ?>
                  <div class="col-12">
                      <div class="form-group">
                          <h4>Le message a bien été envoyé. Vous aurez une réponse dans les plus brefs délais.</h4>
                      </div>
                  </div>
                  <?php
                }
          ?>
        </div>
        <div class="col-md-6 pr-md-5">
          <form method="POST" action="contact.php">
            <div class="form-group">
              <input name="nom" type="text" class="form-control px-3 py-3" placeholder="Nom / prénom" required>
            </div>
            <div class="form-group">
              <input name="mail" type="email" class="form-control px-3 py-3" placeholder="Adresse mail" required>
            </div>
            <div class="form-group">
              <select name="objet" class="form-control">
                <option value="Information">Demande d'information</option>
                <option value="Problème_web">Problème sur le site</option>
                <option value="Problème_réglementation">Modifications et/ou suppression des données personnelles</option>
                <option value="Suggestion">Suggestion</option>
                <option value="Autre">Autre, précisez...</option>
              </select>
            </div>
            <div class="form-group">
              <textarea name="message" cols="30" rows="7" class="form-control px-3 py-3" placeholder="Message" required></textarea>
            </div>
            <div class="form-group">
              <div class="g-recaptcha" data-sitekey="6LfZ8b0UAAAAALAGQFRGvFqCksJaXyXC-3Xa0_ld"></div>
            </div>
            <div class="form-group">
              <input type="submit" value="Envoyer" class="btn btn-primary py-3 px-5">
            </div>
            <?php
                if($_POST['g-recaptcha-response'])
                {
                    
                    // Destinataires
                    $to  = 'WebMaster Canhumanitaire <devilliers.matthieu@gmail.com>';

                    // Sujet
                    $subject = 'Formulaire de contact - Canhumanitaire';
            
                    // Message
                    $contenu = '
                    <html>
                        <body>
                            <h4>Voici les réponses au formulaire de contact</h4>
                            <br>
                            <p><strong>Email : </strong>' . htmlspecialchars($_POST['mail']) . '</p>
                            <p><strong>Nom/Prénom : </strong>' . htmlspecialchars($_POST['nom']) . '</p>
                            <p><strong>Object : </strong>' . htmlspecialchars($_POST['objet']) . '</p>
                            <p><strong>Message : </strong>' . htmlspecialchars($_POST['message']) . '</p>
                        </body>
                    </html>
                    ';

                    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                    $headers[] = 'MIME-Version: 1.0';
                    $headers[] = 'Content-type: text/html; charset=utf-8';
                    $headers[] = 'Reply-To: ' . htmlspecialchars($_POST['mail']);
                    $headers[] = 'From: Site Canhumanitaire <mail_php@canhumanitaire.fr>';

                    // Envoi du mail
                    mail($to, $subject, $contenu, implode("\r\n", $headers));

                    ///////////////////////////////////////////////////////////////////////////////////////

                    // Destinataires
                    $to1  = htmlspecialchars($_POST['mail']);

                    // Sujet
                    $subject1 = 'Accusé de réception - Canhumanitaire';
            
                    // Message
                    $contenu1 = '
                    <html>
                        <body>
                            <p>Bonjour,</p>
                            <p>Nous avons bien reçu votre demande, nous ferons de notre mieux pour répondre dans les plus brefs délais.</p>
                            <br>
                            <h4>Résumé de votre demande : </h4>
                            <p><strong>Email : </strong>' . htmlspecialchars($_POST['mail']) . '</p>
                            <p><strong>Nom/prénom : </strong>' . htmlspecialchars($_POST['nom']) . '</p>
                            <p><strong>Object : </strong>' . htmlspecialchars($_POST['objet']) . '</p>
                            <p><strong>Message : </strong>' . htmlspecialchars($_POST['message']) . '</p>
                            <br>
                            <p>L\'association Canhumanitaire</p>
                        </body>
                    </html>
                    ';

                    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                    $headers1[] = 'MIME-Version: 1.0';
                    $headers1[] = 'Content-type: text/html; charset=utf-8';
                    $headers1[] = 'Reply-To: WebMaster Canhumanitaire <devilliers.matthieu@gmail.com>';
		                $headers1[] = 'From: Site Canhumanitaire <mail_php@canhumanitaire.fr>';


                    // Envoi du mail
                    mail($to1, $subject1, $contenu1, implode("\r\n", $headers1));
                }
            ?>
          </form>
        </div>

        <div class="col-md-6" id="Map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2785.7474372555935!2d4.878134551498999!3d45.71610337900209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4c21a279dfb4f%3A0x426e8e3fc1851ce!2sCanhumanitaire!5e0!3m2!1sfr!2sfr!4v1560192372527!5m2!1sfr!2sfr" width="500" height="500" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

<?php include("footer.php"); ?>
  
</body>
</html>