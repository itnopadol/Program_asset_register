<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงข้อมูลจากฐานข้อมูล</title>
</head>

<body>
<?php
	mysql_connect("localhost","root","");
	mysql_select_db("bookstore") or die(mysql_error());
	mysql_query("SET NAMES UTF8") or die(mysql_error());
	
	$pu=mysql_query("SELECT*FROM publishing") or die(mysql_error());
	echo "<h1>แสดงรายการหมวดหมู่หนังสือ</h1>";
	echo "<select name='book_pub'>";
	while(list($pub_id,$pub_name)=mysql_fetch_row($pu)){
		echo "<option value='$pub_id'>$pub_name</option>";
	}
	echo "</select>";
	
	
	
	$ca=mysql_query("SELECT*FROM categories") or die(mysql_error());
	echo "<h1>แสดงรายชื่อสำนักพิมพ์</h1>";
	while(list($cate_id,$cate_name)=mysql_fetch_row($ca)){
		echo "<input type='radio' name='book_cate' value='$cate_id'>$cate_name";
		
	}
	
	mysql_free_result($pu);
	mysql_free_result($ca);
	mysql_close();
	
?>


</body>
</html>