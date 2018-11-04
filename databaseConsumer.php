#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require('server/models/authModel.php');
require('server/models/searchModel.php');
require('server/models/favoritesModel.php');
require('server/models/forumModel.php');
require('server/database.php');
require('api/yelp.php');
require("errorPublish.php");


function objectMapper($id, $term, $location, $obj){
  echo $term;
  echo $location;
    $decodedObj = json_decode($obj);
    // print_r($decodedObj);
    $makeArray = (array)$decodedObj;
    $sliced = array_slice($makeArray, 0, 2);
  $search_arr = array();
   print_r($sliced);
  foreach($sliced as $item)
  {
    foreach($item as $i){
      $stringified = json_encode($i);
      array_push($search_arr, $i);
      insertSearch($id, $term, $location, $stringified);
    }
    
  }
  $searchSlice = array_slice($search_arr, 0, 3);
  return json_encode($searchSlice);
}

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
    case "login":
           return login($request['username'], $request['password']);

    case "session_valid":
    $obj = $request['session_object'];
      echo $obj;
      	    return checkSession($obj);
    case "signup":
	    return register($request['password'],$request['username'],$request['fname'],$request['lname']);

    case "search":
      var_dump($request['term']);
         $result = checkSearch($request['id'],$request['term'],$request['location']);
         if($result === false){

            $req = search($request['term'],$request['location']);
            $return_var = objectMapper($request['id'],$request['term'],$request['location'],$req);
            insertLastSearch($request['id'], $request['location']);
            return $return_var;
         } 
         insertLastSearch($request['id'], $request['location']);
         return json_encode($result);

    case "initial_search":
    {
        return initialSearch($request['id']);
    }

    case "favorites":
        print_r($request);
        $checkFavs = retrieveFavs($request['id'],$request['resid']);
        if(!$checkFavs)
          return addToFavs($request['id'],$request['resid']);
        return removeFav($request['id'],$request['resid']);

    case "favorites_check":
         return retrieveFavs($request['id'],$request['resid']);
         
    case "add_comment":
          print_r($request);
          $result = insertComment($request['id'], $request['resid'], $request['comment']);
          return $result;
    case "initial_comment":
           print_r($request);
           $result = checkComments($request['resid']);
           return $result;
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>

