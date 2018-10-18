<?php

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
                
                
                echo 'That email already exists!';
                               
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
        //session_start();

        $_SESSION["email"] = $email;
        $_SESSION["id"]    = $row['id'];
        $_SESSION["start"] = time();
        
        echo "User was found!";

	$return_session = array();
	$return_session["id"] = $_SESSION["id"];
	$return_session["start"] = $_SESSION["start"];

        return $return_session;
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
?>
