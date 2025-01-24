<?php
//service to add a message
namespace Service;

abstract class Message{

    public static function showMessage(){ 
        if(isset($_SESSION["messages"]) || !empty($_SESSION["messages"])) {
            echo $_SESSION["messages"]; //show the msg
            unset($_SESSION["messages"]); //then delete
        } 
    }


}