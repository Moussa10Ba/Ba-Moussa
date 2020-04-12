<?php
function valid_connection($loginform, $passwordform){
$file = file_get_contents("../asset/json/myjson.json");
$json_decode = json_decode($file);
foreach ($json_decode as $value) {
        $log=$value->login;
        $pas=$value->password;
        if($log==$loginform && $pas==$passwordform ){
             return $value;
        }           
}
}
function is_valid_email($mail){
$regex="#^[a-z]+[a-z0-9]+@[a-z]+\.[a-z]{2,3}$#";
return (preg_match($regex,$mail));
}
?>