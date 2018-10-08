#!/usr/bin/php 
<?php include './header.php'; ?> 
   
    <form action="." method="post">
        <div class="form-group">
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="email" placeholder="Enter email">
        </div>
         <div class="form-group">
            <input type="password" class="form-control" name="password" id="exampleInputPass" aria-describedby="pass" placeholder="Enter password">
        </div>
        <input type="hidden" name="action" value="login">
        <div></div>
        <input type="submit" value="Login" name="loggedIn" class="btn btn-primary">
    </form>
       