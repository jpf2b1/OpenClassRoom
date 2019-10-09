<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon super site</title>
</head>
<body>
    <p>

        
        <?php 

        if(isset($_GET['nom']) AND isset($_GET['prenom']) AND isset($_GET['repetition'])){
                $nbRepetitions = (int) $_GET['repetition'];
                    if($nbRepetitions <= 30){
                        for($repeter = 1; $repeter<=$nbRepetitions; $repeter++){
                            echo  '<p> Bonjour '.$_GET['nom'].' '.$_GET['prenom'].'</p>'; 
                        }
                    }else{
                        echo 'Trop de répétitions !!!';
                    }      
            }else{
                echo 'erreur de saisi';
            }    
        ?>
    </p>
</body>
</html>
















