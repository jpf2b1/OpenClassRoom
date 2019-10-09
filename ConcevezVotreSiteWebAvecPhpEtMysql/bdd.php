<?php


$maconsole = $_POST['maconsole'];

$bdd= new PDO ('mysql:host=localhost; dbname=testopenclassrooms','root','' );

$request = $bdd->prepare('SELECT console, nom FROM jeux_video WHERE console=?');
$request->execute(array($maconsole));


while($donnees=$request->fetch()){
    echo '<p><strong>Platforme : </strong>'.$donnees['console'].' ==> <strong>Jeux : </strong>'.$donnees['nom'].'</p>';
}