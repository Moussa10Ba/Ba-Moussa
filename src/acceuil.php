

<?php

is_connect();

if (isset($_GET['lien']) && $_GET['lien']==="listeJoueurs") {
    require_once("src/listeJoueur.php");
}
        //require_once("src/inscription.php");
        


?>


<div class="admincontainer">
    <div class="adminheader">
                <div class="textheader">CREEZ ET PARAMETREZ VOS QUIZZ</div>
             <a href="index.php?statut=logout"><input type="button" name="deconnexion" class="btn-deconnexion" value="Deconnexion"/></a>
                
    </div>

    <div class="blocgauche">
            <div class="headergauche">
                    <div class="info"> <?php echo $_SESSION['user']['nom'];?></div>
                    <div class="info"> <?php echo $_SESSION['user']['prenom'];?></div>
                    <div class="photoUserconnecte"></div>
            </div>
        <div class="blocbody">
             <div class="menu">
                <p>
                <a href="">Liste  Questions</a>
                    <img src="asset/images/ic-liste.png" alt="">
                </p>            
            </div> 
            <div class="menu" >
                <p>
                <a href="index.php?lien=acceuil&page=creeradmin">Creer Admin</a>
                    <img src="asset/images/ic-ajout.png" alt="">
                </p>            
            </div>  

            <div class="menu">
                <p>
                <a href="index.php?lien=acceuil&page=joueur">Liste  joueurs</a>
                    <img src="asset/images/ic-liste.png" alt="">
                </p>            
            </div>  

            <div class="menu">
                <p>
                <a href="#">Creer  Questions</a>
                    <img src="asset/images/ic-ajout-active.png" alt="">
                </p>            
            </div> 
        </div>    

    </div>
    <div class="blocdroite">
    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'joueur':
                require_once("listeJoueurs.php");
                break;
            
            case 'creeradmin':
                require_once("inscription.php");
            break;
        }
    }else{
        require_once("inscription.php");
    }
    ?>
    
    </div>

</div>

