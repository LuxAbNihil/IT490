<?php


 function checkSearch ($term, $location){
 	$db = Database::getDB();
 	echo $term;
 	echo $location;
 	try{
       $sql = "SELECT term, location FROM search WHERE term = :term AND location = :location";
       $statement = $db->prepare($sql);
       $statement->bindValue(':term',$term);
       $statement->bindValue(':location',$location);
       $statement->execute();

       $rows = $statement->fetchAll();
       // print_r($rows);
       // echo "\n";
       // echo $statement->rowCount();
       // echo "This is row count";
       if($statement->rowCount() ==0)
       {
       		echo "0 count";
       		return false;
       } 
       print_r($rows);
       return $rows;
 	} catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();

 	}
 }

 function insertSearch($term, $location, $data){
 	$db = Database::getDB();
 	//echo $location;
 	//print_r($data);
 	echo "-------\n";
    try{
       $sql = "INSERT INTO search (term, location, data) VALUES (:term, :location, $data)";
       $statement = $db->prepare($sql);
       $statement->bindValue(':term',$term);
       $statement->bindValue(':location',$location);
       $statement->bindParam(':data', $data);
       $statement->execute();

 	} catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
 	}
 }
 
?>