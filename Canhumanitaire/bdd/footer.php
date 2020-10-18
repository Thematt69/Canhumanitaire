<?php
    include_once("access/bdd.php");
    
    $req1 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE types="Fauteuil roulant"');
    $req1->execute(array());
    while($donnees = $req1->fetch()) {
        $nbr_FauteuilRoulant = $donnees['COUNT(*)'];
    }
    $req1->closeCursor();

    $req2 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE types="Fauteuil electrique"');
    $req2->execute(array());
    while($donnees = $req2->fetch()) {
        $nbr_FauteuilRoulantElectrique = $donnees['COUNT(*)'];
    }
    $req2->closeCursor();

    $req3 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE types="Lit médical"');
    $req3->execute(array());
    while($donnees = $req3->fetch()) {
        $nbr_LitMedical = $donnees['COUNT(*)'];
    }
    $req3->closeCursor();

    $req4 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE types="Béquille"');
    $req4->execute(array());
    while($donnees = $req4->fetch()) {
        $nbr_Bequille = $donnees['COUNT(*)'];
    }
    $req4->closeCursor();

    $req5 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE types="Déambulateur"');
    $req5->execute(array());
    while($donnees = $req5->fetch()) {
        $nbr_Deambulateur = $donnees['COUNT(*)'];
    }
    $req5->closeCursor();

    $req6 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE types="Autre"');
    $req6->execute(array());
    while($donnees = $req6->fetch()) {
        $nbr_Autre = $donnees['COUNT(*)'];
    }
    $req6->closeCursor();

    $req7 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE etat="Reçu"');
    $req7->execute(array());
    while($donnees = $req7->fetch()) {
        $nbr_EtatRecu = $donnees['COUNT(*)'];
    }
    $req7->closeCursor();

    $req8 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE etat="En cours de réparation"');
    $req8->execute(array());
    while($donnees = $req8->fetch()) {
        $nbr_EtatCoursReperation = $donnees['COUNT(*)'];
    }
    $req8->closeCursor();

    $req9 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE etat="Réparée"');
    $req9->execute(array());
    while($donnees = $req9->fetch()) {
        $nbr_EtatReparee = $donnees['COUNT(*)'];
    }
    $req9->closeCursor();

    $req10 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE etat="Envoyé"');
    $req10->execute(array());
    while($donnees = $req10->fetch()) {
        $nbr_EtatEnvoye = $donnees['COUNT(*)'];
    }
    $req10->closeCursor();

    $req11 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE zone_stockage="Arrivage"');
    $req11->execute(array());
    while($donnees = $req11->fetch()) {
        $nbr_ZoneArrivage = $donnees['COUNT(*)'];
    }
    $req11->closeCursor();

    $req12 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE zone_stockage="En cours de réparation"');
    $req12->execute(array());
    while($donnees = $req12->fetch()) {
        $nbr_ZoneCoursReparation = $donnees['COUNT(*)'];
    }
    $req12->closeCursor();

    $req13 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE zone_stockage="Réparée"');
    $req13->execute(array());
    while($donnees = $req13->fetch()) {
        $nbr_ZoneReparee = $donnees['COUNT(*)'];
    }
    $req13->closeCursor();

    $req14 = $bdd->prepare('SELECT COUNT(*) FROM stock_canu WHERE zone_stockage="Parti"');
    $req14->execute(array());
    while($donnees = $req14->fetch()) {
        $nbr_ZoneParti = $donnees['COUNT(*)'];
    }
    $req14->closeCursor()
?>
<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
    <div class="sidebar-box pt-md-4">
        <form action="stock.php" method="POST" class="search-form">
            <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" name="ID_serch" placeholder="Rechercher par ID">
            </div>
        </form>
    </div>
    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Type</h3>
        <ul class="categories">
            <li><a href="stock.php?type=Fauteuil roulant">Fauteuil roulant<span>(<?php echo $nbr_FauteuilRoulant; ?>)</span></a></li>
            <li><a href="stock.php?type=Fauteuil electrique">Fauteuil roulant électrique<span>(<?php echo $nbr_FauteuilRoulantElectrique; ?>)</span></a></li>
            <li><a href="stock.php?type=Lit médical">Lit médical<span>(<?php echo $nbr_LitMedical; ?>)</span></a></li>
            <li><a href="stock.php?type=Béquille">Béquille<span>(<?php echo $nbr_Bequille; ?>)</span></a></li>
            <li><a href="stock.php?type=Déambulateur">Déambulateur<span>(<?php echo $nbr_Deambulateur; ?>)</span></a></li>
            <li><a href="stock.php?type=Autre">Autre<span>(<?php echo $nbr_Autre; ?>)</span></a></li>
        </ul>
    </div>
    <br>
    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Etat</h3>
        <ul class="categories">
            <li><a href="stock.php?etat=Reçu">Reçu<span>(<?php echo $nbr_EtatRecu; ?>)</span></a></li>
            <li><a href="stock.php?etat=En cours de réparation">En cours de réparation<span>(<?php echo $nbr_EtatCoursReperation; ?>)</span></a></li>
            <li><a href="stock.php?etat=Réparée">Réparée<span>(<?php echo $nbr_EtatReparee; ?>)</span></a></li>
            <li><a href="stock.php?etat=Envoyé">Envoyé<span>(<?php echo $nbr_EtatEnvoye; ?>)</span></a></li>
        </ul>
    </div>
    <br>
    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Zone de stockage</h3>
        <ul class="categories">
            <li><a href="stock.php?zone_stockage=Arrivage">Arrivage<span>(<?php echo $nbr_ZoneArrivage; ?>)</span></a></li>
            <li><a href="stock.php?zone_stockage=En cours de réparation">En cours de réparation<span>(<?php echo $nbr_ZoneCoursReparation; ?>)</span></a></li>
            <li><a href="stock.php?zone_stockage=Réparée">Réparée<span>(<?php echo $nbr_ZoneReparee; ?>)</span></a></li>
            <li><a href="stock.php?zone_stockage=Parti">Parti<span>(<?php echo $nbr_ZoneParti; ?>)</span></a></li>
        </ul>
    </div>
    <br>
    <!--<div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Archives</h3>
        <ul class="categories">
            <li><a href="#">Septembre 2018</a></li>
            <li><a href="#">Août 2018</a></li>
            <li><a href="#">Juillet 2018</a></li>
            <li><a href="#">Juin 2018</a></li>
            <li><a href="#">Mai 2018</a></li>
            <li><a href="#">Avril 2018</a></li>
        </ul>
    </div>-->
</div><!-- END COL -->