<div class="col-md-12">
    <div class="blog-entry ftco-animate d-md-flex">
        <!--<a href="single.html" class="img img-2" style="background-image: url(images/image_1.jpg);"></a>-->
        <div class="text text-2 pl-md-12">
            <h3 class="mb-2"><?php echo $donnees['types'] ?> : N°<?php echo $donnees['ID'] ?></h3><!-- titre -->
            <div class="meta-wrap">
                <p class="meta">
                    <span title="Date d'arrivée"><i class="icon-calendar mr-2"></i><?php echo $donnees['date_arrive'] ?></span> <!-- date -->
                    <?php
                        if($donnees['types']=='Fauteuil roulant') {
                            ?><span title="Type"><a href="stock.php?type=Fauteuil roulant"><i class="icon-folder-o mr-2"></i> <?php echo $donnees['types'] ?></a></span> <!-- types --><?php
                        }
                        else if($donnees['types']=='Fauteuil electrique') {
                            ?><span title="Type"><a href="stock.php?type=Fauteuil electrique"><i class="icon-folder-o mr-2"></i> <?php echo $donnees['types'] ?></a></span> <!-- types --><?php
                        }
                        else if($donnees['types']=='Lit médical') {
                            ?><span title="Type"><a href="stock.php?type=Lit médical"><i class="icon-folder-o mr-2"></i> <?php echo $donnees['types'] ?></a></span> <!-- types --><?php
                        }
                        else if($donnees['types']=='Béquille') {
                            ?><span title="Type"><a href="stock.php?type=Béquille"><i class="icon-folder-o mr-2"></i> <?php echo $donnees['types'] ?></a></span> <!-- types --><?php
                        }
                        else if($donnees['types']=='Déambulateur') {
                            ?><span title="Type"><a href="stock.php?type=Déambulateur"><i class="icon-folder-o mr-2"></i> <?php echo $donnees['types'] ?></a></span> <!-- types --><?php
                        }
                        else {
                            ?><span title="Type"><a href="stock.php?type=Autre"><i class="icon-folder-o mr-2"></i> <?php echo $donnees['types'] ?></a></span> <!-- types --><?php
                        }


                        if($donnees['etat']=='Reçu') {
                            ?><span title="Etat"><a href="stock.php?etat=Reçu"><i class="icon-comment2 mr-2"></i> <?php echo $donnees['etat'] ?></a></span> <!-- état --><?php
                        }
                        else if($donnees['etat']=='En cours de réparation') {
                            ?><span title="Etat"><a href="stock.php?etat=En cours de réparation"><i class="icon-comment2 mr-2"></i> <?php echo $donnees['etat'] ?></a></span> <!-- etat --><?php
                        }
                        else if($donnees['etat']=='Réparée') {
                            ?><span title="Etat"><a href="stock.php?etat=Réparée"><i class="icon-comment2 mr-2"></i> <?php echo $donnees['etat'] ?></a></span> <!-- etat --><?php
                        }
                        else {
                            ?><span title="Etat"><a href="stock.php?etat=Envoyé"><i class="icon-comment2 mr-2"></i> <?php echo $donnees['etat'] ?></a></span> <!-- etat --><?php
                        }


                        if($donnees['zone_stockage']=='Arrivage') {
                            ?><span title="Zone de stockage"><a href="stock.php?zone_stockage=Arrivage"><i class="icon-comment2 mr-2"></i> <?php echo $donnees['zone_stockage'] ?></a></span> <!-- zone_stockage --><?php
                        }
                        else if($donnees['zone_stockage']=='En cours de réparation') {
                            ?><span title="Zone de stockage"><a href="stock.php?zone_stockage=En cours de réparation"><i class="icon-comment2 mr-2"></i> <?php echo $donnees['zone_stockage'] ?></a></span> <!-- zone_stockage --><?php
                        }
                        else if($donnees['zone_stockage']=='Réparée') {
                            ?><span title="Zone de stockage"><a href="stock.php?zone_stockage=Réparée"><i class="icon-comment2 mr-2"></i> <?php echo $donnees['zone_stockage'] ?></a></span> <!-- zone_stockage --><?php
                        }
                        else {
                            ?><span title="Zone de stockage"><a href="stock.php?zone_stockage=Parti"><i class="icon-comment2 mr-2"></i> <?php echo $donnees['zone_stockage'] ?></a></span> <!-- zone_stockage --><?php
                        }
                    ?>
                </p>
            </div>
            <p class="mb-4"><?php echo $donnees['commentaire'] ?></p><!-- commentaire -->
        </div>
    </div>
</div>