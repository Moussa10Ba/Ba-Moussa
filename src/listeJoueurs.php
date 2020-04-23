<?php
is_connect();
$tab=getData();
$tabscore=array();
$_SESSION['tab']=$tab;
$totalSup=count($tab);
define("NBPARPAGE",3);
$nbrPageSup=ceil($totalSup/NBPARPAGE);

?>

<div class="containerListeJoueur">
<div class="titrelisteJoueur">LISTE DES JOUEURS PAR SCORE</div>
<div class="tableListeJoueur">
<table class="table">
    <th>Nom</th> <th>Prenom</th> <th>Score</th>
    <?php
    foreach ($tab as $key => $user) {
        echo "<tr>";
        echo "<td>".$user['nom']."</td>"."<td>".$user['nom']."</td>"."<td>".$user['score']."</td>";
        echo "</tr>";
    }  

    
    ?>
    
</table>

</div>



</div>