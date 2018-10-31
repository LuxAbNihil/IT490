#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require('server/models/authModel.php');
require('server/models/searchModel.php');
require('server/models/favoritesModel.php');
require('server/database.php');
require('api/yelp.php');

function objectMapper($term, $location, $obj){
  echo $term;
  echo $location;
  $decodedObj = json_decode($obj);
  // print_r($decodedObj);
  $search_arr = array();
   // echo "Decoded: \n\n";
   // print_r($decodedObj);
   // echo "\n\n";
  foreach($decodedObj as $item)
  {
    echo "ITEM";
    foreach($item as $i){
      // print_r($i);
     //print_r($item);
    $stringified = json_encode($i);
    array_push($search_arr, $i);
    insertSearch($term, $location, $stringified);
    }
    
  }
  //print_r($search_arr);
  return json_encode($search_arr);
}

function requestProcessor($request)
{
 // echo "received request".PHP_EOL;
  //var_dump($request);
  echo "This is the request ";
  // print_r($request);
  if(!isset($request['type']))
  {
      echo $request;
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
    case "search":
        echo "Search";
         $result = checkSearch($request['term'],$request['location']);
         if($result === false){
            $req = search($request['term'],$request['location']);
            echo "REQ";
            // print_r($req);
            $return_var = objectMapper($request['term'],$request['location'],$req);
            // print_r($return_var);
            return $return_var;
         } 
         return $result;
    case "favorites":
        $checkFavs = retrieveFavs($request['id'],$request['resid']);
        if(!$checkFavs)
          return addToFavs($request['id'],$request['resid']);
        return $checkFavs;
        //return search($request['term'],$request['location']);
        // return $result;
      case "favorites_check":
         return retrieveFavs($request['id'],$request['resid']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>

