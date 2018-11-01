<?php

function register ($password, $email, $fname, $lname) {
        $db = Database::getDB();
               
        try {
            
            
            $sql = "SELECT username FROM user WHERE username = :username";

            $stmt = $db->prepare($sql);
            
            $stmt->bindValue(':username', $email);
            
            $stmt->execute();    
            
            if ($stmt->rowCount() > 0) {
                return 'That email already exists!';                 
            }
                
            else {                    
                $sql = "INSERT INTO user (username, password, first_name, last_name) VALUES (:username, :password, :fname, :lname)";                                      
                
                // $birth = new DateTime();
                $statement = $db->prepare($sql);
                $statement->bindValue(":username", $email);
                $statement->bindValue(":fname", $fname);
                $statement->bindValue(":lname", $lname);
                // $statement->bindValue(":phone", $phone);
                // $statement->bindValue(":birthday", $birth);
                // $statement->bindValue(":gender", $gender);
                $statement->bindValue(":password", $password);   
                
                $statement->execute();
                return "Success: you can log in now";

            }
                //else{
                   // echo"Please enter all of the details";
                //}      
       }
        catch (Exception $e) {

	    echo 'Error!';
                publishToLog($e->getMessage());
		echo $e->getMessage();

        }
}
function login($email, $password){
    $db = Database::getDB();
	
	try {
                
	$sql = "SELECT * FROM user WHERE username='$email' and password='$password'";
	$statement = $db->prepare($sql);
	$statement->execute();
	$row = $statement->fetch();
		//echo "connected successfully";    
        //echo $s->rowCount();            
        //$hashed_pass = $row['password'];        
    if ($statement->rowCount() == 1) {
        //if (password_verify($pass, $hashed_pass)) {
        //echo"worked";           

        // $_SESSION["email"] = $email;
        // $_SESSION["id"]    = $row['id'];
        // $_SESSION["start"] = time();
        // $email = has($email);
        //$user_credentials = hash($row['id'], $email);


        // session_start();

        //$email = has($email);
        //$user_credentials = hash($row['id'], $email);
        echo "This is row from Login \n";
        print_r($row);
        $sessionCheck = checkSession($row);
        echo "This is session check \n";
        if($sessionCheck == false) {
            echo "This is bad";
            $session_object = array();
            $session_object['id'] = $row['id'];
            $session_object['start'] = time();
            $session_object['lastAcess'] = time();

            $session_variable = insertSession(
            $session_object['id'], 
            $session_object['start'], 
            $session_object['lastAcess'] ,
            $db);
            echo "Session Variable";
            print_r($session_variable); 
            return $session_variable;
        }
        // $email = hash($email);
        // $user_credentials = hash($row['id'], $email);
        

	//$return_session = array();
	//$return_session["id"] = $_SESSION["id"];
	//$return_session["start"] = $_SESSION["start"];

       // return $return_session;                     

	return $sessionCheck;
                    
   }                 
    else {
        // header('Location: ');      
        echo ("Your email or password is not valid. Please, try again.");
                        
        return false;        
        }
    }       
    catch (Exception $e) {         
        echo "Error!";
        echo $e->getMessage(); 
        publishToLog($e->getMessage());  
        }    
}

function insertSession($id, $start, $lastAccess, $db){
	try {

     $session_id = hash("sha256", $id + $start);


    $sql = "INSERT INTO sessions (id, session_id, time_created, last_time_accessed) VALUES (:user_id, :session_id, :start, :lastAccess)";

    $statement = $db->prepare($sql);

    $statement->bindValue(":user_id", $id);
    $statement->bindValue(":session_id", $session_id);
    $statement->bindValue(":start", $start);
    $statement->bindValue(":lastAccess", $lastAccess);

    $session_array = array();
    $session_array['id'] = $id;
    $session_array['session_id'] = $session_id;
    $session_array['start'] = $start;
    $session_array['lastAccess'] = $lastAccess;
    // echo hash("sha256", json_encode($session_array));

    $statement->execute();

    return $session_array;
}
    catch (Exception $e) {
	    echo 'Error!';
	    publishToLog($e->getMessage());  
        echo $e->getMessage();      
        }
}      
        


 function checkSession($object){



    // echo "HERE";
    // var_dump(json_decode($object));
    // $newOBJ = json_decode($object);
    // // print_r($newOBJ);
    // $val = (array)$newOBJ;
    // print_r($val);
    // print_r($object);
    // echo $object["id"];
    echo "HERE";
    var_dump(json_decode($object));
    $newOBJ = json_decode($object);
    // print_r($newOBJ);
    $val = (array)$newOBJ;
    print_r($val);

    try{

    $db = Database::getDB();

    $sql = "SELECT * FROM sessions WHERE id=:id";
    echo $sql;
    $statement = $db->prepare($sql);

    $statement->bindValue(":id", $object["id"]);

    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    echo "ROW";

    print_r($row);
    if($row){
        echo "In chekSession";
        print_r($row);
        return $row;
    }

    return false;
}  catch (Exception $e) {
	echo 'Error!';
	publishToLog($e->getMessage());
        echo $e->getMessage();
}
}
?>
