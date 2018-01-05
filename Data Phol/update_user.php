<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ไขข้อมูลผู้ใช้</title>
</head>

<body>
<?php
require("connect_db.php");
	
//3.เรียกใข้คำสั่ง SQL


$sql="UPDATE users SET username='$_POST[username]',passwd='$_POST[passwd]',fullname='$_POST[fullname]',lastname='$_POST[lastname]',address='$_POST[address]',phone='$_POST[phone]',email='$_POST[email]' WHERE username = '$_POST[username]' ";

mysql_query($sql)or die(mysql_error());


//4.ปิดฐานข้อมูล
	mysql_close();
//header("Location:list_book.php");
?>

<script language="javascript">window.location='manage_user.php'</script>

</body>
</html>