<?php
function login($email, $password){
    $db = Database::getDB();
	
	try {
    echo "hello";
                
	$sql = "SELECT * FROM users WHERE username='$email' and password='$password'";
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
        //echo "Welcome, " . $_SESSION['email'];
        echo "Connected successfully";
                           
        return true;                   
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