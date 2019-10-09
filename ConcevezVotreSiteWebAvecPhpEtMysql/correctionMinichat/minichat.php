<?php
session_start();

$displayChat = 0;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
    <?php 
    if ($displayChat == 0) { 
        ?>
            <form action="minichat.php" method="post">
                <p>
                    <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" placeholder="pseudo"/> <br />
                    <label for="message">Message</label> :  <input type="text" name="message" id="message" placeholder="Messages"/><br />
                    <input type="submit" value="Envoyer" />
                </p>
            </form>
        <?php
    }
    else {
        ?>
            <form action="minichat.php" method="post">
                <p>
                    <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />
                    <input type="submit" value="Envoyer" />
                </p>
            </form>
        <?php

        // Connexion à la base de données
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        
        // Insertion du pseudo à l'aide d'une requête préparée
        $req = $bdd->prepare('INSERT INTO minichat (pseudo) VALUES(?)');
        $req->execute(array($_POST['pseudo']));

        $req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_message) VALUES(?, ?, NOW())');
        $req->execute(array($_POST['pseudo'], $_POST['message']));

        // Redirection du visiteur vers la page du minichat
        // header('Location: minichat.php?pseudo=' . $_POST['pseudo']);


        // Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT pseudo, message, DAY(date_message) AS jour, MONTH(date_message) AS mois, YEAR(date_message) AS annee, HOUR(date_message) AS heure, MINUTE(date_message) AS minute, SECOND(date_message) AS seconde FROM minichat ORDER BY date_message DESC LIMIT 10');


        if (isset($_GET['pseudo']) && !empty($_GET['pseudo'])) { 
            $_SESSION['username'] = $_GET['pseudo'];

            $displayChat = 1;

            echo ' value="' . $_GET['pseudo'] . '"';
        }
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        while ($donnees = $reponse->fetch())
        {
            $pseudo  = htmlspecialchars($donnees['pseudo']);
            $message = htmlspecialchars($donnees['message']);
            
            $jour    = $donnees['jour'];
            $mois    = $donnees['mois'];
            $annee   = $donnees['annee'];
            $heure   = $donnees['heure'];
            $minute  = $donnees['minute'];
            $seconde = $donnees['seconde'];
            
            $date    = '<p>[' . $jour . '/' . $mois . '/' . $annee . ' ' . $heure . 'h' . $minute . 'm' . $seconde . 's]';

            echo '<strong>' . $pseudo . '</strong> (' . $date . '): ' . $message . '</p>';
        }

        $reponse->closeCursor();
    }
    ?>
    </body>
</html>
