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
        
   include('./login.php');
}

?>