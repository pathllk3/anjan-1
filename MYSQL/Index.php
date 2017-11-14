<?php
require 'chkmysqltbl.php';
if (isset($_POST['btnLogin']))
{
require 'Connect.php';
$uid = $_POST['uid1'];
$pass1 = $_POST['pass1'];
$RESULT = mysqli_query($db1, "SELECT * FROM user WHERE UID='$uid' AND PASS='$pass1'");
if (mysqli_num_rows($RESULT)==1){
	session_start();
	session_cache_expire(120);
	$_SESSION['username'] = $uid;
	$_SESSION["auth"] = 'true';
	$row_rsmyQuery = mysqli_fetch_assoc($RESULT);
	$_SESSION["FNAME"] = $row_rsmyQuery['FNAME'];
	$_SESSION["PNAME"] = "AFTER LOGIN";
	header ("Location: After_Login.php");
}
else {
	echo '<script>alert("Invalid User or Password");</script>';
}
}
?>
<html lang="en">
<head>
<meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MY HTML PAGE</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
				
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</head>
<body>
<div class="jumbotron">
      <div class="container">
        <h1>Please Sign In Here!</h1>
		<form id="login-form" action="LOGIN.php" method="post" name="Sign Up" style="display: block;">
        <div class="form-group">
              <input type="text" placeholder="Username" class="form-control" id="UID" name="uid1">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" id="PASS" name="pass1">
            </div>
            <input type="submit" class="btn btn-success btn-xs form-control" id="LOG" value="Sign In" name="btnLogin" />
			</form>
			<hr/>
            <a id="sup" href="SIGNUP.php">New User! Sign Up</a>
      </div>
    </div>
	<hr/>
</body>