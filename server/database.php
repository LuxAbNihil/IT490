
<?php

 $db = Database::getDB();

class Database{
<<<<<<< HEAD

    private static $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=user';
=======
<<<<<<< HEAD
    private static $dsn = 'mysql:host=192.168.1.111;port=3306;dbname=user';
=======
    private static $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=user';
>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525
>>>>>>> a7ad970b66ffacb027d17e760490c4c1032e5cc8
    private static $username = 'user';
    private static $password = '1111';
    private static $db;

// private function ___construct(){}   
    
public static function getDB(){
<<<<<<< HEAD

    echo "there";
=======
<<<<<<< HEAD
    echo "there";
=======
    
>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525
>>>>>>> a7ad970b66ffacb027d17e760490c4c1032e5cc8
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
