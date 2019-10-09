<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faille XSS</title>
</head>
<body>
    <form method="post" action="connexion.php" >
        <label for="pseudo">Pseudo</label> :<input type="text" name="pseudo" />
        <label for="password">Password</label> :<input type="password" name="password" />
        <input type="submit" value="Connexion" />
    </form>
</body>
</html>