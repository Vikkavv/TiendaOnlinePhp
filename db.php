<?php

class DB{

    private static $server = 'localhost:3306';

    private static $user = 'root';

    private static $password = '';

    private static $dbName = 'mi_tienda';

    private static $conn = null;

    public static function getConnection(){
        if(self::$conn === null){
            self::$conn = new PDO("mysql:host=".self::$server.";dbname=".self::$dbName."", self::$user, self::$password);
        }
    }
}

