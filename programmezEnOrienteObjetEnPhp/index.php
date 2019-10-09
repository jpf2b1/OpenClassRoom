<?php


//AULODOADER POUR MES CLASS
function autoloadClass($class){
    require 'myClasses/'.$class.'.php';
}
spl_autoload_register('autoloadClass');


$perso001 = new Personnages([
  'nom' => 'toto',
  'forcePerso' => 16,
  'degats' => 20,
  'niveau' => 66,
  'experience' => 12
]);




//CONNEXION A LA BASE DE DONNEES
$bdd = new PDO('mysql:host=localhost;dbname=personnages;charset=utf8', 'root', '');
$manager = new PersonnagesManager($bdd);

$manager->add($perso001);

/* 
// REQUETTE SQL POU AFFICHER TOUS LES ELEMENTS CONTENU DS LA BASE DE DONNEES
$request = $bdd->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM perso');
    
while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
{
  $perso = new Personnages($donnees);   
  echo 'Nom: '.$perso->nom().' , '.$perso->forcePerso().'<br>';
}
$request->closeCursor();
*/

