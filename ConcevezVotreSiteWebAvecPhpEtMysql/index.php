<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon super site</title>
</head>
<body>

<!--
    <p>
        <a href="bonjour.php?nom=Fernandez&amp;prenom=Philippe&amp;repetition=10">Dis-moi bonjour</a>
    </p>
-->
<!--
    <form action="cible.php" method="POST">
        <p><label>Mot de passe : <input type="text" name="prenom"></label></p>
        <p><input type="submit" /></p>
    </form>
-->
    <form action="bdd.php" method="POST">
        <p><label>Choisir NES ou PC : <input type="text" name="maconsole"></label></p>
        <p><input type="submit" /></p>
    </form>
</body>
</html>