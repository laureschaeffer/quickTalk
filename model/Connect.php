<?php

// connection to db with pdo

namespace Model;

abstract class Connect {

    const HOST = "localhost"; 
    const DB = "quick_talk";
    const USER = "root" ;
    const PASS = "";

    public static function toConnect(){
        try {
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
                die;
        } catch (\PDOException $ex){
            return $ex->getMessage();
        }

    }

}