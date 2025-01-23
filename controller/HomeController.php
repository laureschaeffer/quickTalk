<?php

namespace Controller;

class HomeController
{
    //--------------------liens de rédirection des pages
    public function viewHomePage()
    {
        require "view/home.php";
    }
    
    // public function viewHomePage(){
    //     var_dump(__DIR__); // chemin exact du répertoire
    //     var_dump(getcwd()); // répertoire de travail actuel
    //     var_dump(file_exists("view/home.php")); // vérifie si le fichier existe
    // }
    
}