<h1>Joueur</h1>

<?php
is_connect();
echo ": ".$_SESSION['user']['nom']." ".$_SESSION['user']['prenom'].": ".$_SESSION['user']['profil'];
?>
<a href="index.php?statut=logout">Deconnexion</a>