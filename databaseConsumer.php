#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require('server/models/authModel.php');
require('server/database.php');


function requestProcessor($request)
{
 // echo "received request".PHP_EOL;
  //var_dump($request);
  echo "This is the request ";
  // print_r($request);
  if(!isset($request['type']))
  {
    	  $message = "ERROR: unsupported message type";
	  publishToLog($message);
	  return $message;

  }
  switch ($request['type'])
  {
    case "login":
           return login($request['username'], $request['password']);
    case "session_valid":
    $obj = $request['session_object'];
      echo $obj;
      	    return checkSession($obj);
    case "signup":
	    return register($request['password'],$request['username'],$request['fname'],$request['lname']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>

