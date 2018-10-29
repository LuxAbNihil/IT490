#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("databaseLogging.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}


$request = array();

switch ($_POST['type']) {
	case 'login':
		$request['type'] = $_POST['type'];
		$request['username'] = $_POST['uname'];
		$request['password'] = $_POST['pword'];
		$request['message'] = "LOGIN";
		break;
	
	case 'signup':
		$request['type'] = $_POST['type'];
		$request['fname'] = $_POST['fname'];
		$request['lname'] = $_POST['lname'];
		$request['username'] = $_POST['uname'];
		$request['password'] = $_POST['pword'];
		$request['message'] = "SIGNUP";
		break;
	default: 
		break;
}

// $request['type'] = $_POST['type'];
// $request['username'] = $_POST['uname'];
// $request['password'] = $_POST['pword'];
// $request['message'] = $msg;
//$response = $client->send_request($request);
$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
echo "USERNAME" . $_POST['uname'];
echo "PASSWORD" . $_POST['pword'];
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;

