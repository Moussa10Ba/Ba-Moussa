<?php
session_start();
echo "Administrator Name: ".$_SESSION['nom']." ".$_SESSION['prenom']."<br>";
if (isset($deconnexion)) {
    session_destroy();
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
    <h1>Admin</h1>
    <a href="connexion.php"><input type="button" value="Déconnexion" name="deconnexion"></a>
    
</body>
</html>