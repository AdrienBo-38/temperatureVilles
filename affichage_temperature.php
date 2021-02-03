<?php

try
{

$bdd = new PDO('mysql:host=localhost;dbname=bdd_temperaturevilles;charset=utf8', 'root', '');
$bdd->query("set lc_time_names ='fr_FR'");

//$ville=htmlspecialchars($_GET['ville']);

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->prepare("SELECT temperature, DATE_FORMAT(last_update, '%d %M %Y à %Hh%i') AS last_update FROM temperaturevilles WHERE ville = ? ");
$reponse->execute(array($_GET['ville']));

while ($donnees = $reponse->fetch())
{
    echo (" le  " . $donnees['last_update'] . " à " . htmlspecialchars(ucfirst($_GET['ville'])) . " il fait actuellement "  . $donnees['temperature'] . "°C" );
}

$reponse->closeCursor();

?>









