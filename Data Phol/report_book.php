<?php
session_start();
require("connect_db.php");
$i=1;
echo "<h1 align='center'>หนังสือที่มียอดขายมากที่สุด 10 อันดับ</h1>
<table border=1  align='center'>
<tr bgcolor=#cccccc><th>ลำดับ</th><th>ชื่อหนังสือ</th><th>สำนักพิมพ์ </th><th>จำนวนเล่ม</th></tr> ";
$od=mysql_query("SELECT book_id,SUM(book_amount) FROM order_detail GROUP BY book_id ORDER BY SUM(book_amount) DESC LIMIT 0,10");
while(list($book_id,$book_amount)=mysql_fetch_row($od)){
	$bk=mysql_query("SELECT book_id,book_title,book_pub FROM books WHERE book_id=$book_id");
	while(list($book_id,$book_title,$book_pub)=mysql_fetch_row($bk)){
		$pu=mysql_query("SELECT * FROM publishing WHERE pub_id=$book_pub");
		while(list($pub_id,$pub_name)=mysql_fetch_row($pu)){
echo "<tr><td align='center'>$i</td><td>$book_title</td><td>$pub_name</td><td align='center'>$book_amount</td></tr>";
		}
		$i++;
	}
}
echo "</table>";
echo "<a href='report.php'>ย้อนกลับ</a>";
mysql_close();
?>