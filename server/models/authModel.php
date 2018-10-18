<?php

function register ($password, $email, $fname, $lname) {
        $db = Database::getDB();
               
        try {
            $b = new DateTime($birthday);
            
            $birth =  $b->format('Y-m-d');
            
            $sql = "SELECT email FROM user WHERE email = '$email'";
            
            $stmt = $db->prepare($sql);
            
            $stmt->bindValue(':email', $email);
            
            $stmt->execute();    
            
            if ($stmt->rowCount() > 0) {
                
                
                echo 'That email already exists!';
                               
            }
                
            else {                    
                $sql = "INSERT INTO user (email, fname, lname,password) VALUES (:email, :fname, :lname,:password )";
                
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
                echo $e->getMessage();
            }
            
            
        }
function login($email, $password){
    $db = Database::getDB();
	
	try {
    echo "hello";
                
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
        session_start();

        // $_SESSION["email"] = $email;
        // $_SESSION["id"]    = $row['id'];
        // $_SESSION["start"] = time();
        $email = has($email);
        $user_credentials = hash($row['id'], $email);


        $session_object = array();
        $session_object['id'] = $row['id'];
        $session_object['start'] = time();
        $session_object['lastAcess'] = time();
        
        echo "User was found!";

        insertSession(
            $session_object['id'], 
            $session_object['start'], 
            $session_object['lastAcess'] 
        )
                           
        return $session_object;                   
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
        echo $e->getMessage();
}

}

 function checkSession($id, $start, $lastAccess){


    $sql = "SELECT * FROM sessions WHERE id=:id";

    $statement = $db->prepare($sql);

    $statement->bindValue(":email", $email);

    $statement->execute();

    $row = $statement->fetch();
}
?>
