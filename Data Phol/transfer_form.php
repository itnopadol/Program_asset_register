<?php
session_start();
require('connect_db.php');
$order_id=$_GET['id'];
$or="SELECT order_id,total_paid FROM list_orders WHERE order_id=$order_id";
$us="SELECT username,fullname,lastname,address,phone,email FROM users WHERE username='$_SESSION[login_name]'";
$bak="SELECT bank_id,bank_name FROM bank ";
$bak1=mysql_query($bak)or die(mysql_error());
$or1=mysql_query($or)or die(mysql_error());
$us1=mysql_query($us)or die(mysql_error());
list($order_id,$total_paid)=mysql_fetch_row($or1);
list($username,$fullname,$lastname,$address,$phone,$email)=mysql_fetch_row($us1);

?>
<html>
<head>
<link rel="stylesheet" href="jquery/jquery-ui.css">
<script src="jquery/external/jquery/jquery.js"></script>
<script src="jquery/jquery-ui.js"></script>

<script>
$(function() {
$( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
});
</script>

<title>การโอนเงิน</title>

</head>
<body>
<?php echo $order_id=$_GET['id'] ?>
<form action="insert_transfer.php" method="post" enctype="multipart/form-data">
<h1>ฟอร์มแจ้งการโอนเงิน</h1>
<p>- รหัสการสั่งซื้อ: <?php echo $order_id ?></p>
<p>- ชื่อ นามสกุล : <?php echo "$fullname &nbsp;&nbsp;&nbsp; $lastname"; ?></p>
<p>- ที่อยู่ : <?php echo "$address"; ?></p>
<p>- เบอร์โทร : <?php echo "$phone"; ?></p>
<p>- E-mail : <?php echo "$email"; ?></p>
<a href="edit_user.php">แก้ไขข้อมูล</a>
<hr>
<input type="hidden" name="id" value="<?php echo $order_id ?>">
<p>- วันที่โอนเงิน : <input type="text" id="datepicker" name="transfer_date"/></p>
<p>- เวลาที่โอน : <input type="text" size="5" name="h"> : <input type="text" size="5" name="m"> : <input type="text" size="5" name="s"> #ชั่วโมง : นาที : วินาที </p>
<p>- ธนาคารที่โอนเงิน
<?php while(list($bank_id,$bank_name)=mysql_fetch_row($bak1)){
	echo "<p><input type='radio' name='bank' value=$bank_name> $bank_name</p>";
}
?>
<p>- จำนวนเงินที่โอน : <input type="text" name="total_paid" value="<?php echo $total_paid ?>"></p>
<p> - สลิปโอนเงิน : <input type="file" name="transfer_slip" > (ใส่หรือไม่ใส่ก็ได้)</p>
<p><input type="submit" name="sent" value="ส่งข้อมูล"></p>
</form>
<?php mysql_close(); ?>
</body>
</html>