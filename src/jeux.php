
<?php
/*
is_connect();
*/
?>


<div class="containerjeux">
            <div class="jeuxheader">    
                <div class="imagejoueur"></div>
                <div class="infojoueur">
                   <?php
                        echo ": ".$_SESSION['user']['nom']." ".$_SESSION['user']['prenom'];
                   ?>
                </div>
                <div class="textheaderjeux">BIENVENUE SUR LA PLATFORME DE JEUX DE QUIZZ <br> JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE</div>
                 <a href="index.php?statut=logout" style="color:red;"><input type="button" name="deconnexion" class="btn-deconnexionjeux" value="Deconnexion"/></a>
                
            </div>

    <div class="bodyjeux">
        <div class="gauchejeux">
            <div class="headergauche"></div>
            <div class="scorejeux"></div>
            <div class="questionjeux"> </div>
        </div>

        <div class="droitejeux">
       <p><button class="btndroitetop">Top Score</button> <button class="btndroitemon">Mon Meilleur Score</button></p> 
       
            <div class="tablejeux"></div>
        </div>



    </div>

</div>