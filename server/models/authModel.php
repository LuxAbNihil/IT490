<?php
require('errorPublish.php');

function register ($password, $email, $fname, $lname) {
        $db = Database::getDB();
               
        try {
            $b = new DateTime($birthday);
            
            $birth =  $b->format('Y-m-d');
            

            $sql = "SELECT username FROM user WHERE username = '$email'";



            
            $stmt = $db->prepare($sql);
            
            $stmt->bindValue(':email', $email);
            
            $stmt->execute();    
            
            if ($stmt->rowCount() > 0) {
                
                
		    $message = 'That email already exists!';
		    publishToLog($message);
                               
            }
                
           else {                    

                $sql = "INSERT INTO user (username, password, first_name, last_name) VALUES (:email, :password, :fname, :lname)";



                
                // $birth = new DateTime();
                $statement = $db->prepare($sql);
                $statement->bindValue(":email", $email);
                $statement->bindValue(":fname", $fname);
                $statement->bindValue(":lname", $lname);
                // $statement->bindValue(":phone", $phone);
                // $statement->bindValue(":birthday", $birth);
                // $statement->bindValue(":gender", $gender);
                $statement->bindValue(":password", $password);   
                
                $statement->execute();
                echo '<div style=""text-align:center">Your Account Was Created Successfuly</div>';     
            }
                //else{
                   // echo"Please enter all of the details";
                //}      
            }
       // }
            
            catch (Exception $e) {
	        echo 'Error!';
                publishToLog($e);
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
        //$email = has($email);
        //$user_credentials = hash($row['id'], $email);


        $session_object = array();
        $session_object['id'] = $row['id'];
        $session_object['start'] = time();
        $session_object['lastAcess'] = time();
        
        echo "User was found!";


	//$return_session = array();
	//$return_session["id"] = $_SESSION["id"];
	//$return_session["start"] = $_SESSION["start"];

       // return $return_session;


        $session_variable = insertSession(
           $session_object['id'], 
           $session_object['start'], 
	   $session_object['lastAcess'] ,
	$db
   ); 
      print_r($session_variable);                           
	return $session_variable;
	echo"bad"; 	} 
                    
    else {
        // header('Location: ');      
        echo ("Your email or password is not valid. Please, try again.");
	$message = "Invalid Login Attempt";
        publishToLog($message);	
	return $message;	
        }
    }       
    catch (Exception $e) {         
	 echo "Error!";
         publishToLog($e);
         echo $e->getMessage();   
         return $e;    
    }}

function insertSession($id, $start, $lastAccess, $db){
	try {

        $hashed_ID = hash("sha256", $id);


    $sql = "INSERT INTO sessions (session_id, time_created, last_time_accessed) VALUES (:id, :start, :lastAccess)";

    $statement = $db->prepare($sql);

    $statement->bindValue(":id", $hashed_ID);
    $statement->bindValue(":start", $start);
    $statement->bindValue(":lastAccess", $lastAccess);

    $session_array = array();
    $session_array['session_id'] = $id;
    $session_array['start'] = $start;
    $session_array['lastAccess'] = $lastAccess;
    // echo hash("sha256", json_encode($session_array));

    $statement->execute();

    return $session_array;
}
    catch (Exception $e) {
	    echo 'Error!';
	publishToLog($e);
        echo $e->getMessage();
}

}

 function checkSession($object){

    echo "HERE";
    var_dump(json_decode($object));
    $newOBJ = json_decode($object);
    // print_r($newOBJ);
    $val = (array)$newOBJ;
    print_r($val);
    try{

    $db = Database::getDB();

    $sql = "SELECT * FROM sessions WHERE session_id=:id";
    echo $sql;
    $statement = $db->prepare($sql);

    $statement->bindValue(":id", $val["id"]);

    $statement->execute();

    $row = $statement->fetch();
    print_r($row);
    if($row){
        return true;
    }

    return false;
}  catch (Exception $e) {
	echo 'Error!';
	publishToLog($e);
        echo $e->getMessage();
}
}
?>
