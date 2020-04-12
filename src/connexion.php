<?php 
session_start();
include ("../src/myfunctions.php");
$errorlogin="";
$errorpassword="";
$message="";
if (isset($_POST['connexion'])) {
    $login=$_POST['login'];
    $pasword=$_POST['password'];
    if (empty($login) && !empty($pasword)) {
        $errorlogin="Le Login ne doit pas etre vide";
    }elseif(!is_valid_email($login)){
        $errorlogin="Le login n'est pas valide";
    }
    if (empty($pasword) && !empty($login) && is_valid_email($login)) {
        $errorpassword="Le mot de passe ne doit pas etre vide";
    }
    
    if (empty($login) && empty($pasword)) {
        $message="Tous les champs sont obligatoire";
       
    }
    if( !empty($login) && !empty($pasword) && !valid_connection($login,$pasword)){
        $message="Le login et le mot de passe ne correspondent pas";
    }if(valid_connection($login,$pasword)) {
        $datafromJson=valid_connection($login,$pasword);
        $_SESSION['nom']=$datafromJson->nom;
        $_SESSION['prenom']=$datafromJson->prenom;
        $_SESSION['login']=$datafromJson->login;
        $_SESSION['password']=$datafromJson->password;
        $_SESSION['role']=$datafromJson->role;
        if ($_SESSION['role']=="admin") {
            header("Location: adminpage.php");
        }else{
            header("Location: playerpage.php");
        }
        
       ?>
           
       <?php
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

            <input type="text" name="login" placeholder="Login" class="login" value="<?php if(!empty($_POST['login'])){echo $login;}?>">                                    
        <input type="password" name="password" placeholder="Password" class="password">
        <div id="error">
            
        <?php 
        if(!empty($message)) {
            echo $message;
        }elseif(!empty($errorlogin)){
            echo $errorlogin;
        }if(!empty($errorpassword)){
            echo $errorpassword;
        }
        ?>
        </div>
        
        <input type="submit" name="connexion" value="Connexion" class="connexion">
        <div id="lien">
        <a href="inscriptionjoueur.php">S’inscrire Connexion pour jouer?</a>
        
        </div>
    
    </form>
    
    </div>
</div>
</body>
</html>