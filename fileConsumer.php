#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require("errorPublish.php");
require_once("testRabbitMQClient.php");


function requestProcessor($request)
{
   print_r($request);
  if(!isset($request['type']))
  {
    	  $message = "ERROR: unsupported message type";
	  publishToLog($message);
	  return $message;

  }
  switch ($request['type'])
  {
    case "front-end":
      $type = $request['type'];
      $path = $request['path'];
      system("scp" . " " . $request['path'] ." " . "lukas@10.44.148.125:/home/lukas/yelpClone/IT490/");  
      sendInstallDirections($type, $path); 
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("deployment.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>

