<?php
session_start();
define("url","http://localhost/mag/");
define ('SITE_ROOT', realpath(dirname(__FILE__)));

    function ispost(){
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            return true;
        }
        return false;
    }
    function isvalidemail($email, $database,$checkDB=true){
        if(isset($email) && !empty($email)){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return false;
            }
        }else{
            return false;
        }
        if($checkDB){
        $user = $database->query("SELECT * FROM useri u WHERE u.email = '{$email}'");

        if ($user->num_rows > 0) {
            return false;
        }}

        return true;
    }
    function valideaza_parola($parola){
        if(isset($parola)&& !empty($parola)){
            if(strlen($parola)>5){
                return true;
            }
        }
        else {return false;}
    }
    function sendActivationMail($email, $token){
        $subject = 'Inregistrare Site!';
        $message = "Activeaza-ti contul folosind acest link: http://siteulmeu.ro/activation.php?token=".$token;

        mail($email, $subject, $message);
    }
    function checkActivationToken($token, $database){
        $tokenResult = $database->query("SELECT * FROM useri u WHERE u.token_activari = '{$token}'");
        if ($tokenResult->num_rows == 1) {
            $database->query("UPDATE useri u SET u.token_activari = NULL WHERE u.token_activari = '{$token}'");
            return true;
        }

        return false;
    }

    function islogin(){
        if(isset($_SESSION['user'])){
            return true;
        }
        else{ return false;
        }
    }
?>