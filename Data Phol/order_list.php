<?php
session_start();
require("connect_db.php");


$order="SELECT * FROM list_orders WHERE order_member='$_SESSION[login_name]'";
$rs=mysql_query($order)or die(mysql_error());
echo "<h2 align='center'>ผู้ใช้ :",$_SESSION['login_name'],"</h2>";
	echo "<form action='transfer_form.php' method='GET'>";
	echo "<table border='1' align='center' width=70%>";
echo "<tr align='center'><th>รหัสสินค้า</th><th>รหัสผู้ซื้อ</th><th>วันที่สั่งซื้อ: วัน/เดือน/ปี</th><th>สถานะ</th><th>หมายเหตุ</th></tr>";
while(list($order_id,$order_date,$order_member,$order_status,$total_paid,$tracking_id)=mysql_fetch_row($rs)){
if($order_status==1){
	$link="<a href='transfer_form.php?id=$order_id'><font color='red'>[แจ้งโอนเงิน]</font></a>";
	}elseif($order_status==4){
		$link="<font color='blue'>TrackingID:$tracking_id</font>";
		}else{
			$link="-";
			}



		echo "<tr align='center'><td><a href='order_detail.php?order_id=$order_id'>$order_id</a></td><td>$order_member</td><td>$order_date</td>";
		
$os="SELECT * FROM order_status WHERE status_id=(SELECT order_status FROM list_orders WHERE order_id='$order_id')";
$os1=mysql_query($os)or die(mysql_error());
list($staust_id,$status_title)=mysql_fetch_row($os1);
echo "<td>$status_title</td>";

echo "<td >$link</td></tr>";
		

 }

echo "</table></form>";
echo "<p align='center'><a href='list_book.php'><input type='button' name='back' value='เลือกหนังสือ'></a></p>";
mysql_free_result($rs);
mysql_close();
?>