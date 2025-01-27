<?php

namespace Model;

use Model\Connect;

class ChatManager {

    //find messages sent by or to a user
    public function findConversation($idUser): array{
        $pdo = Connect::toConnect();
        $requestConversation = $pdo->prepare("
            SELECT DISTINCT c.id_conversation, m.content, m.createdAt AS messageCreatedAt, sender.pseudo AS senderPseudo, receiver.pseudo AS receiverPseudo
            FROM CONVERSATION c
            JOIN receive r ON c.id_conversation = r.id_conversation
            JOIN USER receiver ON r.id_user = receiver.id_user 
            JOIN MESSAGE m ON c.id_conversation = m.id_conversation
            JOIN USER sender ON m.id_user = sender.id_user
            WHERE r.id_user = :idUser OR m.id_user = :idUser
            ORDER BY m.createdAt;
        ");

        $requestConversation->execute(["idUser" => $idUser]);
        
        return $requestConversation->fetchAll();
    }

}