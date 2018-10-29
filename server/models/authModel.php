<?php
<<<<<<< HEAD
=======
require('errorPublish.php');
>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525

function register ($password, $email, $fname, $lname) {
        $db = Database::getDB();
               
        try {
            $b = new DateTime($birthday);
            
            $birth =  $b->format('Y-m-d');
            
<<<<<<< HEAD
            $sql = "SELECT email FROM user WHERE email = '$email'";
=======

            $sql = "SELECT username FROM user WHERE username = '$email'";



>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525
            
            $stmt = $db->prepare($sql);
            
            $stmt->bindValue(':email', $email);
            
            $stmt->execute();    
            
            if ($stmt->rowCount() > 0) {
                
                
<<<<<<< HEAD
                echo 'That email already exists!';
                               
            }
                
            else {                    
                $sql = "INSERT INTO user (email, fname, lname,password) VALUES (:email, :fname, :lname,:password )";
=======
		    $message = 'That email already exists!';
		    publishToLog($message);
                               
            }
                
           else {                    

                $sql = "INSERT INTO user (username, password, first_name, last_name) VALUES (:email, :password, :fname, :lname)";



>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525
                
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
<<<<<<< HEAD
                echo 'Error!';
                echo $e->getMessage();
=======
	        echo 'Error!';
                publishToLog($e);
		echo $e->getMessage();
>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525
            }
            
            
        }
function login($email, $password){
    $db = Database::getDB();
	
	try {
<<<<<<< HEAD
    echo "hello";
=======
    
>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525
                
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
<<<<<<< HEAD
        session_start();
=======
        
>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525

        // $_SESSION["email"] = $email;
        // $_SESSION["id"]    = $row['id'];
        // $_SESSION["start"] = time();
<<<<<<< HEAD
        $email = has($email);
        $user_credentials = hash($row['id'], $email);
=======
        //$email = has($email);
        //$user_credentials = hash($row['id'], $email);
>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525


        $session_object = array();
        $session_object['id'] = $row['id'];
        $session_object['start'] = time();
        $session_object['lastAcess'] = time();
        
        echo "User was found!";

<<<<<<< HEAD
        insertSession(
            $session_object['id'], 
            $session_object['start'], 
            $session_object['lastAcess'] 
        )
                           
        return $session_object;                   
    } 
=======

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
>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525
                    
    else {
        // header('Location: ');      
        echo ("Your email or password is not valid. Please, try again.");
<<<<<<< HEAD
                        
        return false;        
        }
    }       
    catch (Exception $e) {         
        echo "Error!";
        echo $e->getMessage();   
        }    
}

function insertSession($id, $start, $lastAcess){
    try {
    $sql = "INSERT INTO sessions (session_id, session_start, session_lastAccess) VALUES (:id, :start, :session_lastAccess)";

    $statement = $db->prepare($sql);

    $statement->bindValue(":id", $id);
    $statement->bindValue(":start", $start);
    $statement->bindValue(":lname", $lname);

    
    $statement->execute();
}
    catch (Exception $e) {
        echo 'Error!';
=======
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
>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525
        echo $e->getMessage();
}

}

 function checkSession($object){

<<<<<<< HEAD

    $sql = "SELECT * FROM sessions WHERE id=:id";

    $statement = $db->prepare($sql);

    $statement->bindValue(":email", $email);
=======
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
>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525

    $statement->execute();

    $row = $statement->fetch();
<<<<<<< HEAD
=======
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
>>>>>>> 53f074e149b1b03088169e0bee816eaf78f66525
}
?>
