<?php

function addToFavs($user_id, $restaurant_id){
	$db = Database::getDB();
	echo $user_id."USER ID";
	try {
		$sql = "SELECT * FROM favorites WHERE id = :user_id AND restaurant_id = :restaurant_id;";
		$statement = $db -> prepare($sql);
		$statement -> bindValue(':user_id', $user_id);
		$statement -> bindValue(':restaurant_id', $restaurant_id);
		$statement -> execute();

		if ($statement->rowCount() === 0){
			$insert = insertFavs($user_id, $restaurant_id);
			return $insert;
		}

		return (object) "Already Favorited";
	} catch(Exception $e){
		publishToLog($e->getMessage());
		echo "ERROR: ".$e->getMessage();
	}
}
function retrieveFavs($user_id, $restaurant_id){
	$db = Database::getDB();

	try{
		$sql = "SELECT * FROM favorites WHERE id = :user_id AND restaurant_id = :restaurant_id";
		$statement = $db -> prepare($sql);
		$statement->bindValue(':user_id', $user_id);
		$statement->bindValue(':restaurant_id', $restaurant_id);
		$statement->execute();
		if($statement->rowCount() == 1)
			return true;
		return false;
	} catch(Exception $e){
		publishToLog($e->getMessage());
		echo "ERROR: ".$e->getMessage();
	}
}

function insertFavs($id, $resid){
	$db = Database::getDB();
	try{
		echo $id."ID\n";
		echo $resid."Restaurant_ID\n";
	$sql = "INSERT INTO favorites (id, restaurant_id) VALUES (:id, :resid)";
	$statement = $db -> prepare($sql);
	$statement -> bindValue(':id', $id);
	$statement -> bindValue(':resid', $resid);
	$isTrue = $statement -> execute();
	if($isTrue)
		return true;
	return false;
} catch(Exception $e){
		echo "ERROR: ".$e->getMessage();
		publishToLog($e->getMessage());
	}

}

function removeFav($id, $resid){
	$db = Database::getDB();
	try{
	$sql = "DELETE FROM favorites WHERE id = :id AND restaurant_id = :resid";
	$statement = $db -> prepare($sql);
	$statement -> bindValue(':id', $id);
	$statement -> bindValue(':resid', $resid);
	$isTrue = $statement -> execute();
	if($isTrue)
		return (object) "Fav Removed Successfully";
	return false;
} catch(Exception $e){
		echo "ERROR: ".$e->getMessage();
		publishToLog($e->getMessage());
	}

}

function favoritesList($id){
		$db = Database::getDB();
	try{
	$sql = "SELECT restaurant_id FROM favorites WHERE id = :id";
	$statement = $db -> prepare($sql);
	$statement -> bindValue(':id', $id);
	$isTrue = $statement -> execute();
	$rows = $statement->fetchAll();
	print_r($rows);
	$favoritesArray = array();
	if($isTrue){
		foreach($rows as $row){
			$result =findFavoritesFromSearch($row['restaurant_id']);
			$decoded = json_decode($result);
			array_push($favoritesArray, $decoded);
		}

		}
	return $favoritesArray;
} catch(Exception $e){
		echo "ERROR: ".$e->getMessage();
		publishToLog($e->getMessage());
	}
}

function findFavoritesFromSearch($resid){
		$db = Database::getDB();
	try{
	$sql = "SELECT data FROM search WHERE restaurant_id = :resid";
	$statement = $db -> prepare($sql);
	$statement -> bindValue(':resid', $resid);
	$isTrue = $statement -> execute();
	$row = $statement->fetch();
	echo "FINDFAV\n\n";
	print_r($row);
	return $row['data'];
} catch(Exception $e){
		echo "ERROR: ".$e->getMessage();
		publishToLog($e->getMessage());
	}
}	
?>