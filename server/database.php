#!/usr/bin/php
<?php

 $db = Database::getDB();

class Database{
    private static $dsn = 'mysql:host=192.168.1.118;port=3306;dbname=users';
    private static $username = 'user';
    private static $password = '1111';
    private static $db;

// private function ___construct(){}   
    
public static function getDB(){
    echo "there";
    if(!isset(self::$db)){
        try {
            self::$db= new PDO(self::$dsn,self::$username,self::$password);
            echo "Connected successfully<br>";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    }
    return self::$db;
}
}
?>