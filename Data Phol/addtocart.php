<?php
session_start();
if(empty($_SESSION['sbook_id'])){//ตรวจสอบว่ามี session ว่างหรือไม่
	$_SESSION['sbook_id']=array();//กำหนดให้ SESSION เป็น array
}
///ตรวจสอบว่า id ที่ส่งมาซ้ำกับที่มีใน session หรือไม่
require("connect_db.php");
	
	$rs=mysql_query("SELECT book_title,book_sprice  FROM books WHERE book_id='$_GET[id]'") or die(mysql_error());
	list($book_title,$book_sprice)=mysql_fetch_row($rs);
if(!in_array($_GET['id'],$_SESSION['sbook_id'])){
	$_SESSION['sbook_id'][]=$_GET['id'];
	$_SESSION['sbook_title'][]=$book_title;
	$_SESSION['sbook_sprice'][]=$book_sprice;
	$_SESSION['sbook_amount'][]=1;
}

echo "<script language='javascript'>window.location='show_cart.php'</script>";
mysql_result($rs);
mysql_close();
?>