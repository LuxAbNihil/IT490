
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');


function sendInstallDirections($type, $path){

$client = new rabbitMQClient("deployment.ini","testServer");
$request = array();
switch ($type) {
	case 'front-end':
		$request['path'] = $path;
		break;
  	default: 
		break;
}

$response = $client->send_request($request);
}

// $request['type'] = $_POST['type'];
// $request['username'] = $_POST['uname'];
// $request['password'] = $_POST['pword'];
// $request['message'] = $msg;


// echo "client received response: ".PHP_EOL;

// print_r($response);
//echo json_encode($response);


// echo $argv[0]." END".PHP_EOL;

