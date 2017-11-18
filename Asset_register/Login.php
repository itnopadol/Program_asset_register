<?php 
	session_start();
	include("Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>
<link href="CSS/Loginform.css" rel="stylesheet" type="text/css">
</head>

<body>
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
    <form method="post" action="module/User/Check_Login.php">
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
</body>
</html>