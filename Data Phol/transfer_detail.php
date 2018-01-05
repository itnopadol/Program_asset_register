<?php 
session_start();
require('connect_db.php');
$order_id=$_GET['id'];
$or="SELECT order_id,total_paid FROM list_orders WHERE order_id='$order_id'";
$us="SELECT username,fullname,lastname,address,phone,email FROM users WHERE username='$_SESSION[login_name]'";
$bak="SELECT bank_id,bank_name FROM bank ";
$tra=mysql_query("SELECT * FROM transfer WHERE order_id=$order_id ");
list(
$order_id,$transfer_date,$transfer_bank,$transfer_slip,$transfer_cash)=mysql_fetch_row($tra)or die(mysql_error());
$bak1=mysql_query($bak)or die(mysql_error());
$or1=mysql_query($or)or die(mysql_error());
$us1=mysql_query($us)or die(mysql_error());
list($bank_id,$bank_name)=mysql_fetch_row($bak1);
list($order_id,$total_paid)=mysql_fetch_row($or1);
list($username,$fullname,$lastname,$address,$phone,$email)=mysql_fetch_row($us1);

echo "<table border=0 align='center' ><tr><td>";
echo "<h1>รายละเอียดการโอนเงิน</h1>
<p>- รหัสการสั่งซื้อ: $order_id </p>
<p>- ชื่อ นามสกุล :$fullname &nbsp;&nbsp;&nbsp; $lastname</p>
<p>- ที่อยู่ : $address</p>
<p>- เบอร์โทร : $phone</p>
<p>- E-mail : $email</p>
<p>- วันและเวลาที่โอน : $transfer_date</p>
<p>- ธนาคารที่โอน : $bank_name</p>
<p>- จำนวนเงินที่โอน : $transfer_cash</p>
<p>- ใบสลิป : <img src='slips/$transfer_slip'></p>";

echo "</tr></td></table>";
echo "<a href='order_list_admin.php'>ย้อนกลับ</a>";
?>
