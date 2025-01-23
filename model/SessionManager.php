<?php

namespace Model;

use Model\Connect;

class SessionManager {

    public function createUser($pseudo, $email, $password){
        $pdo = Connect::toConnect();

        $insertUser = $pdo->prepare("INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)");
        $insertUser->execute([
            "pseudo" => $pseudo,
            "email" => $email,
            //hache le mdp
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function userExist($email){
        $pdo = Connect::toConnect();
        $requestMail = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $requestMail->execute(["email" => $email]);
        $user = $requestMail->fetch();

        return $user;
    }

}