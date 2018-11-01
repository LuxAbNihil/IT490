<!-- <?php

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
       if($isTrue){
       	  echo "Success \n";
       } else 
       {
       	 echo "Failure1 \n";
       }
       $rows = $statement->fetchAll();
       echo "ROWS";
//print_r($rows);
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
       	// print_r($row);
       	$encoded = json_decode($row['data']);
       	array_push($resArray, $encoded);
       }
       insertLastSearch($id, $location);
       return json_encode($resArray);
 	} catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();

 	}
 }

 function insertSearch($id, $term, $location, $data){
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
       	insertLastSearch($id, $location);
       	echo "Success \n";
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

       $rows = $statement->fetchAll();
       print_r($rows);
       $searches = $rows[0]['last_search'];
       $searchArray = explode(',',$searches);
       echo "SEARCH ARRAY \n\n";
       print_r($searchArray);
       if(!empty($searchArray)){
       		echo "This is good";
       		$check = checkSearch($id, 'restaurants', 'nyc');
       		if(!$check){
       			echo "FIRST";
       			echo $check."ECHO";
       			return search('restaurants', 'nyc');
       		} 
       		echo "SECOND";
       		print_r((object)$check);
       		return (object) $check;
       } 
       echo "THIRD";
       $result = array();
       print_r($searchArray);
       foreach($searchArray as $key => $value){
       	 echo "ITEM IS HERE \n\n";
         echo $value;
         echo "\n-----------\n";
       	 array_push($result, checkSearch($id,'restaurants', $value));
       }
       echo "RESULT IS HERE \n\n";
       print_r($result);
       return $result;    		
	}
		catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
 	}
       }
function insertLastSearch($id, $location){
	$db = Database::getDB();
 	//echo $location;
 	echo "-------\n";
    try{
       $searchCheck = checkLastSearch($id, $location);
       if($searchCheck){
       $sql = "UPDATE user SET last_search = :location WHERE id = :id";
       $statement = $db->prepare($sql);
       $statement->bindValue(':location',$location);
       $statement->bindValue(':id',$id);
       $isTrue = $statement->execute();
       if($isTrue){
       	echo "Success \n";
       } else 
       {
       	echo $id;
       	echo $location;
       	 echo "Failure2 \n";
       }
   } return NULL;
 	} catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
 	}
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
       $searches = $rows[0]['last_search'];
       $searchArray = explode(',',$searches);
       if(in_array($location, $searchArray)){
       	 return false;
       }  
       return true;

 	} catch(Exception $e) {
        echo "ERROR";
        echo $e->getMessage();
 	}
}

?> -->