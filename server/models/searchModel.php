<?php

 function checkSearch ($term, $location){
 	$db = Database::getDB();
 	echo $term;
 	echo $location;
 	try{
       $sql = "SELECT data FROM search WHERE term = :term AND location = :location";
       $statement = $db->prepare($sql);
       $statement->bindValue(':term',$term);
       $statement->bindValue(':location',$location);
       $statement->execute();

       $rows = $statement->fetchAll();
       echo "ROWS";
        // print_r($rows);
       // echo "\n";
        echo $statement->rowCount();
        echo "This is row count";
       if($statement->rowCount() === 0)
       {
       		echo "0 count";
       		return false;
       } 
       // foreach($rows as $row){
       // 	 echo "ROWS \n\n";
       //    echo $rows['data'];
       //}
       // print_r($rows);
       $resArray = array();
       foreach($rows as $row){
       	echo "SOMETHING \n\n";
       	print_r($row);
       	$encoded = json_decode($row['data']);
       	array_push($resArray, $encoded);
       }
       return json_encode($resArray);
 	} catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();

 	}
 }

 function insertSearch($term, $location, $data){
 	$db = Database::getDB();
 	//echo $location;
 	echo "DATA \n\n";
 	echo "-------\n";
 	echo $term.$location."\n\n";
 	//print_r($data);
 	echo "-------\n";
    try{
       $sql = "INSERT INTO search (term, location, data) VALUES (:term, :location, :data)";
       $statement = $db->prepare($sql);
       $statement->bindValue(':term',$term);
       $statement->bindValue(':location',$location);
       $statement->bindParam(':data', $data);
       $isTrue = $statement->execute();
       if($isTrue){
       	echo "Success \n";
       } else 
       {
       	 echo "Failure \n";
       }
 	} catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
 	}
 }
 

function initialSearch ($id){
	$db = Database::getDB();

 	try{
       $sql = "SELECT last_search FROM search WHERE id= :id";
       $statement = $db->prepare($sql);
       $statement->bindValue(':id',$id);
       $statement->execute();

       $rows = $statement->fetchAll();
       if(!$rows){
       		$check = checkSearch('restaurant', 'nyc');
       		if(!$check){
       			return search('restaurant', 'nyc');
       		} 
       		return $check;
       } 
       return checkSearch('restaurant', $rows["last_search"]);    		
	}
		catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
 	}
       }

?>