<!DOCTYPE html>
<html>
<head>
 

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
       
<!--      <script src="http://code.gijgo.com/1.6.1/js/gijgo.js" type="text/javascript"></script>
    <link href="http://code.gijgo.com/1.6.1/css/gijgo.css" rel="stylesheet" type="text/css" /> -->

     <link rel="stylesheet" href="../styles/authStyles.css">
     <script type="text/javascript" src="../js/signup.js"></script>
</head>

<body id="AuthForm">
<div class="container">
<div class="login-form">
<div class="main-div">
    <div class="panel">
       <h2>Sign Up</h2>
       <p>Please enter your details</p>
           </div>
            <form id="signup" action="." method="post">
                <div class="form-group">
                    <input type="firstName" class="form-control" name="fname" id="FName" aria-describedby="first" placeholder="First Name" >
                </div>
                <div class="form-group">
                  <input type="lastName" class="form-control" name="lname" id="LName" aria-describedby="Last" placeholder="Last Name" >
                </div>
                <div class="form-group">
                      <input type="email" class="form-control" name="email" id="emailSignUp" aria-describedby="email" placeholder="Enter email" >
                </div>
                <div class="form-group">
                     <input type="password" class="form-control" name="password" id="passSignUp" aria-describedby="pass" placeholder="Password" >
                </div>
                <div class="link">
                <a href="login.php">Login</a>
                </div>
                <input type="submit" value="Sign Up" name="loggedIn" class="btn btn-primary">
            </form>
        </div>
</div>
</div>
</div>


</body>





</html>