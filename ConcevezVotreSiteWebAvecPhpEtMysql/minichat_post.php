<?php
session_start();

        //Verification que les chanps pseudo et message soit remplis
        if (isset($_POST['pseudo']) AND isset($_POST['message']) AND $_POST['pseudo'] != '' AND $_POST['message'] != ''){
                
                // mémorisation du pseudo pour la session en cours
                $_SESSION['pseudo'] = $_POST['pseudo'];

                // Connexion à la base de données evec gestion des erreurs
                try
                {
                        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
                }
                catch (Exception $e) 
                { 
                        die('Erreur : ' .$e->getMessage())  or die(print_r($bdd->errorInfo())); 
                }

                // Insertion du message à l'aide d'une requête préparée (protection contre injections SQL)
                $req = $bdd->prepare('INSERT INTO minichat (date_ajout, pseudo, message) VALUES(NOW(), ?, ?)');
                $req->execute(array($_POST['pseudo'], $_POST['message']));

                // Rediriection vers minichat.php :
                header('Location: minichat.php');

        }else{
                // Sinon redirection vers le minichat : les formulaires sans pseudo et/ou sans message ne sont pas traités 
                header('Location: minichat.php');
                
        }
















?>