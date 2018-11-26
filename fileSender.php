#!/usr/bin/php

<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('bundler.php');

$client = new rabbitMQClient("deployment.ini","testServer");

function sendRequest($type){
echo $type;
$request = array();

$request ["type"]=$type;
gatherFiles();

$request ["path"]="installArchive.tar";
print_r($request);

return $request;
}


$client->send_request(sendRequest("front-end"));

?>

