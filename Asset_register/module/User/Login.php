<?php 
	//session_start();
	//include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login Form</title>
    <link href="CSS/Loginform.css" rel="stylesheet" type="text/css">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="body">
<div class="container">
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>
    <h2 class="inactive underlineHover">Sign Up </h2>

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/if_supportmale.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post" action="module/User/Check_GLogin.php">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login" required="required">
      <input type="password" id="password" class="fadeIn third" name="passwd" placeholder="password" required="required">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="">Nopadol -Management System Asset Regiter</a>
    </div>
  </div>
</div>
	<script src="../../js/jquery.min.js"></script>
    <script src="../../JS/bootstrap.min.js"></script>
    </div>
</body>
</html>