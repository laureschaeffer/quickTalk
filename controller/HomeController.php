<?php

namespace Controller;

class HomeController
{
    //--------------------liens de rédirection des pages
    public function viewHomePage()
    {
        require "view/home.php";
    }
    
    public function viewChatPage()
    {
        require "view/chat.php";
    }
    
    public function viewLoginPage()
    {
        require "view/login.php";
    }
    
    public function viewRegisterPage()
    {
        require "view/register.php";
    }
    
}