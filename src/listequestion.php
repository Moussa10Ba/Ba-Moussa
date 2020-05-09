<?php
is_connect();
$tab=getQuestionnaire();
$_SESSION['tab']=$tab;
$totalSup=count($tab);
define("NBPARPAGE",2);
$nbrPage=ceil($totalSup/NBPARPAGE);
$getNbquestionparjeu=getNbQuestionJeu();
//var_dump($getNbquestionparjeu);
$_SESSION['$getNbquestionparjeu']=$getNbquestionparjeu;
?>

<div class="containerListeJoueur">

<div class="titrelisteJoueur">
    <form method="POST" action="">
    Nombre de questions/jeu
     <input type="text" name="nb_question_jeu" class="nbr5" id="nbr5" error="eror-1" value="<?php /*if(!empty($_POST['nb_question_jeu'] )){*/ echo $_SESSION['$getNbquestionparjeu'] ;/*}*/ ?>" onkeyup="verif_nombre(this);"> 
     <input type="submit" value="ok" name="ok" id="ok" onclick="return isSup()">
     <div class="error-form" id="eror-1"><?php if (!empty($erreur)) {
         echo $erreur;
     }?></div>
   </form>
   
</div>
<div class="tableListeQuestion">
    <?php
    if (isset($_POST['ok'])) {
        if(!empty($_POST['nb_question_jeu'])){
            $_SESSION['nb_question_jeu']= $_POST['nb_question_jeu'];
            if( $_SESSION['nb_question_jeu']<5){
                $erreur="Le nombre de Question/Jeu doit etre superieur ou egal a 5";
            }else{
                putNbQuestionJeu($_SESSION['nb_question_jeu']);
            }
        }else{
            $erreur="Veuillez saisir le nombre de Question/Jeu";
        }
        
    }
        
        
    ?>
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
 <a href="index.php?lien=acceuil&page=listequestion&pagination=<?php echo $page;?>"><input type="button" name="suivant" class="btn-suivant" onclick="return isSup();" value="Suivant"/></a>
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
<script>

function isSup(){
    var val= document.getElementById('nbr5').value;

    if (val<5) {
        alert("Le nombre de question doit etre Superieur ou Egal a 5");
        return false
    }
}


function verif_nombre(champ)
  {
	var chiffres = new RegExp("[0-9]");
	var verif;
	var points = 0;
 
	for(x = 0; x < champ.value.length; x++)
	{
            verif = chiffres.test(champ.value.charAt(x));
	    if(champ.value.charAt(x) == "."){points++;}
            if(points > 1){
                verif = false; 
                points = 1;
                }
  	    if(verif == false){
              champ.value = champ.value.substr(0,x) + champ.value.substr(x+1,champ.value.length-x+1); x--;
              }
	}
  }


</script>