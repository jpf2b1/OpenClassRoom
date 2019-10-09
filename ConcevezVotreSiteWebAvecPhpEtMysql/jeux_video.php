<?php


$bdd = new PDO('mysql:host =localhost; dbname=testopenclassrooms','root','');

//$response = $bdd->query('SELECT console, nom FROM jeux_video WHERE console="PC" OR console="NES" ORDER BY nom DESC LIMIT 3' );

//while($donnees=$response->fetch()){
//    echo '<table><td style="border: 1px solid ; border-collapse:collapse ; " >'.$donnees['console'].' --------> '.$donnees['nom'].'</td></table>';
//}

/* 
$requete = $bdd->prepare('SELECT console, nom FROM jeux_video WHERE console=?' );
$requete->execute(['NES']);

while($donnees=$requete->fetch()){
    echo '<table><td style="border: 1px solid ; border-collapse:collapse ; " >'.$donnees['console'].' --------> '.$donnees['nom'].'</td></table>';
}
*/

$requete = $bdd->prepare('SELECT UPPER(nom) AS nom_majuscule, console, prix  FROM jeux_video WHERE console= ?');
$requete->execute(array($_GET['console']));

while($donnees=$requete->fetch()){
    echo '<p>'.$donnees['console'].' -- '.$donnees['nom_majuscule'].' --> '.$donnees['prix'].' Euros</p>';
}