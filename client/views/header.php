<!-- <nav class="navbar navbar-light bg-light" style="display: flex; justify-content: end;">
	 <div style="width: 78%;">
	 	<a href="http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/dashboard.php" class="btn" type="button" style="font-size: 1.1rem; font-weight: bold; color: #e0115f;">FELP</a>
	 </div>
	 <a href="http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/dashboard.php" class="btn" type="button">Search</a>
	 <a href="http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/favorites.php" class="btn" type="button">Favorites</a>
	 <a href="http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/phpBB3/index.php" class="btn" type="button">Forum</a>
    <button class="btn btn-outline-danger" id="logout" type="button">Log out</button>
</nav> -->
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">      
     <script src="http://code.gijgo.com/1.6.1/js/gijgo.js" type="text/javascript"></script>
    <link href="http://code.gijgo.com/1.6.1/css/gijgo.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../styles/authStyles.css">
     <script type="text/javascript" src="../js/dashboard.js"></script>
</head>
<body>
 <div class="header-container">
    <div class="header">
      <nav class="header-name">
        <Link to="/">Felp</Link>
      </nav>
      <div class="header-nav">
        <nav class="payments">
          <a href="http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/dashboard.php">
          Search
      </a>
        </nav>
        <nav  class="payments">
          <a href="http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/favorites.php">
          Favorites
      </a> 
        </nav>
        <nav  class="payments">
          <a href="http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/phpBB3/index.php">
          Forum
      	</a> 
        </nav>
        <nav class="payments">
        	<div id="logout" style="color: #e0115f;">Log out</div>
        </nav>
	</div>
  </div>
</div>

