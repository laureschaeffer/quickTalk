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

}