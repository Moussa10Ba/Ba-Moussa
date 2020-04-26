<?php
is_connect();
$t=getData();
$tabscore=array();
$_SESSION['t']=$t;
$totalSup=count($t);
define("NBPARPAGE",1);
$nbrPageSup=ceil($totalSup/NBPARPAGE);

?>


<div class="containerjeux">
            <div class="jeuxheader">    
                <div class="imagejoueur">
                    <img src="asset/images/profil/<?php echo $_SESSION['user']['photo'];?>" alt="" class="avatarprofil">
                </div>
                <div class="infojoueur">
                   <?php
                        echo $_SESSION['user']['nom']." ".$_SESSION['user']['prenom'];
                   ?>
                </div>
                <div class="textheaderjeux">BIENVENUE SUR LA PLATFORME DE JEUX DE QUIZZ <br> JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE</div>
                 <a href="index.php?statut=logout" style="color:red;"><input type="button" name="deconnexion" class="btn-deconnexionjeux" value="Deconnexion"/></a>
                
            </div>

    <div class="bodyjeux">
        <div class="gauchejeux">
            <div class="headergauche"></div>
            <div class="scorejeux">
                    <?php echo $_SESSION['user']['score'];?>

            </div>

                <div class="questionjeux">         
                <?php
                                if (isset($_GET['page'])) {
                                $pageActuelle=$_GET['page'];
                                if ($pageActuelle>$nbrPageSup) {
                                    $pageActuelle=$nbrPageSup;
                                }
                                }else{
                                $pageActuelle=1;
                                } 
                                $indiceDebut=($pageActuelle-1)*NBPARPAGE;
                                $indiceFin=$indiceDebut+NBPARPAGE-1;
                    
                                echo "Page Actuelle ".$pageActuelle;
                                echo "<br>";
                                echo "Nombre de Pages ".$nbrPageSup;
                                ?>
                                <div class="paginationjeux">
                                <?php
                                if($pageActuelle<$nbrPageSup){
                                    $page=$pageActuelle+1;
                                    ?>
                                    <a href="index.php?lien=jeux&page=<?php echo $page?>"><input type="button" name="suivant" class="btn-suivant" value="Suivant"/></a>
                                    <?php
                                }
                                if($pageActuelle!=1){
                                    $page=$pageActuelle-1;
                                    ?>
                                    <a href="index.php?lien=jeux&page=<?php echo $page?>"><input type="button" name="precedant" class="btn-precedant" value="Precedant"/></a>
                                    <?php
                                }
                                
                                ?>
                                </div>

                </div>













        </div>

        <div class="droitejeux">
       <p><button class="btndroitetop">Top Score</button> <button class="btndroitemon">Mon Meilleur Score</button></p> 
       
            <div class="tablejeux">
                   <?php 
                   
                   $tab=triTableau($t);
                   ?>
                  <table class="tableaujeux">
                      
                       <?php
                   for ($i=0; $i <5 ; $i++) { 
                    echo "<tr>";
                       echo "<td>".$tab[$i]['nom']."</td>"; 
                       echo "<td class=\"tt\">".$tab[$i]['score']."</td>";
                       echo "</tr>";
                       
                   }
                   echo "<table>";
                   ?>
            
            </div>
        </div>



    </div>

</div>