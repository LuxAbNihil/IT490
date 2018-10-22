<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function publishToLog($message)
{
        $client = new rabbitMQClient('databaseLogging.ini','testServer');
        $client->publish($message);
}

?>
