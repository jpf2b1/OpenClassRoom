<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>
        <?php
            echo $_POST['prenom'].'<br>';

            if($_POST['prenom'] == 'kangourou'){
                echo 'Bonjour '. htmlspecialchars($_POST['prenom']); 
            }else{
                echo 'mot de passe incorect';
            }
          
            
                
        ?>
        <pre>
            <?php
                print_r($_POST['prenom']);
            ?>
        </pre>
    </p>
</body>
</html>