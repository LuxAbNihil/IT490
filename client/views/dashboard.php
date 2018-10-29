<!DOCTYPE html>
<html>
<head>
    <title>Welcome to To-Do  </title>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
       
     <script src="http://code.gijgo.com/1.6.1/js/gijgo.js" type="text/javascript"></script>
    <link href="http://code.gijgo.com/1.6.1/css/gijgo.css" rel="stylesheet" type="text/css" />

     <script type="text/javascript" src="../js/dashboard.js"></script>
</head>
<body>
<div class="jumbotron">
		<form id="search" class="form-group" action="./dashboard.php" method="post">
  		<input id="search-bar" type="text" class="form-control">
  		<input type="hidden" name="action" value="search">
		</div>
      		<input type="submit" value="Search" class="btn btn-primary">
    	</div>
    </form>
    	<div id="search-results" class="results-wrapper" style="display: flex; justify-content: center;">
            
        </div>
      </div>
  	</body>
</html>