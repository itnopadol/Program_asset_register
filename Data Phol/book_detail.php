<?php
session_start();
if(empty($_SESSION['login_result']) or $_SESSION['login_result']!="pass"){
	echo "<script language='javascript'>windows.location='login_form.php'</script>";
}
	require("connect_db.php");
	
	$rs=mysql_query("SELECT*FROM books WHERE book_id='$_GET[id]'") or die(mysql_error());
	list($book_id,$book_title,$book_writer,$book_price,$book_sprice,$book_pub,$book_detail,$book_cover,$book_cate,  $book_stock,$book_time)=mysql_fetch_row($rs);
	
	$rs=mysql_query("SELECT pub_name FROM publishing WHERE pub_id='$book_pub'")or die(mysql_error());
	list($pub_name)=mysql_fetch_row($rs);	
	
	$rs=mysql_query("SELECT cate_name FROM categories WHERE cate_id='$book_cate'")or die(mysql_error());
	list($cate_name)=mysql_fetch_row($rs);
	$li="SELECT book_id,username FROM likes WHERE book_id=$book_id";
	$lik=mysql_query($li);
	$book=mysql_num_rows($lik);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "รายละเอียดหนังสือ : $book_title"?></title>
</head>

<body>
<?php
	echo "<table border='0' align='center'><tr><td valign='middle'>";
	echo "<h1>$book_title<br><a href='add_like.php?id=$book_id'><img src='images/11.png' width=50></a>&nbsp;($book)</h1>";
	echo "<p align='center'><img src='images/$book_cover' alt='$book_title' title='$book_title'></p>";
	echo "<p> <table border=0 width=500><tr><td><b>รายละเอียด :</b> $book_detail</td></tr></table></p>";
	echo "<p>ราคาปกติ : <strike>$book_price</strike>บาท</p>";
	echo "<p>ราคาพิเศษ : <font color='red'>$book_sprice</font> บาท </p>";
	echo "<p>บริษัท : $pub_name</p>";
	echo "<p>ผู้แต่ง : $book_writer</p>";
	echo "<p>ประเภทหนังสือ : $cate_name</p>";
	echo "<p>เวลา : $book_time</p>";
	
	echo "<p> สถานะ : <strong>",$book_store = 1 ? 'สินค้าพร้อมจำหน่าย' : 'สินค้าหมด',"</strong></p></tr></td>"; 
	echo "</table>";
	echo "<p align='center'><a href='addtocart.php?id=$book_id'>เลือกหนังสือเล่มนี้</a></p>";
	mysql_close();

?>

<hr />

<p><a href="list_book.php">กลับไป</a></p>
</body>
</html>