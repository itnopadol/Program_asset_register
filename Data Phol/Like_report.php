<?php
session_start();
require("connect_db.php");
echo "<h1 align='center'>รายงานหนังสือที่มียอด LIKE มากที่สุด 10 อันดับ</h1>";
echo "<table border=1 align='center'><tr bgcolor='#cccccc'><th>ลำดับ</th><th>ชื่อหนังสือ</th><th>สำนักพิมพ์</th><th>จำนวน LIKE</th>";
$od=mysql_query("SELECT book_id,COUNT(username) FROM likes GROUP BY book_id ORDER BY COUNT(username) DESC LIMIT 0,10");
$i=1;
while(list($book_id,$username)=mysql_fetch_row($od)){
	$bk=mysql_query("SELECT book_id,book_title,book_pub FROM books WHERE book_id=$book_id");
	while(list($book_id,$book_title,$book_pub)=mysql_fetch_row($bk)){
		$pu=mysql_query("SELECT * FROM publishing WHERE pub_id=$book_pub");
		while(list($pub_id,$pub_name)=mysql_fetch_row($pu)){
			echo "<tr><td align='center'>$i</td><td>$book_title</td><td>$pub_name</td><td align='center'>$username</td></tr>";
				}
	}
	$i++;
}
echo "</table><a href='report.php'>ย้อนกลับ</a>";

mysql_close();
?>