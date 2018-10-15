<?php
if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET, POLITELY FUCK OFF";
	echo json_encode($msg);
	exit(0);
}
$request = $_POST;
$response = "unsupported request type, politely FUCK OFF";

echo "TYPE" . $request["type"];
switch ($request["type"])
{
	case "login":
		require_once("../testRabbitMQClient.php");
	case "signup":
		require_once("../testRabbitMQClient.php");
	break;
}
echo json_encode($response);
exit(0);
?>