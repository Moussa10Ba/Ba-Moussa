<?php 

if (isset($_POST['btn_submit']) && isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
    $get=getData();
    $users=array();
    $users['nom']=$_POST['nom'];
    $users['login']=$_POST['login'];
    $rename= $users['login'];
    $users['password']=$_POST['password'];
    $password2=$_POST['password2'];
        if (is_login_in_json($users['login'])) {
            $erreur="Login Indisponible";
        }elseif($password2!= $users['password']){
            $erreur="Les 2 mots de passes ne correspondent pas";
        }else{
        $users['prenom']=$_POST['prenom'];
        $users['login']=$_POST['login'];
        if($_GET['lien']==="inscription"){
            $users['profil']="joueur";
        }else{
            $users['profil']="admin";
        }
        $tailleMax=2097152;
        $extensionValides=array('jpg','jpeg');
        if ($_FILES['avatar']['size'] <= $tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
            if(in_array($extensionUpload,$extensionValides)){
                    $chemin = "asset/images/profil/".$users['login'].'.'.$extensionUpload;
                    $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
                    if ($resultat) {
                        $users['photo']=$rename.'.'.$extensionUpload;
                        
                        putData($users);
                        if($_GET['lien']==="inscription"){
                            $_GET['lien']="connexion";
                           header("location:index.php");
                        }
                    }else {
                        $erreur = "Erreur Durant importation de votre photo";
                    }
            }else{
                $erreur="Format Valide : JPg ou JPEG";
            }
        }else{
            $erreur="Fichier Trop Gros";
        }
        
        }  
   }
   
?>


<div class="container-users">
    <div class="header-users">
          <h3>S'INSCRIRE</h3>
          <div class="phrase">Pour tester votre niveau de culture generale</div>
     </div>
         <div class="blocavatar"> 
      <div class="imgavatar">
           <img id="preview" class="avatarprofil">
      </div>
      </div>
      
    <form action="" method="POST"  id="form-inscription" enctype="multipart/form-data">
      
     
      
            <div class="input-usersform">
                <div class="label-users">Prenom</div>
                <input type="text" class="input-users" name="prenom" id="" error="error-users-1"> 
                <div class="error-users" id="error-users-1"></div>
            </div>



        <div class="input-usersform">
            <div class="label-users">Nom</div>
            <input type="text" class="input-users" name="nom" id="" error="error-users-2"> 
            <div class="error-users" id="error-users-2"></div>
        </div>

        <div class="input-usersform">
            <div class="label-users">Login</div>
            <input type="text" class="input-users" name="login" id="" error="error-users-3"> 
            <div class="error-users" id="error-users-3"></div>
        </div>

        <div class="input-usersform">
            <div class="label-users">Password</div>
            <input type="password" class="input-users" name="password" id="" error="error-users-4"> 
            <div class="error-users" id="error-users-4"></div>
        </div>

        <div class="input-usersform">
            <div class="label-users">Confirm Password</div>
            <input type="password" class="input-users" name="password2" id="" error="error-users-5"> 
            <div class="error-users" id="error-users-5"></div>
        </div>

        <div class="input-usersform">
            <div class="label-avatar">Avatar</div>
            <input type="file" class="input-avatar" name="avatar" id="avatar" required accept="png, jpg" onchange="previewImage();"> 
            
        </div>

        <div class="erreur">
            <?php if (isset($erreur)) {
                echo $erreur;
            }?>
        </div>

        <div class="input-usersform">
            <button type="submit" class="btn-forminscription" name="btn_submit" >Creer Compte</button>    
            </div>

      </div>
        



    </form>
    

</div>
<script>

function previewImage(){
               var file = document.getElementById('avatar').files;
               if (file.length > 0) {
                   var fileReader = new FileReader();

                   fileReader.onload = function (event){
                       document.getElementById("preview").setAttribute("src", event.target.result);
                   };
                    fileReader.readAsDataURL(file[0]);
               }else{
                   alert("Trop Grand");
               }
            }


const inputs= document.getElementsByTagName("input");
for(input of inputs){
    input.addEventListener("keyup",function(e){
        if(e.target.hasAttribute("error")){
            var idDivError=e.target.getAttribute("error");
            document.getElementById(idDivError).innerText=""

       }
    })
}


document.getElementById("form-inscription").addEventListener("submit",function(e){
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



</script>
