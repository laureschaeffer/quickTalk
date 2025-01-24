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

                    $_SESSION['messages'] = "<p class='msg success'>Profil created</p>"; //confirmation msg
                    header("Location: index.php?action=home"); exit;

                } else {
                    $_SESSION['messages'] = "<p class='msg error'>Passwords do not match, or length is less than 12</p>"; //error msg
                    header("Location: index.php?action=register"); exit;
                }
            }
        }
    }

    public function treatLogin(){
        $sessionManager = new SessionManager();
        if($_POST["submit"]){

            //if user already connected
            if(isset($_SESSION["user"])){
                $_SESSION['messages'] = "<p class='msg error'>You're already connected!</p>"; //error msg
                header("Location: index.php?action=home"); exit;
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
                        $_SESSION['messages'] = "<p class='msg success'>You're connected</p>"; //confirmation msg
                        header("location:index.php?action=home"); exit;
                    } else {
                        $_SESSION['messages'] = "<p class='msg error'>Invalid credentials</p>"; //eror msg
                        header("Location: index.php?action=login"); exit;
                    }
                } else {
                    $_SESSION['messages'] = "<p class='msg error'>Invalid credentials</p>"; //error msg
                    header("Location: index.php?action=login"); exit;
                }
            }
        }
    }

    public function logout(){
        unset($_SESSION["user"]);
        $_SESSION['messages'] = "<p class='msg success'>You're disconnected</p>"; //confirmation msg
        header("location: index.php?action=home"); exit;
        
    }

}