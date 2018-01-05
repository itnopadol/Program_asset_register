<?php
function add_tocart(){
	connect_db();
	$rs=mysql_query("SELECT book_title,book_sprice  FROM books WHERE book_id='$_GET[id]'") or die(mysql_error());
	list($book_title,$book_sprice)=mysql_fetch_row($rs);
if(!in_array($_GET['id'],$_SESSION['sbook_id'])){
	$_SESSION['sbook_id'][]=$_GET['id'];
	$_SESSION['sbook_title'][]=$book_title;
	$_SESSION['sbook_sprice'][]=$book_sprice;
	$_SESSION['sbook_amount'][]=1;
}

echo "<script language='javascript'>window.location='index.php?module=cart&action=show_cart'</script>";
mysql_result($rs);
mysql_close();	
}
//=============================================================================================
function show_cart(){
	$cnt=count($_SESSION['sbook_id']);
$total_price=0;
if($cnt>0){
echo "<form method='post' action='index.php?module=cart&action=recaculate'>";
echo "<table border='1' width=100% align='center'>";
echo "<tr bgcolor='#cccccc'><th>ยกเลิก</th><th>รหัสสินค้า</th><th>ชื่อสินค้า</th><th>ราคา</th><th>จำนวน</th><th>ราคารวม</th></tr>";
for($i=0;$i<$cnt;$i++){
echo "<tr><td align='center'><input type='checkbox' name='cancel_id[]' value='",$_SESSION['sbook_id'][$i],"'></td>";
echo "<td align='center'>",$_SESSION['sbook_id'][$i],"</td>";
echo "<td align='lift'>",$_SESSION['sbook_title'][$i],"</td>";
echo "<td align='center'>",$_SESSION['sbook_sprice'][$i],"</td>";
echo "<td align='center'><input type='text' name='book_amount[]' size=5 value=",$_SESSION['sbook_amount'][$i],"></td>";
	$sum_price=$_SESSION['sbook_sprice'][$i]*$_SESSION['sbook_amount'][$i];
echo "<td align='right'>";
printf("%.2f",$sum_price);//แสดงตัวเลขในรูปแบบทศนิยม 2 ตำแหน่ง
echo "</td>";
echo "</tr>";
$total_price+=$sum_price;
}

echo "</table>";
echo "<p align='right'>รวมราคาสินค้าทั้งหมดคิดเป็นเงิน&nbsp;&nbsp;";
 printf("%.2f",$total_price);
 echo "&nbsp;&nbsp;บาท</p>";
echo "<input type='hidden' name='total_paid' value='$total_price'>";
echo "<p align='center'><input type='submit' value='กลับไปเลือกสินค้า' name='button'>
<input type='submit' value='คำนวนราคาใหม่' name='button'>
<input type='submit' value='ยืนยันการสั่งซื้อ' name='button'>";
echo "<input type='submit' value='ยกเลิกสินค้า' name='button'></p>";
echo "</form>";
}else{
echo "ยังไม่มีสินค้าในตะกร้า <a href='index.php?module=books&action=list_book'>เลือกสินค้า</a>";	
}
		
}
//=============================================================================================
function recaculate(){
	connect_db();
	if($_POST['button']=="กลับไปเลือกสินค้า"){
echo "<script language='javascript'>window.location='index.php?module=books&action=list_book'</script>";
}
elseif($_POST['button']=="ยกเลิกสินค้า"){
if(!empty($_POST['cancel_id'])){////ถ้ามีการเลือก checkbox
$cancel_id=$_POST['cancel_id'];
$cnt=count($_SESSION['sbook_id']);
$tbook_id=array();
$tbook_title=array();
$tbook_sprice=array();
$tbook_amount=array();
for($i=0;$i<$cnt;$i++){
if(!in_array($_SESSION['sbook_id'][$i],$cancel_id)){
$tbook_id[]=$_SESSION['sbook_id'][$i];
$tbook_title[]=$_SESSION['sbook_title'][$i];
$tbook_sprice[]=$_SESSION['sbook_sprice'][$i];
$tbook_amount[]=$_SESSION['sbook_amount'][$i];
}
}
$_SESSION['sbook_id']=$tbook_id;
$_SESSION['sbook_title']=$tbook_title;
$_SESSION['sbook_sprice']=$tbook_sprice;
$_SESSION['sbook_amount']=$tbook_amount;
}
echo "<script language='javascript'>window.location='index.php?module=cart&action=show_cart'</script>";
}elseif($_POST['button']=="คำนวนราคาใหม่"){
$_SESSION['sbook_amount']=$_POST['book_amount'];
echo "<script language='javascript'>window.location='index.php?module=cart&action=show_cart'</script>";
}

$order_date=date("Y-m-d");
$total_price=$_POST['total_paid'];
$sql1="INSERT INTO list_orders VALUES('','$order_date','$_SESSION[login_name]','','$total_price','')";
mysql_query($sql1)or die(mysql_error());

$sbook_id=$_SESSION['sbook_id'];
$sbook_amount=$_SESSION['sbook_amount'];
$sbook_title=$_SESSION['sbook_title'];
$sbook_sprice=$_SESSION['sbook_sprice'];
$sql2="INSERT INTO order_detail VALUES((SELECT MAX(order_id) FROM list_orders),'$sbook_id[0]','$sbook_amount[0]')";
$cnt=count($_SESSION['sbook_id']);
if($cnt>1){
for($i=1;$i<$cnt;$i++){
$sql2.=",((SELECT MAX(order_id) FROM list_orders),'$sbook_id[$i]','$sbook_amount[$i]')";

}
}
mysql_query($sql2)or die(mysql_error());
mysql_close();
echo "<p class='alert alert-success' role='alert'>ยืนยันการสั่งซื้อเรียบร้อยแล้ว!!! </a>";
}

//=============================================================================================
function transfer_form(){
	connect_db();
$order_id=$_GET['id'];
$or="SELECT order_id,total_paid FROM list_orders WHERE order_id='$order_id'";
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
<?php $order_id=$_GET['id']; ?>
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
<?php mysql_close(); 

	}
//=============================================================================================
function insert_transfer(){
	connect_db();
$order_id=$_POST['id'];
$trans_date=$_POST['transfer_date'];
$trans_time=$_POST['h'].":".$_POST['m'].":".$_POST['s'];
$transfer_date="$trans_date $trans_time";

if(!empty($_FILES['transfer_slip']['name'])){
	$slip_file=$_FILES['transfer_slip']['name'];
	$slip_tmp=$_FILES['transfer_slip']['tmp_name'];
	copy($slip_tmp,"slips/$slip_file");
	}else{
		$slip_file="";
	}
	$sql1="INSERT INTO transfer VALUES ('$order_id','$transfer_date','$_POST[bank]','$slip_file','$_POST[total_paid]')";
	mysql_query($sql1)or die(mysql_error());
	
	$sql2="UPDATE list_orders SET order_status=2 WHERE order_id='$order_id'";
	mysql_query($sql2)or die(mysql_error());

echo "<script language='javascript'>window.location='index.php?module=order&action=list_order'</script>";
	
}
//=============================================================================================
function transfer_detail(){
	connect_db();
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
echo "<a href='index.php?module=order&action=list_order_admin'>ย้อนกลับ</a>";	
}
//=============================================================================================
function update_stt(){
$status=$_POST['status'];
$order_id=$_POST['id'];
connect_db();
$sql="UPDATE list_orders SET order_status='$status' WHERE order_id='$order_id'";
mysql_query("$sql") or die(mysql_error());
//echo $sql;
echo "<script language='javascript'>window.location='index.php?module=order&action=list_order_admin'</script>";
}
//=============================================================================================
function add_tracking(){
	connect_db();
$up="UPDATE list_orders SET tracking_id='$_POST[tracking_id]',order_status='4'  WHERE order_id='$_POST[order_id]'";
mysql_query($up)or die(mysql_error());
echo "<script language='javascript'>window.location='index.php?module=order&action=list_order_admin'</script>";
mysql_close();
	}
?>