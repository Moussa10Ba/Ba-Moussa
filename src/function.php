<?php

    function connexion($login,$pwd){
        $users=getData();
        foreach ($users as $key => $user) {
                if ($user["login"]===$login && $user["password"]===$pwd) {
                    $_SESSION['user']=$user;
                    $_SESSION['statut']="login";
                        if ($user["profil"]==="admin") {
                           return "acceuil";
                        }else{
                            return "jeux";
                        }
                }
                else{
                    return "error";
                }}

    }


    function deconnexion(){
        unset($_SESSION['user']);
        unset($_SESSION['statut']);
        session_destroy();
    }

    function is_connect(){
        if (!isset( $_SESSION['statut'])) {
            header("location:index.php");
        }
    }

function getData($file="utilisateur"){
    $data=file_get_contents("asset/json/utilisateur.json");
    $data=json_decode($data,true);
    return $data;
}
    


?>