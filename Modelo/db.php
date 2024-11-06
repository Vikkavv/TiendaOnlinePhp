<?php

class DB{

    private static $server = 'localhost:3306';

    private static $user = 'root';

    private static $password = '';

    private static $dbName = 'mi_tienda';

    private static $conn = null;

    public static function getConnection(){
        if(self::$conn === null){
            try{
                self::$conn = new PDO("mysql:host=".self::$server.";dbname=".self::$dbName."", self::$user, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}

