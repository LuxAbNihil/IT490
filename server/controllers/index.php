<?php
require('../database.php');
require('../models/authModel.php');
session_start();
 //session_regenerate_id(TRUE); 
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'index';
    }
}
if ($action === 'index') {
        
   include('../../client/views/login.php');
}

else if($action === 'login'){
	
	$email = filter_input(INPUT_POST, 'email');
	$pass = filter_input(INPUT_POST, 'password');
 
		if($email!='' && $pass!=''){
		if(login($email, $pass)){				
			   header("Location: .?action=dashboard");
		   
		}
		else{
			$error = "Wrong credentials";
			include("../../client/views/login.php");
		}
		
	}
	 else{
	 		echo "error";
	 		$error = "Please Enter Both Email and Password";
	 		include("../../client/views/login.php");
	 }
	
}

?>