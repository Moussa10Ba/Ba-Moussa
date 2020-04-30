<?php
//is_connect();
$tab=getQuestionnaire();
$_SESSION['tab']=$tab;
$totalSup=count($tab);

define("NBPARPAGE",4);
$nbrPage=ceil($totalSup/NBPARPAGE);

?>

<div class="containerListeJoueur">

<div class="titrelisteJoueur">Nombre de questions/jeu <input type="text" value="5" disabled="disabled" class="nbr5"></div>
<div class="tableListeQuestion">
<?php
if (isset($_GET['pagination'])) {
    $pageActuelle=$_GET['pagination'];
  if ($pageActuelle>$nbrPage) {
        $pageActuelle=$nbrPage;
    }
  }else{
    $pageActuelle=1;
  } 
  
  $indiceDebut=($pageActuelle-1)*NBPARPAGE;
  $indiceFin=$indiceDebut+NBPARPAGE-1;
 $j=1;  
 for ($i=$indiceDebut; $i <=$indiceFin ; $i++) { 
     if (isset(($tab[$i]))) {  
      
      if ($tab[$i]['typerep']=="simple") {
       echo "<h2>".$tab[$i]['question']."</h2>";
        for($j=1;$j<=10;$j++){
            if (isset($tab[$i]['reponse'.$j])) {
                if ($tab[$i]['reponse'.$j]['resultat']==true) {
                    echo '<input type="radio" checked="checked" class="alignement" disabled="disabled">';
                    echo $tab[$i]['reponse'.$j]['texte']."<br>";
                    
                }if ($tab[$i]['reponse'.$j]['resultat']==false) {
                    echo '<input type="radio" class="alignement" disabled="disabled">';
                    echo $tab[$i]['reponse'.$j]['texte']."<br>";
                    
                }
            }
        }
      }if($tab[$i]['typerep']=="multiple") {
        echo "<h2>".$tab[$i]['question']."</h2>";
         for($j=1;$j<=10;$j++){
             if (isset($tab[$i]['reponse'.$j])) {
                 if ($tab[$i]['reponse'.$j]['resultat']==true) {
                     echo '<input type="checkbox" checked="checked" class="alignement" disabled="disabled">';
                     echo $tab[$i]['reponse'.$j]['texte']."<br>";
                     
                 }if ($tab[$i]['reponse'.$j]['resultat']==false) {
                     echo '<input type="checkbox" class="alignement" disabled="disabled">';
                     echo $tab[$i]['reponse'.$j]['texte']."<br>";
                 }
             }
         }
      }if($tab[$i]['typerep']=="text") {
                    echo "<h2>".$tab[$i]['question']."</h2>";
                 if ($tab[$i]['reponse1']['resultat']==true) {
                     ?>
                     <input type="text" checked="checked" class="inputtexte" disabled="disabled" value="<?php echo  $tab[$i]['reponse1']['texte'];?>">
                     <?php
                     
             }
         }
      }
     }

if($pageActuelle<$nbrPage){
    $page=$pageActuelle+1;
    ?>
 <a href="index.php?lien=acceuil&page=listequestion&pagination=<?php echo $page;?>"><input type="button" name="suivant" class="btn-suivant" value="Suivant"/></a>
 <?php
}
if($pageActuelle>1){
    $page=$pageActuelle-1;
    ?>
 <a href="index.php?lien=acceuil&page=listequestion&pagination=<?php echo $page;?>"><input type="button" name="suivant" class="btn-suivant" value="Precedant"/></a>
 <?php
}
?>
</div>

</div>