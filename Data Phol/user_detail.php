<?php
session_start();
if(empty($_SESSION['login_result']) or $_SESSION['login_result']!="pass"){
	echo "<script language='javascript'>windows.location='login_form.php'</script>";
}
	require("connect_db.php");
	
	$rs=mysql_query("SELECT*FROM users WHERE username='$_GET[username]'") or die(mysql_error());
	list($username,$passwd,$fullname,$lastname,$address,$phone,$email)=mysql_fetch_row($rs);
	
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "รายละเอียดผู้ใช้งาน : $username"?></title>
</head>

<body>

<?php
	echo "<table border='0' align='center'><tr><td>";
	echo "<h2>ผู้ใช้งาน $username </h2>";
	echo "<p> <table border=0 width=500><tr><td><b>User :</b> $username</td></tr></table></p>";
	echo "<p>password : $passwd</p>";
	echo "<p>ชื่อ : $fullname</p>";
	echo "<p>นามสกุล : $lastname</p>";
	echo "<p>ที่อยู่ : $address</p>";
	echo "<p>เบอร์โทร : $phone</p>";
	echo "<p>E-mail : $email</p>";
	
	mysql_close();
?>
<hr />
<p><a href="manage_user.php">กลับไป</a></p>
</body>
</html>