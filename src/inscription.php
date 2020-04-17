<script>

            function previewImage(){
               var file = document.getElementById('file').files;
               if (file.length > 0) {
                   var fileReader = new FileReader();

                   fileReader.onload = function (event){
                       document.getElementById("preview").setAttribute("src", event.target.result);
                   };
                    fileReader.readAsDataURL(file[0]);
               }
            }

</script>



<div class="container-users">
    <form action="" method="POST"  id="form-users">
      <div class="header-users">
          <h3>S'INSCRIRE</h3>
          <div class="phrase">Pour tester votre niveau de culture generale</div>
      </div>
      <div class="imgavatar">
           <img id="preview">
      </div>
      
            <div class="input-usersform">
                <div class="label-users">Prenom</div>
                <input type="text" class="input-users" name="prenom" id="prenom" error="error-users-1"> 
                <div class="error-users" id="error-users-1"></div>
            </div>



        <div class="input-usersform">
            <div class="label-users">Nom</div>
            <input type="text" class="input-users" name="nom" id="nom" error="error-users-2"> 
            <div class="error-users" id="error-users-2"></div>
        </div>

        <div class="input-usersform">
            <div class="label-users">Login</div>
            <input type="text" class="input-users" name="login" id="login" error="error-users-3"> 
            <div class="error-users" id="error-users-3"></div>
        </div>

        <div class="input-usersform">
            <div class="label-users">Password</div>
            <input type="password" class="input-users" name="password1" id="password1" error="error-users-4"> 
            <div class="error-users" id="error-users-4"></div>
        </div>

        <div class="input-usersform">
            <div class="label-users">Confirm Password</div>
            <input type="password" class="input-users" name="password2" id="password2" error="error-users-5"> 
            <div class="error-users" id="error-users-5"></div>
        </div>

        <div class="input-usersform">
            <div class="label-avatar">Avatar</div>
            <input type="file" class="input-avatar" name="file" id="file" error="error-users-6" accept="image/*" onchange="previewImage();"> 
            <div class="error-users" id="error-users-5"></div>
        </div>

        <div class="input-usersform">
                
                     <button type="submit" class="btn-form" name="btn_submit" id="">Creer Compte</button>
                     
                
            </div>

      </div>
        



    </form>
    

</div>
