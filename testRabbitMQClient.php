
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
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
	case "session_valid":
		$request['type'] = $_POST['type'];
		$request['session_object'] = $_POST['session_object'];
		$request['message'] = "SESSION";
		break;
	case 'search':
		$request['type'] = $_POST['type'];
		$request['term'] = $_POST['term'];
		$request['location'] = $_POST['location'];
		break;
	case 'favorites':
		$request['type'] = $_POST['type'];
		$request['id'] = $_POST['id'];
		$request['resid'] = $_POST['resid'];
		break;
	case 'favorites_check':
		$request['type'] = $_POST['type'];
		$request['id'] = $_POST['id'];
		$request['resid'] = $_POST['resid'];
		break;
	default: 
		break;
}

// $request['type'] = $_POST['type'];
// $request['username'] = $_POST['uname'];
// $request['password'] = $_POST['pword'];
// $request['message'] = $msg;

$response = $client->send_request($request);

// echo "client received response: ".PHP_EOL;

// print_r($response);
echo json_encode($response);


// echo $argv[0]." END".PHP_EOL;

