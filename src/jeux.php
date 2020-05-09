<?php
 
is_connect();
$t=getData();
 $tabscore=array();
 $_SESSION['t']=$t;
            $totalSup=count($t);
            define("NBPARPAGE",1);
            $nbrPageSup=ceil($totalSup/NBPARPAGE);
            $tab=getQuestionnaire();
            $_SESSION['tab']=$tab;
            $totalSup=count($tab);
            define("NBPARPAGE2",1);
 $nbrPage=ceil($totalSup/NBPARPAGE2);
 $Reponse=array();
            $k=1;
        $page=1;
        $_SESSION['questionPose']=array();
$_SESSION['Question']=array();
   $_SESSION['repmultiple']=array();
        if (isset($_POST['suivant'])) {
            $_GET['pagination']+=1;
            header('location:index.php?lien=jeux&pagination='.$_GET['pagination']);
            if (isset($_POST['choix_multiple'])) { 
             
             $Reponse=$_POST['choix_multiple'];
             array_push( $_SESSION['questionPose'],$Reponse);
             putReponses( $_SESSION['questionPose']);
                
            }if (isset($_POST['maradio'])) {
            
                
            }if (isset($_POST['montext'])) {
             
           
          
        }
    }
    if (isset($_POST['precedant'])) {
            $_GET['pagination']-=1;
            header('location:index.php?lien=jeux&pagination='.$_GET['pagination']);
            echo "ok--";
        }if (isset($_POST['terminer'])) {
           
        }

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
                    
                        
                    
                        <div class="questionjeux">         
                        <div class="scorejeux">
                                <?php echo $_SESSION['user']['score'];?>

                        </div>

                            <?php
                           
                        $indiceDebut=($_GET['pagination']-1)*NBPARPAGE;
                        $indiceFin=$indiceDebut+NBPARPAGE-1;
                        $j=1;  
                        ?>
                        <div class="libelleQuestion">
                                    <?php
                                    $j=0;
                                
                                    for ($i=$indiceDebut; $i <=$indiceFin ; $i++) { 
                                        
                                        if (isset(($_SESSION['tab'][$i]))) {
                                            putReponses($_SESSION['tab'][$i]['question']);
                                       //   array_push( $_SESSION['questionPose'],$_SESSION['tab'][$i]['question']);
                                            $ok=1;
                                            $j=$i+1;
                                            ?>
                                            <div class="numeroquestion"><?php echo "Question ".$j.'/'.$nbrPage;?></div> 
                                        <div class="laquestion"><?php echo $_SESSION['tab'][$i]['question'];?></div>                  
                        </div>

                        <div class="corpsQuestions">
                                        
                                            <div class="centerQuestion">
                                            <?php
                                            if ($_SESSION['tab'][$i]['typerep']=="multiple") {
                                               
                                                 ?>
                                                <form action="" method="POST">
                                                <?php
                                                for($j=1;$j<=10;$j++){
                                                    if (isset($_SESSION['tab'][$i]['reponse'.$j])) {
                                                        $chaine=$_SESSION['tab'][$i]['reponse'.$j]['texte'];                     
                                                            ?>
                                                            <input type="checkbox" name="choix_multiple[]"  value="<?php echo $_SESSION['tab'][$i]['reponse'.$j]['texte'];?>" class="alignement" >
                                                            <?php
                                                            echo $_SESSION['tab'][$i]['reponse'.$j]['texte']."<br>";
                                                            
                                                            ?>

                                                        <?php
                                                            
                                                    }
                                                }                                            
                                                ?>
                                                <div class="boutonsuivantprecendant">
                                                                <?php
                                                                if($_GET['pagination']<$nbrPage){ 
                                                                    ?>
                                                                <input type="submit" name="suivant" class="btn-suivant" id="suiv" value="Suivant"/>                   
                                                                <?php
                                                                }
                                                                if($_GET['pagination']>1){
                                                                    
                                                                    ?>
                                                               <input type="submit" name="precedant" class="btn-suivant" id="prec" value="Precedant"/>
                                                                <?php
                                                                }
                                                                if($_GET['pagination']==$nbrPage){
                                                                    
                                                                ?>
                                                                <input type="submit" name="terminer" class="btn-suivant" id="suiv" value="Terminer"/></a>
                                                                <?php
                                                                }
                                                                
                                                                ?>
                                                                        
                                                         </div> 
                                                                </form>
                                                <?php
                                            }
                                        
                                            
                                        

                                             
                                            if ($tab[$i]['typerep']=="simple") {
                                                ?>
                                                <form action="" method="POST">
                                                <?php
                                                for($j=1;$j<=10;$j++){
                                                    if (isset($_SESSION['tab'][$i]['reponse'.$j])) {
                                                        echo '<div class="mesradio">';
                                                        ?>
                                                            <input type="radio" name="maradio" class="alignement" value="<?php echo $_SESSION['tab'][$i]['reponse'.$j]['texte'];?>">
                                                            <?php
                                                            echo $_SESSION['tab'][$i]['reponse'.$j]['texte']."<br>";
                                                            echo '</div>';
                                                    }
                                                }
                                                ?>
                                                <div class="boutonsuivantprecendant">

                                                                <?php
                                                                if($_GET['pagination']<$nbrPage){
                                                                    
                                                                    ?>
                                                               <input type="submit" name="suivant" class="btn-suivant" id="suiv" value="Suivant"/>
                                                                <?php
                                                                }
                                                                if($_GET['pagination']>1){
                                                                   
                                                                    ?>
                                                                <input type="submit" name="precedant" class="btn-suivant" id="prec" value="Precedant"/>
                                                                <?php
                                                                }
                                                                if($_GET['pagination']==$nbrPage){
                                                                    
                                                                ?>
                                                                <input type="submit" name="terminer" class="btn-suivant" id="suiv" value="Terminer"/>
                                                                <?php
                                                                }
                                                                ?>

                                                                </div> 
                                                                </form>
                                                <?php
                                            }
                                                      if ($_SESSION['tab'][$i]['typerep']=="text") {
                                                            ?>
                                                            <form action="" method="POST">
                                                            <?php
                                                            ?>
                                                                        <input type="text" name="montext" class="reponsetexte">
                                                                        <?php
                                                                    
                                                                    ?>
                                                                    <div class="boutonsuivantprecendant">
                                
                                                                        <?php
                                                                        if($_GET['pagination']<$nbrPage){
                                                                          
                                                                            ?>
                                                                        <input type="submit" name="suivant" class="btn-suivant" id="suiv" value="Suivant"/>
                                                                        <?php
                                                                        }
                                                                        if($_GET['pagination']>1){
                                                                           
                                                                            ?>
                                                                        <input type="submit" name="precedant" class="btn-suivant" id="prec" value="Precedant"/>
                                                                        <?php
                                                                        }
                                                                        if($_GET['pagination']==$nbrPage){
                                                                            
                                                                        ?>
                                                                        <input type="submit" name="terminer" class="btn-suivant" id="suiv" value="Terminer"/></a>
                                                                        <?php
                                                                        }
                                                                        ?>
                    
                                                                        </div> 
                                                                            </form>
                                                        <?php
                                                                         }
                                                    
                                                                 }
                                    
                                        
                                                              }

                                            ?>
                                            </div>
                                           
                                

                        </div>
                        
                
                

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

            </div>

