<?php

namespace Controller;

use Model\SessionManager;

class SessionController{

    public function treatRegister(){
        $sessionManager = new SessionManager();
        if($_POST["submit"]){

            //-----------------------filter inputs
            $email= filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $pseudo= filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_SPECIAL_CHARS);
            $password= filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
            $password2= filter_input(INPUT_POST, "password2", FILTER_SANITIZE_SPECIAL_CHARS);

            if($pseudo && $email && $password && $password2){

                //if user already exist
                // $requestUserExist = 

                //if 2 password are the same & length >= 12 (should also add a regex)
                if($password == $password2 && strlen($password >=12)){
                    $sessionManager->createUser($pseudo, $email, $password);

                    header("location: home.php"); exit;
                } else {
                    // error msg 
                }
            }
        }
    }

    public function treatLogin(){
        $sessionManager = new SessionManager();
        if($_POST["submit"]){

            //if user already connected
            if(isset($_SESSION["user"])){
                //msg error
                header("location: home.php"); exit;
            }

            //-----------------------filter inputs
            $email= filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $password= filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

            if($email && $password){
                //does the user exist?
                $user = $sessionManager->userExist($email);
                
                if($user){
                    $hash = $user["password"];

                    //if the password matches a hash
                    if(password_verify($password, $hash)){
                        $_SESSION["user"] = $user; //log the user
                        header("location:home.php"); exit;
                    } else {
                        //error msg
                        header("location: login.php"); exit;
                    }
                } else {
                    header("location:login.php"); exit;
                }
            }
        }
    }

    public function logout(){
        var_dump($_SESSION["user"]); die;
        unset($_SESSION["user"]);
        header("location: home.php"); exit;
        
    }

}