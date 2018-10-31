<?php
if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET, POLITELY FUCK OFF";
	echo "MESSAGE IS HERE" . json_encode($msg);
	exit(0);
}
$request = $_POST;
$response = "unsupported request type, politely FUCK OFF";

//echo "TYPE" . $request["type"];
switch ($request["type"])
{
	case "login":
		require_once("../testRabbitMQClient.php");
	case "signup":
		require_once("../testRabbitMQClient.php");
<<<<<<< HEAD
=======
	case "session_valid":
		require_once("../testRabbitMQClient.php");
	case "search":
		require_once("../testRabbitMQClient.php");	
>>>>>>> 6ace9fa044d1ec566c2d8c8d17d13ad440a4c275
	break;
}
// echo json_encode($request);
exit(0);
<<<<<<< HEAD
?>
=======
?>



>>>>>>> 6ace9fa044d1ec566c2d8c8d17d13ad440a4c275
