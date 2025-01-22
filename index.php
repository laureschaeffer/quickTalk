<?php

require_once __DIR__ . '/vendor/autoload.php'; //charge toutes les classes

// session_start(); //démarre ou récupère la session


//appelle les classes
use Controller\HomeController;
use Controller\SessionController;
// use Model\Connect;

//classes des controleurs
$homeController = new HomeController();
$sessionController = new SessionController();

if(isset($_GET["action"])){
    switch($_GET["action"]){
        // liens de la navbar 
        case "home" : $homeController->viewHomePage(); break;
        case "chat" : $homeController->viewChatPage(); break;
        case "login" : $homeController->viewLoginPage(); break;
        case "register" : $homeController->viewRegisterPage(); break;

        case "treatRegister": $sessionController->treatRegister(); break;
    }
}  else {
    $homeController->viewHomePage();
}