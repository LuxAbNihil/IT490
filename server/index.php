<?php
class Database{
    private static $dsn = 'mysql:host=sql.njit.edu;dbname=lz329';
    private static $username = 'lz329';
    private static $password = 'ULjm0oKSi';
    private static $db;
 
private function ___construct(){}   
    
public static function getDB(){
    if(!isset(self::$db)){
        try {
            self::$db= new PDO(self::$dsn,self::$username,self::$password);
            //echo "Connected successfully<br>";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    }
    return self::$db;
}
}
?>