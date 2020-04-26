<div class="contenairCreerQuestion">
    <div class="headerCreerQuestion">
        <div class="textheaderCreerQuestion">
            PARAMETREZ VOTRE QUESTION
        </div>
    </div>

        <div class="bodyCreerQuestion">

            <form action="" method="POST" id="form-question">
            
                    <div class="form-questions">
                            <div class="libelle">Questions</div>
                            <input type="text" class="controlquestion1" name="question" id="" error="error1"> 
                            <div class="error-form" id="error2"></div>
                     </div>
                
                        <div class="form-questions">
                            <div class="libelle">Nbres de Points</div>
                            <input type="number" class="controlquestion2" name="nbpoint" id="" error="error2" min=1> 
                            <div class="error-form" id="error2"></div>
                        </div>

                        <div class="form-questions">
                            <div class="libelle">Type de Reponses</div>
                            
                            <select class="controlquestion3" name="typerep" id="selection" error="error3" placeholder="Donnez Le type de reponse" onchange="removeAll()"> 
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
                     <button type="submit" class="btn-enregistrer" name="enregistrer" id="">Enregistrer</button>
            
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


document.getElementById("form-question").addEventListener("submit",function(e){
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

var cpt=0;

function addInput(){
         i++;
         var globale = document.getElementById('genere');
         var newDiv=document.createElement('div');
         newDiv.setAttribute('class','form-questions');
         newDiv.setAttribute('id','rep_'+i);
         
         var listeSelect = document.getElementById('selection');
         var optionselect = listeSelect.selectedIndex;
        if (optionselect==3) {
            newDiv.innerHTML = `
                        <input type="text" class="controlquestion3" >
                        <button type="button" class="btn-red" onclick="removeinput(${i})"><img src="asset/images/ic-supprimer.png" alt=""></button>
                        `;
         
        globale.appendChild(newDiv);
        document.getElementById('ajoutChamps').disabled=true;
         }
         if (optionselect==2) {
            newDiv.innerHTML = `
                        <input type="text" class="controlquestion3" >
                        <input type="checkbox">
                        <button type="button" class="btn-red" onclick="removeinput(${i})"><img src="asset/images/ic-supprimer.png" alt=""></button>
                        `;
                        
        globale.appendChild(newDiv);
          }
          if (optionselect==1) {
            newDiv.innerHTML = `
                        <input type="text" class="controlquestion3" >
                        <input type="radio">
                        <button type="button" class="btn-red" onclick="removeinput(${i})"><img src="asset/images/ic-supprimer.png" alt=""></button>
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
    
</script>