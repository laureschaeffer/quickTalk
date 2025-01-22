<?php

require_once __DIR__ . '/vendor/autoload.php'; //charge toutes les classes

// session_start(); //démarre ou récupère la session

//connecte à la bdd

//appelle controleur
use Controller\HomeController;

//classes des controleurs
$homeController = new HomeController();

if(isset($_GET["action"])){
    switch($_GET["action"]){
        // liens de la navbar 
        case "home" : $homeController->viewHomePage(); break;
        case "chat" : $homeController->viewChatPage(); break;
        case "login" : $homeController->viewLoginPage(); break;
        case "register" : $homeController->viewRegisterPage(); break;
    }
}  else {
    $homeController->viewHomePage();
}