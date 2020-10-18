<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
<aside id="colorlib-aside" role="complementary" class="js-fullheight">
    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            <li><a href="déconnexion.php">Se déconnecter</a></li>
            <li><a href="stock.php" title="Voir le stock">Stock</a></li>
            <li><a href="enregistrement.php" title="Ajouter/Enregistrer un nouveau matériel">Enregistrement</a></li>
            <li><a href="modification.php" title="Modifier un matériel existant">Modification</a></li>
            <?php 
                if($_SESSION['pseudo']=='admin' || $_SESSION['pseudo']=='prof') {
                    ?>
                        <li><a href="suppression.php" title="Supprimer un matériel existant">Suppression</a></li>
                    <?php
                }
                if($_SESSION['pseudo']=='admin') {
                    ?>
                        <li><a href="stats.php" title="Permet d'afficher certaines statistiques">Statistiques</a></li>
                    <?php
                }
            ?>
        </ul>
    </nav>

    <div class="colorlib-footer">
        <h1 id="colorlib-logo" class="mb-4"><a href="stock.php"><img src="images/logo.png" ></a></h1>
        <p class="pfooter">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <a href="https://www.linkedin.com/in/matthieu-devilliers-b6a36b15a" title="Profil Linkedin" target="_blank">Matthieu Devilliers</a> | Copyright &copy; <script>document.write(new Date().getFullYear());</script> Tous droits réservés | This template is made with by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
    </div>
</aside> <!-- END COLORLIB-ASIDE -->