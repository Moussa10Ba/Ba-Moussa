<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
     <link rel="stylesheet" href="./asset/css/style.css">
</head>
<body>
    <div class="header">
        <div class="logo"></div>
        <div class="header-text"> Le plaisir de jouer</div>
    </div>
    <div class="content">
    <?php
    session_start();
        require_once("src/function.php");

        if (isset($_GET['lien'])) {
            if($_GET['lien']=="acceuil") {
                 require_once("src/admin.php");
            }if($_GET['lien']=="jeux"){
                require_once("src/jeux.php");
            }
        }
        else{
            if (isset($_GET['statut']) && $_GET['statut']==="logout") {
                deconnexion();
            }
            require_once("src/connexion.php");
        }
        
    ?>
    
    </div>

</body>
</html>