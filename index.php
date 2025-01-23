<?php

require_once __DIR__ . '/vendor/autoload.php'; //charge toutes les classes

session_start(); //démarre ou récupère la session


//appelle les classes
// use Controller\HomeController;
use Controller\SessionController;
// use Model\Connect;

//classes des controleurs
// $homeController = new HomeController();
$sessionController = new SessionController();

if(isset($_GET["action"])){
    switch($_GET["action"]){
        // liens de la navbar 
        case "home" : header("location: home.php"); exit; break;
        case "login" : header("location: login.php"); exit; break;
        case "chat" : header("location: chat.php"); exit; break;
        case "register" : header("location: register.php"); exit; break;

        // session
        case "treatRegister": $sessionController->treatRegister(); break;
        case "treatLogin": $sessionController->treatLogin(); break;
        case "logout": $sessionController->logout(); break;

        default: header("location: home.php"); exit; break;
    }
}