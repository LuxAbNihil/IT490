<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
       
     <script src="http://code.gijgo.com/1.6.1/js/gijgo.js" type="text/javascript"></script>
    <link href="http://code.gijgo.com/1.6.1/css/gijgo.css" rel="stylesheet" type="text/css" />

     <script type="text/javascript" src="../js/dashboard.js"></script>
</head>
<body>
	<?php include("./header.php"); ?>
<div class="jumbotron">
		<form id="search" class="form-group" action="./dashboard.php" method="post" style="display: flex;justify-content: center;align-content: center;">
  		<div style="width: 50rem; display: flex; height: 2.8rem;">
  		<input id="search-bar" type="text" class="form-control" style="width: 30rem;">
  		<input type="hidden" name="action" value="search">
      	<input type="submit" value="Search" class="btn btn-primary" style="width: 12rem; font-weight: bold; font-size: 1.1rem;" >
    	</div>
    </form>
    	<div id="search-results" class="results-wrapper"> 
    		<h5 style="font-size: 2rem; display: flex;justify-content: center;margin: 3rem 0 0 0;">
    			Your search results
    		</h5>
    		<div id="search-list" style="display: grid; justify-content: center;grid-template-columns: 1fr 1fr 1fr;">
    		</div>        
        </div>
       
        <div id="initial-results" class="results-wrapper" style="display: grid; justify-content: center;">  
        	 <h5 style="font-size: 2rem; display: flex;justify-content: center;margin: 3rem 0 0 0;">
        	 	Suggestions for you
        	 </h5>  
        	<div id="initial-search-list" style="display: grid; justify-content: center;grid-template-columns: 1fr 1fr 1fr;">
    		</div>    	     
        </div>

      </div>
  	</body>
</html>