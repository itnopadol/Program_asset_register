<?php
function list_order(){
	connect_db();
$order="SELECT * FROM list_orders WHERE order_member='$_SESSION[login_name]'";
$rs=mysql_query($order)or die(mysql_error());
echo "<h2 align='center'>ผู้ใช้ :",$_SESSION['login_name'],"</h2>";
	echo "<form action='index.php?module=cart&action=transfer_form' method='GET'>";
	echo "<table border='1' align='center' width=70%>";
echo "<tr align='center'><th>รหัสสินค้า</th><th>รหัสผู้ซื้อ</th><th>วันที่สั่งซื้อ: วัน/เดือน/ปี</th><th>สถานะ</th><th>หมายเหตุ</th></tr>";
while(list($order_id,$order_date,$order_member,$order_status,$total_paid,$tracking_id)=mysql_fetch_row($rs)){
if($order_status==1){
	$link="<a href='index.php?module=cart&action=transfer_form&id=$order_id'><font color='red'>[แจ้งโอนเงิน]</font></a>";
	}elseif($order_status==4){
		$link="<font color='blue'>TrackingID:$tracking_id</font>";
		}else{
			$link="-";
			}



		echo "<tr align='center'><td><a href='index.php?module=order&action=order_detail&order_id=$order_id'>$order_id</a></td><td>$order_member</td><td>$order_date</td>";
		
$os="SELECT * FROM order_status WHERE status_id=(SELECT order_status FROM list_orders WHERE order_id='$order_id')";
$os1=mysql_query($os)or die(mysql_error());
list($staust_id,$status_title)=mysql_fetch_row($os1);
echo "<td>$status_title</td>";

echo "<td >$link</td></tr>";
		

 }

echo "</table></form>";
echo "<p align='center'><a href='index.php?module=books&action=list_book><input type='button' name='back' value='เลือกหนังสือ'></a></p>";
mysql_free_result($rs);
mysql_close();

	
	}
//=============================================================================================
function list_order_admin(){
	connect_db();
	$order="SELECT * FROM list_orders ";
$rs=mysql_query($order)or die(mysql_error());

echo "<h2 align='center'>ผู้ใช้ :",$_SESSION['login_name'],"</h2>";
	echo "<table border='1' align='center' width=70%>";
echo "<tr align='center'><th>รหัสสินค้า</th><th>รหัสผู้ซื้อ</th><th>วันที่สั่งซื้อ: วัน/เดือน/ปี</th><th>สถานะ</th><th>หมายเหตุ</th></tr>";

while(list($order_id,$order_date,$order_member,$order_status,$total_paid,$tracking_id)=mysql_fetch_row($rs)){
if($order_status==2){
	$link="<a href='index.php?module=cart&action=transfer_detail&name=$order_member&id=$order_id'><font color='green'>ตรวจสอบ</font></a>";
	}elseif($order_status==3){
		$link="<form action='index.php?module=cart&action=add_tracking' method='post'>
		<input type='hidden' value='$order_id' name='order_id'>
		<input type='text' name='tracking_id' size='20'>
		<input type='submit' value='Tracking'></form>";
		}elseif($order_status==4){
		$link="<font color='blue'>- TrackingID:$tracking_id</font><br>-<a href='index.php?module=order&action=bil&name=$order_member&order_id=$order_id'>ใบเสร็จ</a>";
		}elseif($order_status==5){
			$link="<font color='red'>#Error</font>";
			}else{$link="-";}



		echo "<tr align='center'><td><a href='index.php?module=order&action=order_detail&order_id=$order_id'>$order_id</a></td><td>$order_member</td><td>$order_date</td>";
$os="SELECT * FROM order_status ";
$os1=mysql_query($os)or die(mysql_error());		
echo "<td align='left'><form action='index.php?module=cart&action=update_stt' method='post'>";

echo"<select name='status'>";
$result=mysql_query("SELECT status_id,status_title FROM order_status")or die(mysql_error());

while(list($status_id,$status_title)=mysql_fetch_row($result))
{
if($order_status==$status_id){
$chk="selected=selected";
}
else{
$chk="";
}
echo "<option value='$status_id' $chk >$status_title</option>";

}
echo "</select>";

echo "<input type='submit' value='เปลี่ยนสถานะ'>";
echo "<input type='hidden' value='$order_id' name='id'>";
echo "</form></td>";

echo "<td >$link</td></tr>";
		

}

echo "</table>";



mysql_free_result($rs);
mysql_close();	
}
//=============================================================================================
function order_detail(){
	connect_db();
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
if($_SESSION['login_type']==2){
echo "<p align='center'><a href='index.php?module=order&action=list_order_admin'><input type='button' name='back' value='ย้อนกลับ'></a></p>";
}else{
	echo "<p align='center'><a href='index.php?module=order&action=list_order'><input type='button' name='back' value='ย้อนกลับ'></a></p>";
}
mysql_free_result($rs);
mysql_close();
	}
//=============================================================================================
function bil(){
	connect_db();
?>		<style>
#contrainner{
margin:0 auto;
padding:50px 10px 50px 10px;
width:1080px;}
</style>
<?php


$i=1;
$date=date("Y-m-d H:i:s");
$total=0;
$total_price=0;
$rs=mysql_query("SELECT fullname,lastname,address,phone,email FROM users WHERE username='$_GET[name]'")or die(mysql_error());
list($name,$lname,$address,$tell,$mail)=mysql_fetch_row($rs);
$s1=mysql_query("SELECT book_id,book_amount FROM order_detail WHERE order_id='$_GET[order_id]'")or die(mysql_error());

echo "<p align='center'><img src='images/logo.jpg' width=150></p>";
echo "<h2 align='center'>บริษัท CASPER BOOK จำกัด</h2>";
echo "<h4 align='center'>333 ถ.สีลม แขวงสีลม เขตบางรัก กรุงเทพมหานคร 10500
<br>โทรศัพท์ 0-2231-4333 
<br>โทรสาร 0-2236-8281-2</h4>";
echo "<table align='center' width=800><tr><td>";
echo "<p align='left'>ชื่อ : $name ";
echo "&nbsp;&nbsp;&nbsp;&nbsp;นามสกุล : $lname</p>";
echo "<p align='left'>ที่อยู่ : $address</p>";
echo "<p align='left'>โทรศัพท์ : $tell ";
echo "&nbsp;&nbsp;&nbsp;&nbsp;E-mail: $mail</p> ";
echo "<p align='left'>วันที่ : $date</p> ";
echo "รหัสการสั่งซื้อ : $_GET[order_id]<br>";
echo "</td></tr></table>";


echo "<table border='1' width='800'align=center>";
echo "<tr><th>ที่</th><th>รหัสหนังสือ</th><th>รายการ</th><th>ราคา</th><th>จำนวน</th><th>ราคารวม</th></tr>";


while(list($book_id,$book_amount)=mysql_fetch_row($s1)){

$s2=mysql_query("SELECT book_id,book_title,book_sprice FROM books WHERE book_id='$book_id'")or die(mysql_error());
while(list($book_id,$book_title,$book_sprice)=mysql_fetch_row($s2)){
echo "<tr>";
echo "<td>";
echo $i++;
echo "</td>";
echo "<td>$book_id</td>";
echo "<td>$book_title</td>";
echo "<td>",number_format($book_sprice,2),"</td>";
echo "<td>$book_amount</td>";
$total=($book_sprice*$book_amount);
echo "<th>",number_format($total,2),"</th>";
echo "</tr>";

$total_price+=$total;

}
}
echo "<tr>";
echo "<td colspan='6'><p align='right'>รวมราคาสินค้าทั้งหมดคิดเป็นเงิน <u> $total_price </u> บาท</p></td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "<br>";
echo "<table align='center' border=0 width=70%><tr><td colspan='3' align='center' valign='bottom'>";
echo "ลงชื่อ : &nbsp;<img src='images/sname.png' width=150 >";
echo "<p>(นาย ณัฐพล &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วิโชนิตย์)</p>ฝ่ายการเงิน ";
echo "</td><td colspan='2' align='center' valign='bottom'>ลงชื่อ ......................................................................";
echo "<p>(...........................................................................)</p>ผู้รับสินค้า </td></tr></table>";
echo "</div>";
echo"</td></tr></table>";
echo"</div>";
 

?>

<hr>
<script type="text/javascript"> 
function printDiv(contrainner) { 
var printContents = document.getElementById(contrainner).innerHTML; 
var originalContents = document.body.innerHTML; 

document.body.innerHTML = printContents; 
window.print(); 

document.body.innerHTML = originalContents; 
} 
</script>
<p align="center"><input type="button" value="พิมพ์" onclick="printDiv('contrainner')">
<a href="index.php?module=order&action=list_order_admin"><input type=button value='กลับหน้าหลัก'></a></p>
<?php
}
//=============================================================================================
function add_like(){
	connect_db();
	$sql = mysql_query("SELECT * FROM likes WHERE book_id='$_GET[id]' AND username='$_SESSION[login_name]'");
$num = mysql_num_rows($sql);
if($num==1){
echo "<script type='text/javascript'>
alert (\"คุณเคย โหลวดแล้ว?\")
window.location='index.php?module=books&action=book_detail&id=$_GET[id]'
</script>";
}
if($num==0){
mysql_query("INSERT INTO likes VALUES('$_GET[id]','$_SESSION[login_name]')");
$like = mysql_query("SELECT book_id FROM likes WHERE book_id='$_GET[id]'");
$amount = mysql_num_rows($like);
mysql_query("UPDATE books SET likes='$amount' WHERE book_id='$_GET[id]'");
}
echo "<script>window.location='index.php?module=books&action=book_detail&id=$_GET[id]'</script>";
	
}
?>
