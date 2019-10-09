<?php
// On démarre la session AVANT d'écrire du code HTML(memorisation du pseudo)
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="monstyle.css"/>
        <title>Mini-chat</title>
    </head>
    <body>
        <div>
            <form action="minichat_post.php" method="POST">   
                <p>
                    <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" value="<?php echo isset($_SESSION['pseudo']) ? htmlspecialchars($_SESSION['pseudo']) : '' ?>"/><br/>
                    <label for="message">Message</label> : <input type="text" name="message"/><br/>
                    <input type="submit" value="Envoyer">
                </p>
            </form>
        </div>

        <?php
            // Connexion à la base de données
            try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
                }
            catch(Exception $e)
                {
                    die('Erreur !!! : ' .$e->getMessage())  OR die(print_r($bdd->errorInfo()));
                }

            // Récupération des 10 derniers messages
            // Formatage de la date pour standard français
            $reponse = $bdd->query('SELECT DATE_FORMAT (date_ajout, "Le %d/%m à %hh%i:%s"), pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

            // Affichage de chaque message 
            // Toutes les données sont protégées par htmlspecialchars
            while ($donnees = $reponse->fetch())
            {
                echo '<div><p class="messages"><span class="utilisateur"><span class="date">'. htmlspecialchars( $donnees['DATE_FORMAT (date_ajout, "Le %d/%m à %hh%i:%s")']).'</span>'.'<span id=pseudo><strong> '. htmlspecialchars($donnees['pseudo']) . ' :</strong> </span></span><p class="commentaire">' . htmlspecialchars($donnees['message']) . '</p></p></div>';
            }

            $reponse->closeCursor();
        ?>
        
    </body>
</html>