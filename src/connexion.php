<?php 
include ("../src/myfunctions.php");
$errorlogin="";
$errorpassword="";
$message="";
if (isset($_POST['connexion'])) {
    $login=$_POST['login'];
    $pasword=$_POST['password'];
   /* if (empty($login)) {
        $errorlogin="Le Login ne doit pas etre vide";
    }elseif(!is_valid_email($login)){
        $errorlogin="Le login n'est pas valide";
    }
    if (empty($pasword)) {
        $errorpassword="Le mot de passe ne doit pas etre vide";
    }
    */
    if (!valid_connection($login,$pasword)) {
        $message="Le login et le mot de passe ne corresponde pas";
    }else {
        $datafromJson=valid_connection($login,$pasword);
        echo $datafromJson->login;
        echo $datafromJson->password;
        echo $datafromJson->role;
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../asset/css/styleconnexion.css">
</head>
<body>
<div class="principal">
    <div class="header">
    <img src="../asset/images/saquiz.png" alt="">
    <h3> Le plaisir de jouer </h3>
    </div>
    <div id="form">
    <form method="post" action="">
            <div id="formheader">
                <img src="images/close.jpg" alt="">
            <h4> Login Form </h4>
           
            </div>

            <p><input type="text" name="login" placeholder="Login" class="login" > </p>
        <p><input type="password" name="password" placeholder="Password" class="password"> </p>
    <p>
        <input type="submit" name="connexion" value="Connexion" class="connexion">
        <div id="lien">
        <a href="inscriptionjoueur.php">S’inscrire Connexion pour jouer?</a>
        </div>
    </p>
    </form>
    </div>

</div>
</body>
</html>