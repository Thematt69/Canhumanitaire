<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=185.98.131.93;dbname=canhu1234127;charset=utf8', 'canhu1234127', 'Q3V8Yx4m2Q', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
?>