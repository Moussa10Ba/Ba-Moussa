<?php
if(isset($_POST['enregistrer'])){
    $get=getQuestionnaire();
  $i=1;
  $k=1;
  $questionnaire=array();
    $choix_multiple=array();
    $checkbox=array();
    if(empty($_POST['question'])){
        $error="Saisissez une question";
    }elseif(empty($_POST['score'])){
        $error="Saisissez le nombre de pointelsi";
    }elseif(empty($_POST['typerep'])){
        $error="Choisissez le Type de Reponse";
    }else{
        
        $questionnaire['question']=$_POST['question'];
        $questionnaire['score']=$_POST['score'];
        $questionnaire['typerep']=$_POST['typerep'];
        
        $typerep=$_POST['typerep'];
       if($typerep=="multiple"){
        $checkbox= $_POST['choix_multiple'];
        while(isset($_POST['reponse_choix_multiple_'.$i])){
            $nameinput="reponse_choix_multiple_".$i;
            $ok=false;
            for($j=0;$j<count($checkbox);$j++){
                if($checkbox[$j]==$nameinput){
                    $ok=true;
                    $rep=array();
                    $rep['texte']=$_POST['reponse_choix_multiple_'.$i];
                    $rep['resultat']=true;
                    $questionnaire['reponse'.$i]=$rep;
                    
                }
            }
            if(!$ok){
                $rep=array();
                    $rep['texte']=$_POST['reponse_choix_multiple_'.$i];
                    $rep['resultat']=false;
                    $questionnaire['reponse'.$i]=$rep;
            }
            
            $i++;
        }
       } if($typerep=="simple"){
           $choix_simple=$_POST['choix_simple'];
          while(isset($_POST['reponse_choix_simple_'.$k])){
           $nameinput="reponse_choix_simple_".$k;
          if($choix_simple==$nameinput){
                $rep=array();
                $rep['texte']=$_POST['reponse_choix_simple_'.$k];
                $rep['resultat']=true;
                $questionnaire['reponse'.$k]=$rep;
            }else{
                $rep=array();
                $rep['texte']=$_POST['reponse_choix_simple_'.$k];
                $rep['resultat']=false;
                $questionnaire['reponse'.$k]=$rep;
            }
            $k++;
           }
           
           
       }if ($typerep=="text") {   
        $rep=array();
        $rep['texte']=$_POST['reponse_texte'];
        $rep['resultat']=true;
        $questionnaire['reponse'.$k]=$rep;
        $k++;
       }
       putQuestions($questionnaire);
        }
        

        }
 

?>
<div class="contenairCreerQuestion">
    <div class="headerCreerQuestion">
        <div class="textheaderCreerQuestion">
            PARAMETREZ VOTRE QUESTION
        </div>
    </div>

        <div class="bodyCreerQuestion">

            <form action="" method="POST" id="formquestion" >
            
                    <div class="form-questions">
                            <div class="libelle">Questions</div>
                            <input type="text" class="controlquestion1" name="question" id="" error="error1"> 
                            <div class="error-form" id="error1"></div>
                     </div>
                
                        <div class="form-questions">
                            <div class="libelle">Nbres de Points</div>
                            <input type="number" class="controlquestion2" name="score" id="" error="error2" min=1 > 
                            <div class="error-form" id="error2"></div>
                        </div>

                        <div class="form-questions">
                            <div class="libelle">Type de Reponses</div>
                            
                            <select class="controlquestion3" name="typerep" id="selection" error="error3" onchange="removeAll()"> 
                                <option value="" >Donnez Le type de reponse</option>
                                <option value="simple" class="option"> Choix simple</option>
                                <option value="multiple"  class="option">Choix multiples</option>
                                <option value="text"  class="option">Texte à saisir</option>
                            </select>
                            <button type="button" onclick="addInput()" class="btn-ajoutreponse" id="ajoutChamps"><img src="asset/images/ic-ajout-reponse.png" alt=""></button>
                            <div class="error-form" id="error3"></div>

                        </div>

                        <div id="genere">
                            
                        </div>
                        <div class="form-questions">
                     <button type="submit" class="btn-enregistrer" name="enregistrer" id="">Enregistrer</button>
                        </div>
            </form>

                


        </div>
</div>


<script>
  
const inputs= document.getElementsByTagName("input");
for(input of inputs){
    input.addEventListener("keyup",function(e){
        if(e.target.hasAttribute("error")){
            var idDivError=e.target.getAttribute("error");
            document.getElementById(idDivError).innerText=""

       }
    })
}



document.getElementById("formquestion").addEventListener("submit",function(e){
    
const inputs= document.getElementsByTagName("input");
    var error=false;
    for(input of inputs){
        if(input.hasAttribute("error")){
           var idDivError=input.getAttribute("error")
        if(!input.value){ 
                document.getElementById(idDivError).innerText="Ce champs est obligatoire"
                error=true;
            }
            
        } 
    }
    if(error){
        e.preventDefault();
        return false;
    }
    
})


var i = 0;

 var variableGlobale=0;

function addInput(){
         i++;
         variableGlobale++;
         var globale = document.getElementById('genere');
         var newDiv=document.createElement('div');
         newDiv.setAttribute('class','form-questions');
         newDiv.setAttribute('id','rep_'+i);
         
         var listeSelect = document.getElementById('selection');
         var optionselect = listeSelect.selectedIndex;
        if (optionselect==3) {
            newDiv.innerHTML = `
                         <label> Reponse ${i} </label>
                        <input type="text" class="controlquestion3" name="reponse_texte" error="error_${i}"}>
                        <button type="button" class="btn-red" onclick="removeinput(${i})"><img src="asset/images/ic-supprimer.png" alt=""></button>
                        <div class="error-form" id="error_${i}"></div>
                        `;
         
        globale.appendChild(newDiv);
        document.getElementById('ajoutChamps').disabled=true;
         }
         if (optionselect==2) {
            newDiv.innerHTML = `
                        <label> Reponse ${i} </label>
                        <input type="text" class="controlquestion3" name="reponse_choix_multiple_${i}" error="error_${i}">
                        <input type="checkbox" name="choix_multiple[]" class="checked" value="reponse_choix_multiple_${i}">
                        <button type="button" class="btn-red" onclick="removeinput(${i})"><img src="asset/images/ic-supprimer.png" alt=""></button>
                        <div class="error-form"id="error_${i}"></div>
                        `;
                        
        globale.appendChild(newDiv);
          }
          if (optionselect==1) {
            newDiv.innerHTML = `
            <label> Reponse ${i} </label>
                        <input type="text" class="controlquestion3" name="reponse_choix_simple_${i}" error="error_${i}">
                        <input type="radio" name="choix_simple" class="checked" value="reponse_choix_simple_${i}" >
                        <button type="button" class="btn-red" onclick="removeinput(${i})"><img src="asset/images/ic-supprimer.png" alt=""></button>
                        <div class="error-form" id="error_${i}"></div>
                        `;
                         
        globale.appendChild(newDiv);
          }if(optionselect==0){

              alert("Veuillez Selectionnez une Option");
          }

}

        function removeinput(n){
            var cible= document.getElementById('rep_'+n);
            cible.remove();
        }

       function removeAll(){
       document.getElementById('genere').innerText="";
        document.getElementById('genere').children().remove();
       }

     /*  
       onsubmit="return TesterChecked()"
        function TesterChecked(){      
        var form=document.getElementById('formquestion');
        var inputs= form.getElementsByClassName('checked');
                for(input of inputs){
                    var texte= input.getAttribute('name');
                        if(input.checked){
                            return true;      
                        }if(texte==="reponse_texte"){
                            return true; 
                        }
                }
                
                alert("Veuillez Cocher une reponse Valide");
                return false;        
       }
       */
     
       
            
     
    
</script>