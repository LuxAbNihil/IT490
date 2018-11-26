#!/usr/bin/php
<?php
 

function gatherFiles (){

	if(file_exists('/home/daniel/rabbitmqphp_example/installArchive.tar')){
		system('rm /home/daniel/rabbitmqphp_example/installArchive.tar');
	}
	$fileArray = [];
	$fileArray = array_diff(scandir('/home/daniel/rabbitmqphp_example'), array('..','.','.git', '.git-old'));
	print_r($fileArray);
	foreach($fileArray as $file)
	{
		system("tar -uf installArchive.tar ".$file);
	}
	
	sendFiles();
}

function sendFiles(){
	system('scp installArchive.tar lukas@10.44.148.138:/home/lukas/yelpClone/IT490');
}















// function create_zip($files = array(), $destination = '', $overwirte = false){
// 	if(file_exists($destination) && !overwrite){
// 	   return false;
// 	}
// 	$valid_files = array();
// 	if(is_array($files)){
// 		foreach ($files as $file){
// 			if(file_exists($file)){
// 				$valid_files = $file;
// 			}
// 		}
// 	}

// 	if count($valid_files){
// 		$zip = new ZipArchive();
// 		if($zip->open($destination, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE :: CREATE) !== true{
// 			return false;
// 		}
// 		foreach($valid_files as $file){
// 			$zip->addFile($file,$file);
// 		}

// 		$zip->close();

// 		return file_exists($destination);
// 	}	else{
// 		return false
// 	}
// }

// $files_to_zip = array(
// 	'path.inc',
// 	'get_host_info.inc',
// 	'rabbitMQLib.inc',
// 	'server/models/authModel.php',
// 	'server/models/searchModel.php',
// 	'server/models/favoritesModel.php',
// 	'server/models/forumModel.php',
// 	'server/database.php',
// 	'api/yelp.php',
// 	'errorPublish.php'
// )
?>