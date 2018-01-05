<?php

require("connect_db.php");

echo "<p align='center'>สรุปยอดขายประจำเดือน</p>";
echo "<table align='center' border=1><tr><th>ลำดับ</th><th>เดือน</th><th>ยอดขาย</th></tr>";

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
echo "<a href='report.php'>ย้อนกลับ</a>";

mysql_close();
?>