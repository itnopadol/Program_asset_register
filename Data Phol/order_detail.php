<?php
session_start();
require("connect_db.php");

echo "<h1 align='center'>รายการขายสินค้า</h1>";
$order_id=$_GET['order_id'];
$order="SELECT * FROM list_orders WHERE order_id=$order_id";
$rs=mysql_query($order)or die(mysql_error());
		echo "<table border='1' align='center'>";

echo "<tr bgcolor='#CCCCCC'><th>รหัสสินค้า</th><th>รหัสหนังสือ</th><th>ชื่อหนังสือ</th><th>ราคา/บาท</th><th>วัน/เดือน/ปี</th><th>จำนวนสินค้า</th></tr>";
while(list($order_id,$order_date,$order_member)=mysql_fetch_row($rs)){
$order2="SELECT * FROM order_detail WHERE order_id=$order_id ";
$rs2=mysql_query($order2);
while(list($order_id,$book_id,$book_amount)=mysql_fetch_row($rs2)){
$bk="SELECT book_title,book_sprice FROM books WHERE book_id=$book_id";
$bk1=mysql_query($bk);

 while(list($book_title,$book_sprice)=mysql_fetch_row($bk1)){
	
		echo "<tr><td>$order_id</td><td>$book_id</td><td>$book_title</td><td>$book_sprice</td><td>$order_date</td><td align='right'>$book_amount</td></tr>";
		

 }
}
}
echo "</table>";
echo "<p align='center'><a href='manage_book.php'><input type='button' name='back' value='ย้อนกลับ'></a></p>";
mysql_free_result($rs);
mysql_close();
?>