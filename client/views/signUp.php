<!DOCTYPE html>
<html>
<head>
 

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
       
<!--      <script src="http://code.gijgo.com/1.6.1/js/gijgo.js" type="text/javascript"></script>
    <link href="http://code.gijgo.com/1.6.1/css/gijgo.css" rel="stylesheet" type="text/css" /> -->


     <script type="text/javascript" src="../js/signup.js"></script>
</head>
<body>
<div>
        <div style="margin-top: 100px">SIGN UP </div> 
        <form id="signup" action="." method="post">
        <div class="name"> First Name</div>
        <div class="form-group">
            <input type="firstName" class="form-control" name="fname" id="FName" aria-describedby="first" placeholder="First Name" >
        </div>
        <div class="name"> Last Name </div>
        <div class="form-group">
            <input type="lastName" class="form-control" name="lname" id="LName" aria-describedby="Last" placeholder="Last Name" >
        </div>
        <div class="name"> Email </div>
        <div class="form-group">

            <input type="email" class="form-control" name="email" id="emailSignUp" aria-describedby="email" placeholder="Enter email" >
        </div>
        <div class="name"> Password </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="passSignUp" aria-describedby="pass" placeholder="Password" >
        </div>
         <input type="hidden" name="action" value="register" required>
        <div class="space"></div>
        <input type="submit" value="Submit" name='signup' class="btn btn-primary">
	</form>
    </div>

    <div id="text-response"></div>

    <a href="http://127.0.0.1/yelpProject/rabbitmqphp_example/client/views/login.php" class="badge badge-light" style="font-size: 1.2rem; background-color: #fff; margin: 2rem; ">Login</a>
	</body>
</html>