<?php 
	//include("Funtion/funtion.php");
	//$con = connect_db();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test Login</title>
</head>

<body>
<?php
	select_menu($_SESSION['user_Level']);
?>
</body>
</html>