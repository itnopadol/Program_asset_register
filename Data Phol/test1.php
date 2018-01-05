<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	mysql_connect("localhost","root","");
	mysql_select_db("bookstore") or die(mysql_error());
	mysql_query("SET NAMES UTF8") or die (mysql_error());
	
	$rs=mysql_query("SELECT*FROM books WHERE book_id='$_GET[id]'") or die(mysql_error());
	list($book_id,$book_title,$book_writer,$book_price,$book_sprice,$book_pub,$book_detail,$book_cover,$book_cate,  $book_stock,$book_time)=mysql_fetch_row($rs);
	
	$rs=mysql_query("SELECT pub_name FROM publishing WHERE pub_id='$book_pub'")or die(mysql_error());
	list($pub_name)=mysql_fetch_row($rs);	
	
	$rs=mysql_query("SELECT cate_name FROM categories WHERE cate_id='$book_cate'")or die(mysql_error());
	list($cate_name)=mysql_fetch_row($rs);
	
	echo "<p>บริษัท : $pub_name</p>";
	echo "<p>ประเภทหนังสือ : $cate_name</p>";
	?>

</body>
</html>