<!DOCTYPE html>
<html>
<head>
    <title>Welcome to To-Do  </title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
       
<!--      <script src="http://code.gijgo.com/1.6.1/js/gijgo.js" type="text/javascript"></script>
    <link href="http://code.gijgo.com/1.6.1/css/gijgo.css" rel="stylesheet" type="text/css" /> -->
     <script type="text/javascript" src="../js/login.js" type="module"></script>
</head>
<div>
     <div style="margin-top: 100px">LOGIN </div>
        <form id="login" action="." method="post">
            <div class="name"> Email</div>
            <div class="form-group">
                <input type="email" id="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="email" placeholder="Enter email">
            </div>
            <div class="name"> Password</div>
             <div class="form-group">
                <input type="password" id="pass" class="form-control" name="password" id="exampleInputPass" aria-describedby="pass" placeholder="Enter password">
            </div>
            <input type="hidden" name="action" value="login">
            <div></div>
            <input type="submit" value="Login" name="loggedIn" class="btn btn-primary">
        </form>
        <div id="textResponse">
            Response: 
        </div>
    </div>
    </html>
