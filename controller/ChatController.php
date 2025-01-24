<?php

namespace Controller;

use Model\ChatManager;

class ChatController{

    function listConversation(){
        $chatManager = new ChatManager();
        $idUser = $_SESSION["user"]["id_user"];
        $conversations = $chatManager->findConversation($idUser);

        renderView('chat', 'Chat', $conversations);
    }

    //show conversation with someone
    function detailConversation($idUser){
        $chatManager = new ChatManager();
        var_dump($idUser);
    }
    
}