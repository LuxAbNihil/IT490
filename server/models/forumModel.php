<?php
function insertComment($id, $restaurant_id, $comment){
	$db = Database::getDB();

	echo "GOOD";
	echo $username;
 	try{

 		$time_posted = time();

       $sql = "INSERT INTO comments (user_id, restaurant_id, comment, time_posted) VALUES (:id, :restaurant_id, :comment, :time_posted)";

       $statement = $db->prepare($sql);
       $statement->bindValue(':id', $id);
       $statement->bindValue(':restaurant_id', $restaurant_id);
       $statement->bindValue(':comment', $comment);
       $statement->bindValue(':time_posted', $time_posted);
       // $statement->bindValue(':username', $username);
       $isTrue = $statement->execute();

       if($isTrue)
       		return true;
       	return false;
     } catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
        publishToLog($e->getMessage());
 	}
 }

 function checkComments($restaurant_id){
 	$db = Database::getDB();

 	echo "CHECK COMMENT";

 	try{
       $sql = "SELECT * FROM comments WHERE restaurant_id = :restaurant_id";

       $statement = $db->prepare($sql);
       $statement->bindValue(':restaurant_id', $restaurant_id);
       $statement->execute();
       $isTrue = $statement->execute();

       $rows = $statement->fetchAll();
       print_r($rows);

       return $rows;

     } catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
        publishToLog($e->getMessage());
 	}
}
?>