<?php
function sell_month(){
	connect_db();
	echo "<h1 align='center'>สรุปยอดขายประจำเดือน</h1>";

echo "<table class='table table-condensed' ><tr bgcolor=#cccccc><th>ลำดับ</th><th>เดือน</th><th>ยอดขาย</th></tr>";

for($i=01;$i<13;$i++){
$rs=mysql_query("SELECT order_date,SUM(total_paid) FROM list_orders WHERE month(order_date)=$i")or die(mysql_error());
list($order_date,$total_paid)=mysql_fetch_row($rs);
	echo"<tr><td>$i</td><td>";
	if($i==01){
			echo "มกราคม";
		}elseif($i==02){
			echo "กุมภาพันธ์";
		}elseif($i==03){
			echo "มีนาคม";
		}elseif($i==04){
			echo "เมษายน";
		}elseif($i==05){
			echo "พฤษภาคม";
		}elseif($i==06){
			echo "มิถุนายน";
		}elseif($i==07){
			echo "กรกฎาคม";
		}elseif($i==8){
			echo "สิงหาคม";
		}elseif($i==9){
			echo "กันยายน";
		}elseif($i==10){
			echo "ตุลาคม";
		}elseif($i==11){
			echo "พฤศจิกายน";
		}elseif($i==12){
			echo "ธันวาคม";
		}
		echo"</td><td align='right'>$total_paid</td></tr>";


}echo "</table>";


mysql_close();	
}
//=============================================================================================
function top_sell(){
	connect_db();
	$i=1;
echo "<h1 align='center'>หนังสือที่มียอดขายมากที่สุด 10 อันดับ</h1>
<table class='table table-condensed' >
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
mysql_close();
	
}
//=============================================================================================
function top_like(){
	connect_db();
		echo "<h1 align='center'>รายงานหนังสือที่มียอด LIKE มากที่สุด 10 อันดับ</h1>";
echo "<table class='table table-condensed'><tr bgcolor='#cccccc'><th>ลำดับ</th><th>ชื่อหนังสือ</th><th>สำนักพิมพ์</th><th>จำนวน LIKE</th>";
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
echo "</table>";
mysql_close();
}
?>