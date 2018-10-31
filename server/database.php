
<?php

 $db = Database::getDB();

class Database{

    private static $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=user';
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
