<?php

function checkSearch ($id, $term, $location){
 	$db = Database::getDB();
 	echo $id."ID\n\n";
 	echo $term;
 	echo $location;
 	try{
       $sql = "SELECT data FROM search WHERE term = :term AND location = :location";
       $statement = $db->prepare($sql);
       $statement->bindValue(':term',$term);
       $statement->bindValue(':location',$location);
       $isTrue = $statement->execute();

       $rows = $statement->fetchAll();
       
       if($statement->rowCount() === 0)
       {
       		return false;
       }
       
       $resArray = array();
       foreach($rows as $row){
       $encoded = json_decode($row['data']);
       array_push($resArray, $encoded);
       }
       
       return $resArray;}
  catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();

 	}
 }

 function insertSearch($id, $term, $location, $data, $resid){
 	$db = Database::getDB();

    try{
       $sql = "INSERT INTO search (term, location, data, restaurant_id) VALUES (:term, :location, :data, :resid)";
       $statement = $db->prepare($sql);
       $statement->bindValue(':term',$term);
       $statement->bindValue(':location',$location);
       $statement->bindParam(':data', $data);
       $statement->bindValue(':resid', $resid);
       $isTrue = $statement->execute();
       if($isTrue){
       	insertLastSearch($id, $location);
       } else 
       {
       	 echo "Failure1 \n";
       }
 	} catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
 	}
 }
 

function initialSearch ($id){
	$db = Database::getDB();

 	try{

       $sql = "SELECT last_search FROM user WHERE id = :id";
       $statement = $db->prepare($sql);
       //$statement->bindValue(':location',$location);
       $statement->bindValue(':id',$id);
       $isTrue = $statement->execute();

       $rows = $statement->fetch();

       $lSearch = $rows['last_search'];
       
       if($rows !== 0){
         return lastSearchMapper($lSearch, $id);
       }	
       return "No initial search";
	}
		catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
 	}
       }
function insertLastSearch($id, $location){
	$db = Database::getDB();
 	echo $location;
 	echo "-------\n";
    try{
       $searchCheck = checkLastSearch($id, $location);
       if($searchCheck){
         $sql = "UPDATE user SET last_search = CONCAT(last_search, ',', :location) WHERE id = :id";
         $statement = $db->prepare($sql);
         $statement->bindValue(':location',$location);
         $statement->bindValue(':id',$id);
         $isTrue = $statement->execute();
      } 
       return NULL;
 	} catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
 	}
 }
 function lastSearchMapper($str, $id){
    $sliced = explode(",", $str);
    $requestArray = array();

    foreach($sliced as $key => $value){
      if(in_array($location, $searchArray)){
         return;
       } 
      $searched = checkSearch($id, 'restaurants', $value);
      array_push($requestArray, $searched);
    }
    print_r($requestArray);
    return $requestArray;
 }

function checkLastSearch($id, $location){
	$db = Database::getDB();
	try{
       $sql = "SELECT last_search FROM user WHERE id = :id";
       $statement = $db->prepare($sql);
       //$statement->bindValue(':location',$location);
       $statement->bindValue(':id',$id);
       $isTrue = $statement->execute();

       $rows = $statement->fetchAll();

       $lSearch = $rows[0]['last_search'];
       //lastSearchMapper($lSearch, $id);
       return checkForDups($lSearch, $location);

 	} catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
 	}
}

function checkForDups($str, $location){
       $searches = $str;
       $searchArray = explode(',', $str);
       if(in_array($location, $searchArray)){
        echo "FALSE";
         return false;
       }  
       echo "TRUE";
       return true;
}
?> 