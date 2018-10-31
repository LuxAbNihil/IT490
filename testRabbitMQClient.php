
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
<<<<<<< HEAD
=======
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
>>>>>>> 6ace9fa044d1ec566c2d8c8d17d13ad440a4c275
	default: 
		break;
}

// $request['type'] = $_POST['type'];
// $request['username'] = $_POST['uname'];
// $request['password'] = $_POST['pword'];
// $request['message'] = $msg;
<<<<<<< HEAD
=======

>>>>>>> 6ace9fa044d1ec566c2d8c8d17d13ad440a4c275
$response = $client->send_request($request);

<<<<<<< HEAD

//echo "client received response: ".PHP_EOL;
//echo "USERNAME" . $_POST['uname'];
//echo "PASSWORD" . $_POST['pword'];
print_r($response);
//eo "\n\n";

//echo $argv[0]." END".PHP_EOL;

// echo "client received response: ".PHP_EOL;
// echo "RESPONSE AT 1";
// print_r($response[1]);
echo json_encode($response);


// echo $argv[0]." END".PHP_EOL;

=======
// echo "client received response: ".PHP_EOL;

// print_r($response);
echo json_encode($response);


// echo $argv[0]." END".PHP_EOL;
>>>>>>> 6ace9fa044d1ec566c2d8c8d17d13ad440a4c275

