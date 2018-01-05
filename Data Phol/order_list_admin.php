<?php
	session_start();
	require("connect_db.php");
	
	
	$order="SELECT * FROM list_orders ";
	$rs=mysql_query($order)or die(mysql_error());
	
	echo "<h2 align='center'>ผู้ใช้ :",$_SESSION['login_name'],"</h2>";
	echo "<table border='1' align='center' width=70%>";
	echo "<tr align='center'><th>รหัสสินค้า</th><th>รหัสผู้ซื้อ</th><th>วันที่สั่งซื้อ: วัน/เดือน/ปี</th><th>สถานะ</th>
	<th>หมายเหตุ</th></tr>";
	
	while(list($order_id,$order_date,$order_member,$order_status,$total_paid,$tracking_id)=mysql_fetch_row($rs)){
	if($order_status==2){
		$link="<a href='transfer_detail.php?name=$order_member&id=$order_id'><font color='green'>ตรวจสอบ</font></a>";
		}elseif($order_status==3){
			$link="<form action='add_tracking.php' method='post'>
			<input type='hidden' value='$order_id' name='order_id'>
			<input type='text' name='tracking_id' size='20'>
			<input type='submit' value='Tracking'></form>";
			}elseif($order_status==4){
			$link="<font color='blue'>- TrackingID:$tracking_id</font>
			<br>-<a href='bil.php?name=$order_member&order_id=$order_id'>ใบเสร็จ</a>";
			}elseif($order_status==5){
				$link="<font color='red'>#Error</font>";
				}else{$link="-";}
	
			echo "<tr align='center'><td><a href='order_detail.php?order_id=$order_id'>$order_id</a></td><td>$order_member</td><td>$order_date</td>";
	$os="SELECT * FROM order_status ";
	$os1=mysql_query($os)or die(mysql_error());		
	
	echo "<td align='left'><form action='update_status.php' method='get'>";
	echo "<input type='hidden' value='$order_id' name='order_id'>";
	echo "<select name='status_id'>";
	
	while(list($status_id,$status_title)=mysql_fetch_row($os1)){
		if($order_status==$status_id){
			$selected="selected='selected=selected'";
		}else{
			$selected="";
			}
			
			echo "<option value='$status_id' $selected>$status_title</option>";
		}
	
	echo "</select>&nbsp;&nbsp;<input type='submit' name='update' value='เปลี่ยนสถานะ'></form></td>";
	
	echo "<td >$link</td></tr>";
			
	
	}
	
	echo "</table>";
	
	
	
	mysql_free_result($rs);
	mysql_close();
	?>