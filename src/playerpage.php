<?php
session_start();
if (isset($_SESSION)) {
    echo "Player Name: ".$_SESSION['nom']." ".$_SESSION['prenom']."<br>";
if (isset($deconnexion)) {
    header("Location: connexion.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Player</h1>
    <form action="connexion.php" method="post">
    <p><input type="submit" value="Déconnexion" name="deconnexion" /></p>
</form>
    
</body>
</html>
<?php
}

?>
