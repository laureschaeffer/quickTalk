<?php

namespace Model;

use Model\Connect;

class ChatManager {

    //find conversations
    public function findConversation($idUser): array{
        $pdo = Connect::toConnect();
        $requestConversation = $pdo->prepare(" SELECT u.id_user, u.pseudo, MAX(m.date) AS last_message_date FROM message m 
        INNER JOIN user u ON (m.id_user = u.id_user OR m.id_user_1 = u.id_user)
        WHERE m.id_user = :idUser OR m.id_user_1 = :idUser
        GROUP BY u.id_user, u.pseudo
        ORDER BY last_message_date DESC;");

        $requestConversation->execute(["idUser" => $idUser]);
        
        return $requestConversation->fetchAll();
    }

    //find conversation with someone
    public function findMessage($idUser): array{
        $pdo = Connect::toConnect();
        $requestMessage = $pdo->prepare("SELECT m.id_user AS user_sender, m.id_user_1 AS user_receiver, m.content, m.date, u.pseudo
            FROM message m 
            INNER JOIN user u ON m.id_user = u.id_user
            WHERE m.id_user = :idUser OR m.id_user_1 = :idUser
            ORDER BY m.date;");
        $requestMessage->execute(["idUser" => $idUser]);
        return $requestMessage->fetchAll();
    }

}