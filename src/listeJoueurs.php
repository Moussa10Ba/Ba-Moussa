<?php
is_connect();
$tab=getData();
$_SESSION['tab']=$tab;
$totalSup=count($tab);
$tab=triTableau($tab);
define("NBPARPAGE",15);
$nbrPage=ceil($totalSup/NBPARPAGE);
?>

<div class="containerListeJoueur">
<div class="titrelisteJoueur">LISTE DES JOUEURS PAR SCORE</div>
<div class="tableListeJoueur">

<table class="table">
   
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
echo '<table class="table">';
?>
<th>NOM</th><th>Prenom</th><th>Score</th>
<?php
for ($i=$indiceDebut; $i <=$indiceFin ; $i++) { 
  
      if (isset($tab[$i])) {
       
          echo '<tr>';
        
        echo '<td>'.$tab[$i]['nom'].'</td>'.'<td>'.$tab[$i]['prenom'].'</td>'.'<td>'.$tab[$i]['score'].'</td>';
        echo '</tr>';
      }   
}

echo '</table>';

if($pageActuelle<$nbrPage){
    $page=$pageActuelle+1;
    ?>
 <a href="index.php?lien=acceuil&page=joueur&pagination=<?php echo $page;?>"><input type="button" name="suivant" class="btn-suivant" value="Suivant"/></a>
 <?php
}
if($pageActuelle>1){
    $page=$pageActuelle-1;
    ?>
 <a href="index.php?lien=acceuil&page=joueur&pagination=<?php echo $page;?>"><input type="button" name="suivant" class="btn-suivant" value="Precedant"/></a>
 <?php
}
  
 

?>
    
</table>

</div>
</div>