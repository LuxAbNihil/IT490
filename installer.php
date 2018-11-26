<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

if(file_exists("installArchive.tar")){
	system('tar -xvf installArchive.tar');
	system('rm installArchive.tar');
}

?>